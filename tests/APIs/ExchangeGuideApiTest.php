<?php

namespace Tests\APIs;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ExchangeGuide;

/**
 * Class ExchangeGuideApiTest
 * @package Tests\APIs
 */
class ExchangeGuideApiTest extends TestCase
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
        $responseData = $response['exchange_guide'];

        $this->assertNotEmpty($responseData['id']);
        //$this->assertModelData($actualData, $responseData);
    }

     public function assertApiResponseListData()
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['exchange_guides'];

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
    public function test_create_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'POST',
            '/api/v1/exchange-guides', $exchangeGuide
        );

        $this->assertApiResponse($exchangeGuide);
    }

    /**
     * @test
     */
    public function test_list_exchange_guide()
    {

        $this->response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
           '/api/v1/exchange-guides/'
        );

        $this->assertApiResponseListData();
    }

    /**
     * @test
     */
    public function test_read_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/exchange-guides/'.$exchangeGuide->id
        );

        $this->assertApiResponse($exchangeGuide->toArray());
    }

    /**
     * @test
     */
    public function test_update_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->create();
        $editedExchangeGuide = ExchangeGuide::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'PUT',
            '/api/v1/exchange-guides/'.$exchangeGuide->id,
            $editedExchangeGuide
        );

        $this->assertApiResponse($editedExchangeGuide);
    }

    /**
     * @test
     */
    public function test_delete_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'DELETE',
             '/api/v1/exchange-guides/'.$exchangeGuide->id
         );

        $this->assertApiSuccess();
        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/exchange-guides/'.$exchangeGuide->id
        );

        $this->response->assertStatus(404);
    }
}
