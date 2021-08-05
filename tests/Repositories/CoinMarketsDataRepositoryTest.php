<?php namespace Tests\Repositories;

use App\Models\CoinMarketsData;
use App\Repositories\CoinMarketsDataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoinMarketsDataRepositoryTest extends TestCase
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
     * @var CoinMarketsDataRepository
     */
    protected $coinMarketsDataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coinMarketsDataRepo = \App::make(CoinMarketsDataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_coin_markets_data()
    {
        $coinMarketsData = CoinMarketsData::factory()->make()->toArray();

        $createdCoinMarketsData = $this->coinMarketsDataRepo->create($coinMarketsData);

        $this->assertArrayHasKey('id', $createdCoinMarketsData);
        $this->assertNotNull($createdCoinMarketsData['id'], 'Created CoinMarketsData must have id specified');
        $this->assertNotNull(CoinMarketsData::find($createdCoinMarketsData['id']), 'CoinMarketsData with given id must be in DB');
        //$this->assertModelData($coinMarketsData, $createdCoinMarketsData);
    }

    /**
     * @test read
     */
    public function test_read_coin_markets_data()
    {
        $coinMarketsData = CoinMarketsData::factory()->create();

        $dbCoinMarketsData = $this->coinMarketsDataRepo->find($coinMarketsData->id);

        //$this->assertModelData($coinMarketsData->toArray(), $dbCoinMarketsData);
        $this->assertArrayHasKey('id', $dbCoinMarketsData);
        $this->assertNotNull($dbCoinMarketsData['id'], 'Created CoinMarketsData must have id specified');
        $this->assertNotNull(CoinMarketsData::find($dbCoinMarketsData['id']), 'CoinMarketsData with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_coin_markets_data()
    {
        $coinMarketsData = CoinMarketsData::factory()->create();
        $fakeCoinMarketsData = CoinMarketsData::factory()->make()->toArray();

        $updatedCoinMarketsData = $this->coinMarketsDataRepo->update($fakeCoinMarketsData, $coinMarketsData->id);

        $dbCoinMarketsData = $this->coinMarketsDataRepo->find($coinMarketsData->id);
        $this->assertModelData($updatedCoinMarketsData, $dbCoinMarketsData);
    }

    /**
     * @test delete
     */
    public function test_delete_coin_markets_data()
    {
        $coinMarketsData = CoinMarketsData::factory()->create();

        $resp = $this->coinMarketsDataRepo->delete($coinMarketsData->id);

        $this->assertTrue($resp);
        $this->assertNull(CoinMarketsData::find($coinMarketsData->id), 'CoinMarketsData should not exist in DB');
    }
}
