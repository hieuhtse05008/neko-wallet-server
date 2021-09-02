<?php namespace Tests\Repositories;

use App\Models\Token;
use App\Repositories\TokenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TokenRepositoryTest extends TestCase
{
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
     * @var TokenRepository
     */
    protected $tokenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tokenRepo = \App::make(TokenRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_token()
    {
        $token = Token::factory()->make()->toArray();

        $createdToken = $this->tokenRepo->create($token);

        $this->assertArrayHasKey('id', $createdToken);
        $this->assertNotNull($createdToken['id'], 'Created Token must have id specified');
        $this->assertNotNull(Token::find($createdToken['id']), 'Token with given id must be in DB');
        //$this->assertModelData($token, $createdToken);
    }

    /**
     * @test read
     */
    public function test_read_token()
    {
        $token = Token::factory()->create();

        $dbToken = $this->tokenRepo->find($token->id);

        //$this->assertModelData($token->toArray(), $dbToken);
        $this->assertArrayHasKey('id', $dbToken);
        $this->assertNotNull($dbToken['id'], 'Created Token must have id specified');
        $this->assertNotNull(Token::find($dbToken['id']), 'Token with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_token()
    {
        $token = Token::factory()->create();
        $fakeToken = Token::factory()->make()->toArray();

        $updatedToken = $this->tokenRepo->update($fakeToken, $token->id);

        $dbToken = $this->tokenRepo->find($token->id);
        $this->assertModelData($updatedToken, $dbToken);
    }

    /**
     * @test delete
     */
    public function test_delete_token()
    {
        $token = Token::factory()->create();

        $resp = $this->tokenRepo->delete($token->id);

        $this->assertTrue($resp);
        $this->assertNull(Token::find($token->id), 'Token should not exist in DB');
    }
}
