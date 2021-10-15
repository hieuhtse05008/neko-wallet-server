<?php namespace Tests\Repositories;

use App\Models\BlogGroup;
use App\Repositories\BlogGroupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BlogGroupRepositoryTest extends TestCase
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
     * @var BlogGroupRepository
     */
    protected $blogGroupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->blogGroupRepo = \App::make(BlogGroupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_blog_group()
    {
        $blogGroup = BlogGroup::factory()->make()->toArray();

        $createdBlogGroup = $this->blogGroupRepo->create($blogGroup);

        $this->assertArrayHasKey('id', $createdBlogGroup);
        $this->assertNotNull($createdBlogGroup['id'], 'Created BlogGroup must have id specified');
        $this->assertNotNull(BlogGroup::find($createdBlogGroup['id']), 'BlogGroup with given id must be in DB');
        //$this->assertModelData($blogGroup, $createdBlogGroup);
    }

    /**
     * @test read
     */
    public function test_read_blog_group()
    {
        $blogGroup = BlogGroup::factory()->create();

        $dbBlogGroup = $this->blogGroupRepo->find($blogGroup->id);

        //$this->assertModelData($blogGroup->toArray(), $dbBlogGroup);
        $this->assertArrayHasKey('id', $dbBlogGroup);
        $this->assertNotNull($dbBlogGroup['id'], 'Created BlogGroup must have id specified');
        $this->assertNotNull(BlogGroup::find($dbBlogGroup['id']), 'BlogGroup with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_blog_group()
    {
        $blogGroup = BlogGroup::factory()->create();
        $fakeBlogGroup = BlogGroup::factory()->make()->toArray();

        $updatedBlogGroup = $this->blogGroupRepo->update($fakeBlogGroup, $blogGroup->id);

        $dbBlogGroup = $this->blogGroupRepo->find($blogGroup->id);
        $this->assertModelData($updatedBlogGroup, $dbBlogGroup);
    }

    /**
     * @test delete
     */
    public function test_delete_blog_group()
    {
        $blogGroup = BlogGroup::factory()->create();

        $resp = $this->blogGroupRepo->delete($blogGroup->id);

        $this->assertTrue($resp);
        $this->assertNull(BlogGroup::find($blogGroup->id), 'BlogGroup should not exist in DB');
    }
}
