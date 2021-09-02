<?php namespace Tests\Repositories;

use App\Models\NetworkMapping;
use App\Repositories\NetworkMappingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NetworkMappingRepositoryTest extends TestCase
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
     * @var NetworkMappingRepository
     */
    protected $networkMappingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->networkMappingRepo = \App::make(NetworkMappingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->make()->toArray();

        $createdNetworkMapping = $this->networkMappingRepo->create($networkMapping);

        $this->assertArrayHasKey('id', $createdNetworkMapping);
        $this->assertNotNull($createdNetworkMapping['id'], 'Created NetworkMapping must have id specified');
        $this->assertNotNull(NetworkMapping::find($createdNetworkMapping['id']), 'NetworkMapping with given id must be in DB');
        //$this->assertModelData($networkMapping, $createdNetworkMapping);
    }

    /**
     * @test read
     */
    public function test_read_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->create();

        $dbNetworkMapping = $this->networkMappingRepo->find($networkMapping->id);

        //$this->assertModelData($networkMapping->toArray(), $dbNetworkMapping);
        $this->assertArrayHasKey('id', $dbNetworkMapping);
        $this->assertNotNull($dbNetworkMapping['id'], 'Created NetworkMapping must have id specified');
        $this->assertNotNull(NetworkMapping::find($dbNetworkMapping['id']), 'NetworkMapping with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->create();
        $fakeNetworkMapping = NetworkMapping::factory()->make()->toArray();

        $updatedNetworkMapping = $this->networkMappingRepo->update($fakeNetworkMapping, $networkMapping->id);

        $dbNetworkMapping = $this->networkMappingRepo->find($networkMapping->id);
        $this->assertModelData($updatedNetworkMapping, $dbNetworkMapping);
    }

    /**
     * @test delete
     */
    public function test_delete_network_mapping()
    {
        $networkMapping = NetworkMapping::factory()->create();

        $resp = $this->networkMappingRepo->delete($networkMapping->id);

        $this->assertTrue($resp);
        $this->assertNull(NetworkMapping::find($networkMapping->id), 'NetworkMapping should not exist in DB');
    }
}
