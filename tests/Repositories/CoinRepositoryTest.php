<?php namespace Tests\Repositories;

use App\Models\Coin;
use App\Repositories\CoinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoinRepositoryTest extends TestCase
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
     * @var CoinRepository
     */
    protected $coinRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coinRepo = \App::make(CoinRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_coin()
    {
        $coin = Coin::factory()->make()->toArray();

        $createdCoin = $this->coinRepo->create($coin);

        $this->assertArrayHasKey('id', $createdCoin);
        $this->assertNotNull($createdCoin['id'], 'Created Coin must have id specified');
        $this->assertNotNull(Coin::find($createdCoin['id']), 'Coin with given id must be in DB');
        //$this->assertModelData($coin, $createdCoin);
    }

    /**
     * @test read
     */
    public function test_read_coin()
    {
        $coin = Coin::factory()->create();

        $dbCoin = $this->coinRepo->find($coin->id);

        //$this->assertModelData($coin->toArray(), $dbCoin);
        $this->assertArrayHasKey('id', $dbCoin);
        $this->assertNotNull($dbCoin['id'], 'Created Coin must have id specified');
        $this->assertNotNull(Coin::find($dbCoin['id']), 'Coin with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_coin()
    {
        $coin = Coin::factory()->create();
        $fakeCoin = Coin::factory()->make()->toArray();

        $updatedCoin = $this->coinRepo->update($fakeCoin, $coin->id);

        $dbCoin = $this->coinRepo->find($coin->id);
        $this->assertModelData($updatedCoin, $dbCoin);
    }

    /**
     * @test delete
     */
    public function test_delete_coin()
    {
        $coin = Coin::factory()->create();

        $resp = $this->coinRepo->delete($coin->id);

        $this->assertTrue($resp);
        $this->assertNull(Coin::find($coin->id), 'Coin should not exist in DB');
    }
}
