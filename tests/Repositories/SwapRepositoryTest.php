<?php namespace Tests\Repositories;

use App\Models\Swap;
use App\Repositories\SwapRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SwapRepositoryTest extends TestCase
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
     * @var SwapRepository
     */
    protected $swapRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->swapRepo = \App::make(SwapRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_swap()
    {
        $swap = Swap::factory()->make()->toArray();

        $createdSwap = $this->swapRepo->create($swap);

        $this->assertArrayHasKey('id', $createdSwap);
        $this->assertNotNull($createdSwap['id'], 'Created Swap must have id specified');
        $this->assertNotNull(Swap::find($createdSwap['id']), 'Swap with given id must be in DB');
        //$this->assertModelData($swap, $createdSwap);
    }

    /**
     * @test read
     */
    public function test_read_swap()
    {
        $swap = Swap::factory()->create();

        $dbSwap = $this->swapRepo->find($swap->id);

        //$this->assertModelData($swap->toArray(), $dbSwap);
        $this->assertArrayHasKey('id', $dbSwap);
        $this->assertNotNull($dbSwap['id'], 'Created Swap must have id specified');
        $this->assertNotNull(Swap::find($dbSwap['id']), 'Swap with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_swap()
    {
        $swap = Swap::factory()->create();
        $fakeSwap = Swap::factory()->make()->toArray();

        $updatedSwap = $this->swapRepo->update($fakeSwap, $swap->id);

        $dbSwap = $this->swapRepo->find($swap->id);
        $this->assertModelData($updatedSwap, $dbSwap);
    }

    /**
     * @test delete
     */
    public function test_delete_swap()
    {
        $swap = Swap::factory()->create();

        $resp = $this->swapRepo->delete($swap->id);

        $this->assertTrue($resp);
        $this->assertNull(Swap::find($swap->id), 'Swap should not exist in DB');
    }
}
