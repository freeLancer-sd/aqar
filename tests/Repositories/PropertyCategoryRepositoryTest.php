<?php namespace Tests\Repositories;

use App\Models\PropertyCategory;
use App\Repositories\PropertyCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PropertyCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PropertyCategoryRepository
     */
    protected $propertyCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->propertyCategoryRepo = \App::make(PropertyCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->make()->toArray();

        $createdPropertyCategory = $this->propertyCategoryRepo->create($propertyCategory);

        $createdPropertyCategory = $createdPropertyCategory->toArray();
        $this->assertArrayHasKey('id', $createdPropertyCategory);
        $this->assertNotNull($createdPropertyCategory['id'], 'Created PropertyCategory must have id specified');
        $this->assertNotNull(PropertyCategory::find($createdPropertyCategory['id']), 'PropertyCategory with given id must be in DB');
        $this->assertModelData($propertyCategory, $createdPropertyCategory);
    }

    /**
     * @test read
     */
    public function test_read_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();

        $dbPropertyCategory = $this->propertyCategoryRepo->find($propertyCategory->id);

        $dbPropertyCategory = $dbPropertyCategory->toArray();
        $this->assertModelData($propertyCategory->toArray(), $dbPropertyCategory);
    }

    /**
     * @test update
     */
    public function test_update_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();
        $fakePropertyCategory = factory(PropertyCategory::class)->make()->toArray();

        $updatedPropertyCategory = $this->propertyCategoryRepo->update($fakePropertyCategory, $propertyCategory->id);

        $this->assertModelData($fakePropertyCategory, $updatedPropertyCategory->toArray());
        $dbPropertyCategory = $this->propertyCategoryRepo->find($propertyCategory->id);
        $this->assertModelData($fakePropertyCategory, $dbPropertyCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();

        $resp = $this->propertyCategoryRepo->delete($propertyCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(PropertyCategory::find($propertyCategory->id), 'PropertyCategory should not exist in DB');
    }
}
