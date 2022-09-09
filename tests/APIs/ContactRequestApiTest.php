<?php

namespace Tests\APIs;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContactRequest;

/**
 * Class ContactRequestApiTest
 * @package Tests\APIs
 */
class ContactRequestApiTest extends TestCase
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
        $responseData = $response['contact_request'];

        $this->assertNotEmpty($responseData['id']);
        //$this->assertModelData($actualData, $responseData);
    }

     public function assertApiResponseListData()
    {
        $this->assertApiSuccess();

        $response = json_decode($this->response->getContent(), true);
        $responseData = $response['contact_requests'];

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
    public function test_create_contact_request()
    {
        $contactRequest = ContactRequest::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'POST',
            '/api/v1/contact-requests', $contactRequest
        );

        $this->assertApiResponse($contactRequest);
    }

    /**
     * @test
     */
    public function test_list_contact_request()
    {

        $this->response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
           '/api/v1/contact-requests/'
        );

        $this->assertApiResponseListData();
    }

    /**
     * @test
     */
    public function test_read_contact_request()
    {
        $contactRequest = ContactRequest::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/contact-requests/'.$contactRequest->id
        );

        $this->assertApiResponse($contactRequest->toArray());
    }

    /**
     * @test
     */
    public function test_update_contact_request()
    {
        $contactRequest = ContactRequest::factory()->create();
        $editedContactRequest = ContactRequest::factory()->make()->toArray();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'PUT',
            '/api/v1/contact-requests/'.$contactRequest->id,
            $editedContactRequest
        );

        $this->assertApiResponse($editedContactRequest);
    }

    /**
     * @test
     */
    public function test_delete_contact_request()
    {
        $contactRequest = ContactRequest::factory()->create();

        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'DELETE',
             '/api/v1/contact-requests/'.$contactRequest->id
         );

        $this->assertApiSuccess();
        $this->response = $this->withHeaders([
              'Authorization' => 'Bearer ' . $this->token,
        ])->json(
            'GET',
            '/api/v1/contact-requests/'.$contactRequest->id
        );

        $this->response->assertStatus(404);
    }
}
