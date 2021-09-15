<?php namespace Tests\Repositories;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CategoryRepositoryTest extends TestCase
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
     * @var CategoryRepository
     */
    protected $categoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoryRepo = \App::make(CategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_category()
    {
        $category = Category::factory()->make()->toArray();

        $createdCategory = $this->categoryRepo->create($category);

        $this->assertArrayHasKey('id', $createdCategory);
        $this->assertNotNull($createdCategory['id'], 'Created Category must have id specified');
        $this->assertNotNull(Category::find($createdCategory['id']), 'Category with given id must be in DB');
        //$this->assertModelData($category, $createdCategory);
    }

    /**
     * @test read
     */
    public function test_read_category()
    {
        $category = Category::factory()->create();

        $dbCategory = $this->categoryRepo->find($category->id);

        //$this->assertModelData($category->toArray(), $dbCategory);
        $this->assertArrayHasKey('id', $dbCategory);
        $this->assertNotNull($dbCategory['id'], 'Created Category must have id specified');
        $this->assertNotNull(Category::find($dbCategory['id']), 'Category with given id must be in DB');
    }

    /**
     * @test update
     */
    public function test_update_category()
    {
        $category = Category::factory()->create();
        $fakeCategory = Category::factory()->make()->toArray();

        $updatedCategory = $this->categoryRepo->update($fakeCategory, $category->id);

        $dbCategory = $this->categoryRepo->find($category->id);
        $this->assertModelData($updatedCategory, $dbCategory);
    }

    /**
     * @test delete
     */
    public function test_delete_category()
    {
        $category = Category::factory()->create();

        $resp = $this->categoryRepo->delete($category->id);

        $this->assertTrue($resp);
        $this->assertNull(Category::find($category->id), 'Category should not exist in DB');
    }
}
