<?php namespace Tests\Repositories;

use App\Models\CryptocurrencyMapping;
use App\Repositories\CryptocurrencyMappingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CryptocurrencyMappingRepositoryTest extends TestCase
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
     * @var CryptocurrencyMappingRepository
     */
    protected $cryptocurrencyMappingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cryptocurrencyMappingRepo = \App::make(CryptocurrencyMappingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cryptocurrency_mapping()
    {
        $cryptocurrencyMapping = CryptocurrencyMapping::factory()->make()->toArray();

        $createdCryptocurrencyMapping = $this->cryptocurrencyMappingRepo->create($cryptocurrencyMapping);

        $this->assertArrayHasKey('id', $createdCryptocurrencyMapping);
        $this->assertNotNull($createdCryptocurrencyMapping['id'], 'Created CryptocurrencyMapping must have id specified');
        $this->assertNotNull(CryptocurrencyMapping::find($createdCryptocurrencyMapping['id']), 'CryptocurrencyMapping with given id must be in DB');
        //$this->assertModelData($cryptocurrencyMapping, $createdCryptocurrencyMapping);
    }

    /**
     * @test read
     */
    public function test_read_cryptocurrency_mapping()
    {
        $cryptocurrencyMapping = CryptocurrencyMapping::factory()->create();

        $dbCryptocurrencyMapping = $this->cryptocurrencyMappingRepo->find($cryptocurrencyMapping->id);

        //$this->assertModelData($cryptocurrencyMapping->toArray(), $dbCryptocurrencyMapping);
        $this->assertArrayHasKey('id', $dbCryptocurrencyMapping);
        $this->assertNotNull($dbCryptocurrencyMapping['id'], 'Created CryptocurrencyMapping must have id specified');
        $this->assertNotNull(CryptocurrencyMapping::find($dbCryptocurrencyMapping['id']), 'CryptocurrencyMapping with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_cryptocurrency_mapping()
    {
        $cryptocurrencyMapping = CryptocurrencyMapping::factory()->create();
        $fakeCryptocurrencyMapping = CryptocurrencyMapping::factory()->make()->toArray();

        $updatedCryptocurrencyMapping = $this->cryptocurrencyMappingRepo->update($fakeCryptocurrencyMapping, $cryptocurrencyMapping->id);

        $dbCryptocurrencyMapping = $this->cryptocurrencyMappingRepo->find($cryptocurrencyMapping->id);
        $this->assertModelData($updatedCryptocurrencyMapping, $dbCryptocurrencyMapping);
    }

    /**
     * @test delete
     */
    public function test_delete_cryptocurrency_mapping()
    {
        $cryptocurrencyMapping = CryptocurrencyMapping::factory()->create();

        $resp = $this->cryptocurrencyMappingRepo->delete($cryptocurrencyMapping->id);

        $this->assertTrue($resp);
        $this->assertNull(CryptocurrencyMapping::find($cryptocurrencyMapping->id), 'CryptocurrencyMapping should not exist in DB');
    }
}
