<?php namespace Tests\Repositories;

use App\Models\Network;
use App\Repositories\NetworkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NetworkRepositoryTest extends TestCase
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
     * @var NetworkRepository
     */
    protected $networkRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->networkRepo = \App::make(NetworkRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_network()
    {
        $network = Network::factory()->make()->toArray();

        $createdNetwork = $this->networkRepo->create($network);

        $this->assertArrayHasKey('id', $createdNetwork);
        $this->assertNotNull($createdNetwork['id'], 'Created Network must have id specified');
        $this->assertNotNull(Network::find($createdNetwork['id']), 'Network with given id must be in DB');
        //$this->assertModelData($network, $createdNetwork);
    }

    /**
     * @test read
     */
    public function test_read_network()
    {
        $network = Network::factory()->create();

        $dbNetwork = $this->networkRepo->find($network->id);

        //$this->assertModelData($network->toArray(), $dbNetwork);
        $this->assertArrayHasKey('id', $dbNetwork);
        $this->assertNotNull($dbNetwork['id'], 'Created Network must have id specified');
        $this->assertNotNull(Network::find($dbNetwork['id']), 'Network with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_network()
    {
        $network = Network::factory()->create();
        $fakeNetwork = Network::factory()->make()->toArray();

        $updatedNetwork = $this->networkRepo->update($fakeNetwork, $network->id);

        $dbNetwork = $this->networkRepo->find($network->id);
        $this->assertModelData($updatedNetwork, $dbNetwork);
    }

    /**
     * @test delete
     */
    public function test_delete_network()
    {
        $network = Network::factory()->create();

        $resp = $this->networkRepo->delete($network->id);

        $this->assertTrue($resp);
        $this->assertNull(Network::find($network->id), 'Network should not exist in DB');
    }
}
