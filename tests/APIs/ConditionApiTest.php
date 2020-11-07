<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Condition;

class ConditionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_condition()
    {
        $condition = factory(Condition::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/conditions', $condition
        );

        $this->assertApiResponse($condition);
    }

    /**
     * @test
     */
    public function test_read_condition()
    {
        $condition = factory(Condition::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/conditions/'.$condition->id
        );

        $this->assertApiResponse($condition->toArray());
    }

    /**
     * @test
     */
    public function test_update_condition()
    {
        $condition = factory(Condition::class)->create();
        $editedCondition = factory(Condition::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/conditions/'.$condition->id,
            $editedCondition
        );

        $this->assertApiResponse($editedCondition);
    }

    /**
     * @test
     */
    public function test_delete_condition()
    {
        $condition = factory(Condition::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/conditions/'.$condition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/conditions/'.$condition->id
        );

        $this->response->assertStatus(404);
    }
}
