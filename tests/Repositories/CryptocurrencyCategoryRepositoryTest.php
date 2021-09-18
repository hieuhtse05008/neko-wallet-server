<?php namespace Tests\Repositories;

use App\Models\CryptocurrencyCategory;
use App\Repositories\CryptocurrencyCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CryptocurrencyCategoryRepositoryTest extends TestCase
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
     * @var CryptocurrencyCategoryRepository
     */
    protected $cryptocurrencyCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cryptocurrencyCategoryRepo = \App::make(CryptocurrencyCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->make()->toArray();

        $createdCryptocurrencyCategory = $this->cryptocurrencyCategoryRepo->create($cryptocurrencyCategory);

        $this->assertArrayHasKey('id', $createdCryptocurrencyCategory);
        $this->assertNotNull($createdCryptocurrencyCategory['id'], 'Created CryptocurrencyCategory must have id specified');
        $this->assertNotNull(CryptocurrencyCategory::find($createdCryptocurrencyCategory['id']), 'CryptocurrencyCategory with given id must be in DB');
        //$this->assertModelData($cryptocurrencyCategory, $createdCryptocurrencyCategory);
    }

    /**
     * @test read
     */
    public function test_read_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->create();

        $dbCryptocurrencyCategory = $this->cryptocurrencyCategoryRepo->find($cryptocurrencyCategory->id);

        //$this->assertModelData($cryptocurrencyCategory->toArray(), $dbCryptocurrencyCategory);
        $this->assertArrayHasKey('id', $dbCryptocurrencyCategory);
        $this->assertNotNull($dbCryptocurrencyCategory['id'], 'Created CryptocurrencyCategory must have id specified');
        $this->assertNotNull(CryptocurrencyCategory::find($dbCryptocurrencyCategory['id']), 'CryptocurrencyCategory with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->create();
        $fakeCryptocurrencyCategory = CryptocurrencyCategory::factory()->make()->toArray();

        $updatedCryptocurrencyCategory = $this->cryptocurrencyCategoryRepo->update($fakeCryptocurrencyCategory, $cryptocurrencyCategory->id);

        $dbCryptocurrencyCategory = $this->cryptocurrencyCategoryRepo->find($cryptocurrencyCategory->id);
        $this->assertModelData($updatedCryptocurrencyCategory, $dbCryptocurrencyCategory);
    }

    /**
     * @test delete
     */
    public function test_delete_cryptocurrency_category()
    {
        $cryptocurrencyCategory = CryptocurrencyCategory::factory()->create();

        $resp = $this->cryptocurrencyCategoryRepo->delete($cryptocurrencyCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(CryptocurrencyCategory::find($cryptocurrencyCategory->id), 'CryptocurrencyCategory should not exist in DB');
    }
}
