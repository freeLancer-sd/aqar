<?php

namespace App\Repositories;

use App\Models\Condition;
use App\Repositories\BaseRepository;

/**
 * Class ConditionRepository
 * @package App\Repositories
 * @version November 7, 2020, 3:29 pm UTC
*/

class ConditionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'body'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Condition::class;
    }
}
