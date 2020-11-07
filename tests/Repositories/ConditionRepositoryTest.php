<?php namespace Tests\Repositories;

use App\Models\Condition;
use App\Repositories\ConditionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ConditionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConditionRepository
     */
    protected $conditionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->conditionRepo = \App::make(ConditionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_condition()
    {
        $condition = factory(Condition::class)->make()->toArray();

        $createdCondition = $this->conditionRepo->create($condition);

        $createdCondition = $createdCondition->toArray();
        $this->assertArrayHasKey('id', $createdCondition);
        $this->assertNotNull($createdCondition['id'], 'Created Condition must have id specified');
        $this->assertNotNull(Condition::find($createdCondition['id']), 'Condition with given id must be in DB');
        $this->assertModelData($condition, $createdCondition);
    }

    /**
     * @test read
     */
    public function test_read_condition()
    {
        $condition = factory(Condition::class)->create();

        $dbCondition = $this->conditionRepo->find($condition->id);

        $dbCondition = $dbCondition->toArray();
        $this->assertModelData($condition->toArray(), $dbCondition);
    }

    /**
     * @test update
     */
    public function test_update_condition()
    {
        $condition = factory(Condition::class)->create();
        $fakeCondition = factory(Condition::class)->make()->toArray();

        $updatedCondition = $this->conditionRepo->update($fakeCondition, $condition->id);

        $this->assertModelData($fakeCondition, $updatedCondition->toArray());
        $dbCondition = $this->conditionRepo->find($condition->id);
        $this->assertModelData($fakeCondition, $dbCondition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_condition()
    {
        $condition = factory(Condition::class)->create();

        $resp = $this->conditionRepo->delete($condition->id);

        $this->assertTrue($resp);
        $this->assertNull(Condition::find($condition->id), 'Condition should not exist in DB');
    }
}
