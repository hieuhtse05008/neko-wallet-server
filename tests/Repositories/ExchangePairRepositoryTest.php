<?php namespace Tests\Repositories;

use App\Models\ExchangePair;
use App\Repositories\ExchangePairRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ExchangePairRepositoryTest extends TestCase
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
     * @var ExchangePairRepository
     */
    protected $exchangePairRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->exchangePairRepo = \App::make(ExchangePairRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_exchange_pair()
    {
        $exchangePair = ExchangePair::factory()->make()->toArray();

        $createdExchangePair = $this->exchangePairRepo->create($exchangePair);

        $this->assertArrayHasKey('id', $createdExchangePair);
        $this->assertNotNull($createdExchangePair['id'], 'Created ExchangePair must have id specified');
        $this->assertNotNull(ExchangePair::find($createdExchangePair['id']), 'ExchangePair with given id must be in DB');
        //$this->assertModelData($exchangePair, $createdExchangePair);
    }

    /**
     * @test read
     */
    public function test_read_exchange_pair()
    {
        $exchangePair = ExchangePair::factory()->create();

        $dbExchangePair = $this->exchangePairRepo->find($exchangePair->id);

        //$this->assertModelData($exchangePair->toArray(), $dbExchangePair);
        $this->assertArrayHasKey('id', $dbExchangePair);
        $this->assertNotNull($dbExchangePair['id'], 'Created ExchangePair must have id specified');
        $this->assertNotNull(ExchangePair::find($dbExchangePair['id']), 'ExchangePair with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_exchange_pair()
    {
        $exchangePair = ExchangePair::factory()->create();
        $fakeExchangePair = ExchangePair::factory()->make()->toArray();

        $updatedExchangePair = $this->exchangePairRepo->update($fakeExchangePair, $exchangePair->id);

        $dbExchangePair = $this->exchangePairRepo->find($exchangePair->id);
        $this->assertModelData($updatedExchangePair, $dbExchangePair);
    }

    /**
     * @test delete
     */
    public function test_delete_exchange_pair()
    {
        $exchangePair = ExchangePair::factory()->create();

        $resp = $this->exchangePairRepo->delete($exchangePair->id);

        $this->assertTrue($resp);
        $this->assertNull(ExchangePair::find($exchangePair->id), 'ExchangePair should not exist in DB');
    }
}
