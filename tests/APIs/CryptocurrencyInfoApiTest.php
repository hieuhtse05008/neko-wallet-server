<?php

namespace Tests\APIs;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CryptocurrencyInfo;

/**
 * Class CryptocurrencyInfoApiTest
 * @package Tests\APIs
 */
class CryptocurrencyInfoApiTest extends TestCase
{
    private $response;

    protected $token;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::find(config('app.testing_user'));
        $this->token = JWTAuth::fromUser($user);
        $this->withoutMiddleware(\Illuminate\Routing\Middleware\ThrottleRequests::class);
    }

    /**
     * @param array $actualData
     */
    public function assertApiResponse(Array $actualData)
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['cryptocurrency_info'];

        $this->assertNotEmpty($responseData['id']);
        //$this->assertModelData($actualData, $responseData);
    }

     public function assertApiResponseListData()
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['cryptocurrency_infos'];

        $this->assertNotNull($responseData);
    }

    public function assertApiSuccess()
    {
        $this->response->assertStatus(200);
        $this->response->assertJson(['status' => true]);
    }

    /**
     * @param array $actualData
     * @param array $expectedData
     */
    public function assertModelData(Array $actualData, Array $expectedData)
    {
        foreach ($actualData as $key => $value) {
            if (in_array($key, ["creator_id", "updated_by", "deleted_by", "created_at", "updated_at","deleted_at"])) {
                continue;
            }
            $this->assertEquals($actualData[$key], $expectedData[$key]);
        }
    }

    /**
     * @test
     */
    public function test_create_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'POST',
            '/api/v1/cryptocurrency-infos', $cryptocurrencyInfo
        );

        $this->assertApiResponse($cryptocurrencyInfo);
    }

    /**
     * @test
     */
    public function test_list_cryptocurrency_info()
    {

        $this->response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
           '/api/v1/cryptocurrency-infos/'
        );

        $this->assertApiResponseListData();
    }

    /**
     * @test
     */
    public function test_read_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/cryptocurrency-infos/'.$cryptocurrencyInfo->id
        );

        $this->assertApiResponse($cryptocurrencyInfo->toArray());
    }

    /**
     * @test
     */
    public function test_update_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->create();
        $editedCryptocurrencyInfo = CryptocurrencyInfo::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'PUT',
            '/api/v1/cryptocurrency-infos/'.$cryptocurrencyInfo->id,
            $editedCryptocurrencyInfo
        );

        $this->assertApiResponse($editedCryptocurrencyInfo);
    }

    /**
     * @test
     */
    public function test_delete_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'DELETE',
             '/api/v1/cryptocurrency-infos/'.$cryptocurrencyInfo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/cryptocurrency-infos/'.$cryptocurrencyInfo->id
        );

        $this->response->assertStatus(404);
    }
}
