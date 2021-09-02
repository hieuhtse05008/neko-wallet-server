<?php namespace Tests\Repositories;

use App\Models\HistoricalPrice;
use App\Repositories\HistoricalPriceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class HistoricalPriceRepositoryTest extends TestCase
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
     * @var HistoricalPriceRepository
     */
    protected $historicalPriceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->historicalPriceRepo = \App::make(HistoricalPriceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_historical_price()
    {
        $historicalPrice = HistoricalPrice::factory()->make()->toArray();

        $createdHistoricalPrice = $this->historicalPriceRepo->create($historicalPrice);

        $this->assertArrayHasKey('id', $createdHistoricalPrice);
        $this->assertNotNull($createdHistoricalPrice['id'], 'Created HistoricalPrice must have id specified');
        $this->assertNotNull(HistoricalPrice::find($createdHistoricalPrice['id']), 'HistoricalPrice with given id must be in DB');
        //$this->assertModelData($historicalPrice, $createdHistoricalPrice);
    }

    /**
     * @test read
     */
    public function test_read_historical_price()
    {
        $historicalPrice = HistoricalPrice::factory()->create();

        $dbHistoricalPrice = $this->historicalPriceRepo->find($historicalPrice->id);

        //$this->assertModelData($historicalPrice->toArray(), $dbHistoricalPrice);
        $this->assertArrayHasKey('id', $dbHistoricalPrice);
        $this->assertNotNull($dbHistoricalPrice['id'], 'Created HistoricalPrice must have id specified');
        $this->assertNotNull(HistoricalPrice::find($dbHistoricalPrice['id']), 'HistoricalPrice with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_historical_price()
    {
        $historicalPrice = HistoricalPrice::factory()->create();
        $fakeHistoricalPrice = HistoricalPrice::factory()->make()->toArray();

        $updatedHistoricalPrice = $this->historicalPriceRepo->update($fakeHistoricalPrice, $historicalPrice->id);

        $dbHistoricalPrice = $this->historicalPriceRepo->find($historicalPrice->id);
        $this->assertModelData($updatedHistoricalPrice, $dbHistoricalPrice);
    }

    /**
     * @test delete
     */
    public function test_delete_historical_price()
    {
        $historicalPrice = HistoricalPrice::factory()->create();

        $resp = $this->historicalPriceRepo->delete($historicalPrice->id);

        $this->assertTrue($resp);
        $this->assertNull(HistoricalPrice::find($historicalPrice->id), 'HistoricalPrice should not exist in DB');
    }
}
