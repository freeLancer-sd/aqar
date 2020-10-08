<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PropertyType;

class PropertyTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_property_type()
    {
        $propertyType = factory(PropertyType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/property_types', $propertyType
        );

        $this->assertApiResponse($propertyType);
    }

    /**
     * @test
     */
    public function test_read_property_type()
    {
        $propertyType = factory(PropertyType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/property_types/'.$propertyType->id
        );

        $this->assertApiResponse($propertyType->toArray());
    }

    /**
     * @test
     */
    public function test_update_property_type()
    {
        $propertyType = factory(PropertyType::class)->create();
        $editedPropertyType = factory(PropertyType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/property_types/'.$propertyType->id,
            $editedPropertyType
        );

        $this->assertApiResponse($editedPropertyType);
    }

    /**
     * @test
     */
    public function test_delete_property_type()
    {
        $propertyType = factory(PropertyType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/property_types/'.$propertyType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/property_types/'.$propertyType->id
        );

        $this->response->assertStatus(404);
    }
}
