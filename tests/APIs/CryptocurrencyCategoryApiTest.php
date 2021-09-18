<?php

namespace Tests\APIs;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CryptocurrencyCategory;

/**
 * Class CryptocurrencyCategoryApiTest
 * @package Tests\APIs
 */
class CryptocurrencyCategoryApiTest extends TestCase
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
        $responseData = $response['cryptocurrency_category'];

        $this->assertNotEmpty($responseData['id']);
        //$this->assertModelData($actualData, $responseData);
    }

     public function assertApiResponseListData()
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['cryptocurrency_categories'];

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
    public function test_create_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'POST',
            '/api/v1/cryptocurrency-categories', $cryptocurrencyCategory
        );

        $this->assertApiResponse($cryptocurrencyCategory);
    }

    /**
     * @test
     */
    public function test_list_cryptocurrency_category()
    {

        $this->response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
           '/api/v1/cryptocurrency-categories/'
        );

        $this->assertApiResponseListData();
    }

    /**
     * @test
     */
    public function test_read_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/cryptocurrency-categories/'.$cryptocurrencyCategory->id
        );

        $this->assertApiResponse($cryptocurrencyCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->create();
        $editedCryptocurrencyCategory = CryptocurrencyCategory::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'PUT',
            '/api/v1/cryptocurrency-categories/'.$cryptocurrencyCategory->id,
            $editedCryptocurrencyCategory
        );

        $this->assertApiResponse($editedCryptocurrencyCategory);
    }

    /**
     * @test
     */
    public function test_delete_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'DELETE',
             '/api/v1/cryptocurrency-categories/'.$cryptocurrencyCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/cryptocurrency-categories/'.$cryptocurrencyCategory->id
        );

        $this->response->assertStatus(404);
    }
}
