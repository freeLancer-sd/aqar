<?php

namespace App\Repositories;

use App\Models\PropertyCategory;
use App\Repositories\BaseRepository;

/**
 * Class PropertyCategoryRepository
 * @package App\Repositories
 * @version October 8, 2020, 5:43 am UTC
*/

class PropertyCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
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
        return PropertyCategory::class;
    }
}
