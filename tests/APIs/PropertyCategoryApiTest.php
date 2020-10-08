<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PropertyCategory;

class PropertyCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/property_categories', $propertyCategory
        );

        $this->assertApiResponse($propertyCategory);
    }

    /**
     * @test
     */
    public function test_read_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/property_categories/'.$propertyCategory->id
        );

        $this->assertApiResponse($propertyCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();
        $editedPropertyCategory = factory(PropertyCategory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/property_categories/'.$propertyCategory->id,
            $editedPropertyCategory
        );

        $this->assertApiResponse($editedPropertyCategory);
    }

    /**
     * @test
     */
    public function test_delete_property_category()
    {
        $propertyCategory = factory(PropertyCategory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/property_categories/'.$propertyCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/property_categories/'.$propertyCategory->id
        );

        $this->response->assertStatus(404);
    }
}
