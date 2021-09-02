<?php

namespace Tests\APIs;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\NetworkMapping;

/**
 * Class NetworkMappingApiTest
 * @package Tests\APIs
 */
class NetworkMappingApiTest extends TestCase
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
        $responseData = $response['network_mapping'];

        $this->assertNotEmpty($responseData['id']);
        //$this->assertModelData($actualData, $responseData);
    }

     public function assertApiResponseListData()
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['network_mappings'];

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
    public function test_create_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'POST',
            '/api/v1/network-mappings', $networkMapping
        );

        $this->assertApiResponse($networkMapping);
    }

    /**
     * @test
     */
    public function test_list_network_mapping()
    {

        $this->response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
           '/api/v1/network-mappings/'
        );

        $this->assertApiResponseListData();
    }

    /**
     * @test
     */
    public function test_read_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/network-mappings/'.$networkMapping->id
        );

        $this->assertApiResponse($networkMapping->toArray());
    }

    /**
     * @test
     */
    public function test_update_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->create();
        $editedNetworkMapping = NetworkMapping::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'PUT',
            '/api/v1/network-mappings/'.$networkMapping->id,
            $editedNetworkMapping
        );

        $this->assertApiResponse($editedNetworkMapping);
    }

    /**
     * @test
     */
    public function test_delete_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'DELETE',
             '/api/v1/network-mappings/'.$networkMapping->id
         );

        $this->assertApiSuccess();
        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/network-mappings/'.$networkMapping->id
        );

        $this->response->assertStatus(404);
    }
}
