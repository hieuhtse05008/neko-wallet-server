<?php namespace Tests\Repositories;

use App\Models\ExchangeGuide;
use App\Repositories\ExchangeGuideRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ExchangeGuideRepositoryTest extends TestCase
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
     * @var ExchangeGuideRepository
     */
    protected $exchangeGuideRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->exchangeGuideRepo = \App::make(ExchangeGuideRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->make()->toArray();

        $createdExchangeGuide = $this->exchangeGuideRepo->create($exchangeGuide);

        $this->assertArrayHasKey('id', $createdExchangeGuide);
        $this->assertNotNull($createdExchangeGuide['id'], 'Created ExchangeGuide must have id specified');
        $this->assertNotNull(ExchangeGuide::find($createdExchangeGuide['id']), 'ExchangeGuide with given id must be in DB');
        //$this->assertModelData($exchangeGuide, $createdExchangeGuide);
    }

    /**
     * @test read
     */
    public function test_read_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->create();

        $dbExchangeGuide = $this->exchangeGuideRepo->find($exchangeGuide->id);

        //$this->assertModelData($exchangeGuide->toArray(), $dbExchangeGuide);
        $this->assertArrayHasKey('id', $dbExchangeGuide);
        $this->assertNotNull($dbExchangeGuide['id'], 'Created ExchangeGuide must have id specified');
        $this->assertNotNull(ExchangeGuide::find($dbExchangeGuide['id']), 'ExchangeGuide with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->create();
        $fakeExchangeGuide = ExchangeGuide::factory()->make()->toArray();

        $updatedExchangeGuide = $this->exchangeGuideRepo->update($fakeExchangeGuide, $exchangeGuide->id);

        $dbExchangeGuide = $this->exchangeGuideRepo->find($exchangeGuide->id);
        $this->assertModelData($updatedExchangeGuide, $dbExchangeGuide);
    }

    /**
     * @test delete
     */
    public function test_delete_exchange_guide()
    {
        $exchangeGuide = ExchangeGuide::factory()->create();

        $resp = $this->exchangeGuideRepo->delete($exchangeGuide->id);

        $this->assertTrue($resp);
        $this->assertNull(ExchangeGuide::find($exchangeGuide->id), 'ExchangeGuide should not exist in DB');
    }
}
