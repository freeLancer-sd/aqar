<?php namespace Tests\Repositories;

use App\Models\PropertyType;
use App\Repositories\PropertyTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PropertyTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PropertyTypeRepository
     */
    protected $propertyTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->propertyTypeRepo = \App::make(PropertyTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_property_type()
    {
        $propertyType = factory(PropertyType::class)->make()->toArray();

        $createdPropertyType = $this->propertyTypeRepo->create($propertyType);

        $createdPropertyType = $createdPropertyType->toArray();
        $this->assertArrayHasKey('id', $createdPropertyType);
        $this->assertNotNull($createdPropertyType['id'], 'Created PropertyType must have id specified');
        $this->assertNotNull(PropertyType::find($createdPropertyType['id']), 'PropertyType with given id must be in DB');
        $this->assertModelData($propertyType, $createdPropertyType);
    }

    /**
     * @test read
     */
    public function test_read_property_type()
    {
        $propertyType = factory(PropertyType::class)->create();

        $dbPropertyType = $this->propertyTypeRepo->find($propertyType->id);

        $dbPropertyType = $dbPropertyType->toArray();
        $this->assertModelData($propertyType->toArray(), $dbPropertyType);
    }

    /**
     * @test update
     */
    public function test_update_property_type()
    {
        $propertyType = factory(PropertyType::class)->create();
        $fakePropertyType = factory(PropertyType::class)->make()->toArray();

        $updatedPropertyType = $this->propertyTypeRepo->update($fakePropertyType, $propertyType->id);

        $this->assertModelData($fakePropertyType, $updatedPropertyType->toArray());
        $dbPropertyType = $this->propertyTypeRepo->find($propertyType->id);
        $this->assertModelData($fakePropertyType, $dbPropertyType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_property_type()
    {
        $propertyType = factory(PropertyType::class)->create();

        $resp = $this->propertyTypeRepo->delete($propertyType->id);

        $this->assertTrue($resp);
        $this->assertNull(PropertyType::find($propertyType->id), 'PropertyType should not exist in DB');
    }
}
