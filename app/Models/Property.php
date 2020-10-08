<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Property",
 *      required={"status", "room_number", "property_age", "property_type_id", "property_categorie_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lat",
 *          description="lat",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="lng",
 *          description="lng",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="room_number",
 *          description="room_number",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="property_age",
 *          description="property_age",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="furnished",
 *          description="furnished",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="air_conditioner",
 *          description="air_conditioner",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="space",
 *          description="space",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="note",
 *          description="note",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="property_type_id",
 *          description="property_type_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="property_categorie_id",
 *          description="property_categorie_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Property extends Model
{
    use SoftDeletes;

    public $table = 'properties';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'address' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'status' => 'integer',
        'room_number' => 'integer',
        'property_age' => 'integer',
        'furnished' => 'integer',
        'air_conditioner' => 'integer',
        'space' => 'integer',
        'price' => 'float',
        'note' => 'string',
        'property_type_id' => 'integer',
        'property_categorie_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:191',
        'address' => 'nullable|string|max:191',
        'lat' => 'nullable|numeric',
        'lng' => 'nullable|numeric',
        'status' => 'required|integer',
        'room_number' => 'required|integer',
        'property_age' => 'required|integer',
        'furnished' => 'nullable|integer',
        'air_conditioner' => 'nullable|integer',
        'space' => 'nullable|integer',
        'price' => 'nullable|numeric',
        'note' => 'nullable|string',
        'property_type_id' => 'required',
        'property_categorie_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propertyCategorie()
    {
        return $this->belongsTo(\App\Models\PropertyCategory::class, 'property_categorie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propertyType()
    {
        return $this->belongsTo(\App\Models\PropertyType::class, 'property_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class, 'property_id');
    }
}
