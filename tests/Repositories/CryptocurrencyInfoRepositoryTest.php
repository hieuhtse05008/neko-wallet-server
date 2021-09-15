<?php namespace Tests\Repositories;

use App\Models\CryptocurrencyInfo;
use App\Repositories\CryptocurrencyInfoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CryptocurrencyInfoRepositoryTest extends TestCase
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
     * @var CryptocurrencyInfoRepository
     */
    protected $cryptocurrencyInfoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cryptocurrencyInfoRepo = \App::make(CryptocurrencyInfoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->make()->toArray();

        $createdCryptocurrencyInfo = $this->cryptocurrencyInfoRepo->create($cryptocurrencyInfo);

        $this->assertArrayHasKey('id', $createdCryptocurrencyInfo);
        $this->assertNotNull($createdCryptocurrencyInfo['id'], 'Created CryptocurrencyInfo must have id specified');
        $this->assertNotNull(CryptocurrencyInfo::find($createdCryptocurrencyInfo['id']), 'CryptocurrencyInfo with given id must be in DB');
        //$this->assertModelData($cryptocurrencyInfo, $createdCryptocurrencyInfo);
    }

    /**
     * @test read
     */
    public function test_read_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->create();

        $dbCryptocurrencyInfo = $this->cryptocurrencyInfoRepo->find($cryptocurrencyInfo->id);

        //$this->assertModelData($cryptocurrencyInfo->toArray(), $dbCryptocurrencyInfo);
        $this->assertArrayHasKey('id', $dbCryptocurrencyInfo);
        $this->assertNotNull($dbCryptocurrencyInfo['id'], 'Created CryptocurrencyInfo must have id specified');
        $this->assertNotNull(CryptocurrencyInfo::find($dbCryptocurrencyInfo['id']), 'CryptocurrencyInfo with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->create();
        $fakeCryptocurrencyInfo = CryptocurrencyInfo::factory()->make()->toArray();

        $updatedCryptocurrencyInfo = $this->cryptocurrencyInfoRepo->update($fakeCryptocurrencyInfo, $cryptocurrencyInfo->id);

        $dbCryptocurrencyInfo = $this->cryptocurrencyInfoRepo->find($cryptocurrencyInfo->id);
        $this->assertModelData($updatedCryptocurrencyInfo, $dbCryptocurrencyInfo);
    }

    /**
     * @test delete
     */
    public function test_delete_cryptocurrency_info()
    {
        $cryptocurrencyInfo = CryptocurrencyInfo::factory()->create();

        $resp = $this->cryptocurrencyInfoRepo->delete($cryptocurrencyInfo->id);

        $this->assertTrue($resp);
        $this->assertNull(CryptocurrencyInfo::find($cryptocurrencyInfo->id), 'CryptocurrencyInfo should not exist in DB');
    }
}
