<?php namespace Tests\Repositories;

use App\Models\SwapOrder;
use App\Repositories\SwapOrderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SwapOrderRepositoryTest extends TestCase
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
     * @var SwapOrderRepository
     */
    protected $swapOrderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->swapOrderRepo = \App::make(SwapOrderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_swap_order()
    {
        $swapOrder = SwapOrder::factory()->make()->toArray();

        $createdSwapOrder = $this->swapOrderRepo->create($swapOrder);

        $this->assertArrayHasKey('id', $createdSwapOrder);
        $this->assertNotNull($createdSwapOrder['id'], 'Created SwapOrder must have id specified');
        $this->assertNotNull(SwapOrder::find($createdSwapOrder['id']), 'SwapOrder with given id must be in DB');
        //$this->assertModelData($swapOrder, $createdSwapOrder);
    }

    /**
     * @test read
     */
    public function test_read_swap_order()
    {
        $swapOrder = SwapOrder::factory()->create();

        $dbSwapOrder = $this->swapOrderRepo->find($swapOrder->id);

        //$this->assertModelData($swapOrder->toArray(), $dbSwapOrder);
        $this->assertArrayHasKey('id', $dbSwapOrder);
        $this->assertNotNull($dbSwapOrder['id'], 'Created SwapOrder must have id specified');
        $this->assertNotNull(SwapOrder::find($dbSwapOrder['id']), 'SwapOrder with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_swap_order()
    {
        $swapOrder = SwapOrder::factory()->create();
        $fakeSwapOrder = SwapOrder::factory()->make()->toArray();

        $updatedSwapOrder = $this->swapOrderRepo->update($fakeSwapOrder, $swapOrder->id);

        $dbSwapOrder = $this->swapOrderRepo->find($swapOrder->id);
        $this->assertModelData($updatedSwapOrder, $dbSwapOrder);
    }

    /**
     * @test delete
     */
    public function test_delete_swap_order()
    {
        $swapOrder = SwapOrder::factory()->create();

        $resp = $this->swapOrderRepo->delete($swapOrder->id);

        $this->assertTrue($resp);
        $this->assertNull(SwapOrder::find($swapOrder->id), 'SwapOrder should not exist in DB');
    }
}
