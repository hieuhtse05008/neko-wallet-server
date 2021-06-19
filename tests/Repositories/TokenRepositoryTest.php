<?php namespace Tests\Repositories;

use App\Models\TokenPrice;
use App\Repositories\TokenPriceRepository;
use Tests\TestCase;

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
     * @var TokenPriceRepository
     */
    protected $tokenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tokenRepo = \App::make(TokenPriceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_token()
    {
        $token = TokenPrice::factory()->make()->toArray();

        $createdToken = $this->tokenRepo->create($token);

        $this->assertArrayHasKey('id', $createdToken);
        $this->assertNotNull($createdToken['id'], 'Created TokenPrice must have id specified');
        $this->assertNotNull(TokenPrice::find($createdToken['id']), 'TokenPrice with given id must be in DB');
        //$this->assertModelData($token, $createdToken);
    }

    /**
     * @test read
     */
    public function test_read_token()
    {
        $token = TokenPrice::factory()->create();

        $dbToken = $this->tokenRepo->find($token->id);

        //$this->assertModelData($token->toArray(), $dbToken);
        $this->assertArrayHasKey('id', $dbToken);
        $this->assertNotNull($dbToken['id'], 'Created TokenPrice must have id specified');
        $this->assertNotNull(TokenPrice::find($dbToken['id']), 'TokenPrice with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_token()
    {
        $token = TokenPrice::factory()->create();
        $fakeToken = TokenPrice::factory()->make()->toArray();

        $updatedToken = $this->tokenRepo->update($fakeToken, $token->id);

        $dbToken = $this->tokenRepo->find($token->id);
        $this->assertModelData($updatedToken, $dbToken);
    }

    /**
     * @test delete
     */
    public function test_delete_token()
    {
        $token = TokenPrice::factory()->create();

        $resp = $this->tokenRepo->delete($token->id);

        $this->assertTrue($resp);
        $this->assertNull(TokenPrice::find($token->id), 'TokenPrice should not exist in DB');
    }
}
