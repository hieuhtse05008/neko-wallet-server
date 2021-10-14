<?php namespace Tests\Repositories;

use App\Models\RefBlogGroup;
use App\Repositories\RefBlogGroupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RefBlogGroupRepositoryTest extends TestCase
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
     * @var RefBlogGroupRepository
     */
    protected $refBlogGroupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->refBlogGroupRepo = \App::make(RefBlogGroupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ref_blog_group()
    {
        $refBlogGroup = RefBlogGroup::factory()->make()->toArray();

        $createdRefBlogGroup = $this->refBlogGroupRepo->create($refBlogGroup);

        $this->assertArrayHasKey('id', $createdRefBlogGroup);
        $this->assertNotNull($createdRefBlogGroup['id'], 'Created RefBlogGroup must have id specified');
        $this->assertNotNull(RefBlogGroup::find($createdRefBlogGroup['id']), 'RefBlogGroup with given id must be in DB');
        //$this->assertModelData($refBlogGroup, $createdRefBlogGroup);
    }

    /**
     * @test read
     */
    public function test_read_ref_blog_group()
    {
        $refBlogGroup = RefBlogGroup::factory()->create();

        $dbRefBlogGroup = $this->refBlogGroupRepo->find($refBlogGroup->id);

        //$this->assertModelData($refBlogGroup->toArray(), $dbRefBlogGroup);
        $this->assertArrayHasKey('id', $dbRefBlogGroup);
        $this->assertNotNull($dbRefBlogGroup['id'], 'Created RefBlogGroup must have id specified');
        $this->assertNotNull(RefBlogGroup::find($dbRefBlogGroup['id']), 'RefBlogGroup with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_ref_blog_group()
    {
        $refBlogGroup = RefBlogGroup::factory()->create();
        $fakeRefBlogGroup = RefBlogGroup::factory()->make()->toArray();

        $updatedRefBlogGroup = $this->refBlogGroupRepo->update($fakeRefBlogGroup, $refBlogGroup->id);

        $dbRefBlogGroup = $this->refBlogGroupRepo->find($refBlogGroup->id);
        $this->assertModelData($updatedRefBlogGroup, $dbRefBlogGroup);
    }

    /**
     * @test delete
     */
    public function test_delete_ref_blog_group()
    {
        $refBlogGroup = RefBlogGroup::factory()->create();

        $resp = $this->refBlogGroupRepo->delete($refBlogGroup->id);

        $this->assertTrue($resp);
        $this->assertNull(RefBlogGroup::find($refBlogGroup->id), 'RefBlogGroup should not exist in DB');
    }
}
