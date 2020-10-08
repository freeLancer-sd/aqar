<?php

namespace App\Repositories;

use App\Models\Property;
use App\Repositories\BaseRepository;

/**
 * Class PropertyRepository
 * @package App\Repositories
 * @version October 8, 2020, 5:43 am UTC
*/

class PropertyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'address',
        'lat',
        'lng',
        'status',
        'room_number',
        'property_age',
        'furnished',
        'air_conditioner',
        'space',
        'price',
        'note',
        'property_type_id',
        'property_categorie_id'
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
        return Property::class;
    }
}
