<?php namespace Tests\Repositories;

use App\Models\Cryptocurrency;
use App\Repositories\CryptocurrencyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CryptocurrencyRepositoryTest extends TestCase
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
     * @var CryptocurrencyRepository
     */
    protected $cryptocurrencyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cryptocurrencyRepo = \App::make(CryptocurrencyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cryptocurrency()
    {
        $cryptocurrency = Cryptocurrency::factory()->make()->toArray();

        $createdCryptocurrency = $this->cryptocurrencyRepo->create($cryptocurrency);

        $this->assertArrayHasKey('id', $createdCryptocurrency);
        $this->assertNotNull($createdCryptocurrency['id'], 'Created Cryptocurrency must have id specified');
        $this->assertNotNull(Cryptocurrency::find($createdCryptocurrency['id']), 'Cryptocurrency with given id must be in DB');
        //$this->assertModelData($cryptocurrency, $createdCryptocurrency);
    }

    /**
     * @test read
     */
    public function test_read_cryptocurrency()
    {
        $cryptocurrency = Cryptocurrency::factory()->create();

        $dbCryptocurrency = $this->cryptocurrencyRepo->find($cryptocurrency->id);

        //$this->assertModelData($cryptocurrency->toArray(), $dbCryptocurrency);
        $this->assertArrayHasKey('id', $dbCryptocurrency);
        $this->assertNotNull($dbCryptocurrency['id'], 'Created Cryptocurrency must have id specified');
        $this->assertNotNull(Cryptocurrency::find($dbCryptocurrency['id']), 'Cryptocurrency with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_cryptocurrency()
    {
        $cryptocurrency = Cryptocurrency::factory()->create();
        $fakeCryptocurrency = Cryptocurrency::factory()->make()->toArray();

        $updatedCryptocurrency = $this->cryptocurrencyRepo->update($fakeCryptocurrency, $cryptocurrency->id);

        $dbCryptocurrency = $this->cryptocurrencyRepo->find($cryptocurrency->id);
        $this->assertModelData($updatedCryptocurrency, $dbCryptocurrency);
    }

    /**
     * @test delete
     */
    public function test_delete_cryptocurrency()
    {
        $cryptocurrency = Cryptocurrency::factory()->create();

        $resp = $this->cryptocurrencyRepo->delete($cryptocurrency->id);

        $this->assertTrue($resp);
        $this->assertNull(Cryptocurrency::find($cryptocurrency->id), 'Cryptocurrency should not exist in DB');
    }
}
