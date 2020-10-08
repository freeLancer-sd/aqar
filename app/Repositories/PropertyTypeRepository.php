<?php

namespace App\Repositories;

use App\Models\PropertyType;
use App\Repositories\BaseRepository;

/**
 * Class PropertyTypeRepository
 * @package App\Repositories
 * @version October 8, 2020, 5:43 am UTC
*/

class PropertyTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status'
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
        return PropertyType::class;
    }
}
