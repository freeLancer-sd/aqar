<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Property",
 *      required={"status", "property_age", "property_categorie_id", "user_id"},
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
 *       @SWG\Property(
 *          property="property_type",
 *          description="property_type",
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
 *          property="destination",
 *          description="destination",
 *          type="string"
 *      ),
@SWG\Property(
 *          property="advertiser_status",
 *          description="advertiser_status",
 *          type="string"
 *      ),
 * @SWG\Property(
 *          property="land_number",
 *          description="land_number",
 *          type="number"
 *      ),
 * @SWG\Property(
 *          property="floor",
 *          description="floor",
 *          type="number"
 *      ), @SWG\Property(
 *          property="the_number_apartments",
 *          description="the_number_apartments",
 *          type="number"
 *      ),
 * @SWG\Property(
 *          property="the_number_stores",
 *          description="the_number_stores",
 *          type="number"
 *      ),
 * @SWG\Property(
 *          property="property_categorie_id",
 *          description="property_categorie_id",
 *          type="integer",
 *          format="int32"
 *      ),
 * @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 * @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      ),
 * @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 * @SWG\Property(
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
    protected $with = ['images', 'propertyCategorie', 'user'];


    public $fillable = [
        'title',
        'address',
        'lat',
        'lng',
        'status',
        'room_number',
        'property_age',
        'bath_number',
        'hall_number',
        'furnished',
        'air_conditioner',
        'space',
        'price',
        'note',
        'land_number',
        'destination',
        'advertiser_status',
        'floor',
        'the_number_stores',
        'the_number_apartments',
        'deluxe',
        'kitchen',
        'swimming_pool',
        'driver_room',
        'maids_room',
        'elevator',
        'street_area',
        'car_entrance',
        'the_purpose',
        'wells',
        'rental_type',
        'courtyard',
        'cellar',
        'extension',
        'property_type',
        'property_categorie_id',
        'user_id'
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
        'hall_number' => 'integer',
        'bath_number' => 'integer',
        'furnished' => 'integer',
        'air_conditioner' => 'integer',
        'space' => 'integer',
        'price' => 'float',
        'note' => 'string',
        'land_number' => 'integer',
        'destination' => 'string',
        'advertiser_status' => 'string',
        'floor' => 'integer',
        'the_number_stores' => 'integer',
        'the_number_apartments' => 'integer',
        'wells' => 'integer',
        'rental_type' => 'string',
        'property_type' => 'string',
        'street_area' => 'string',
        'car_entrance' => 'boolean',
        'the_purpose' => 'string',
        'deluxe' => 'boolean',
        'kitchen' => 'boolean',
        'courtyard' => 'boolean',
        'cellar' => 'boolean',
        'swimming_pool' => 'boolean',
        'driver_room' => 'boolean',
        'extension' => 'boolean',
        'maids_room' => 'boolean',
        'elevator' => 'boolean',
        'property_categorie_id' => 'integer',
        'user_id' => 'integer'
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
        'status' => 'integer',
        'property_type' => 'required|string',
        'room_number' => 'nullable|integer',
        'furnished' => 'nullable|integer',
        'air_conditioner' => 'nullable|integer',
        'space' => 'required|integer',
        'price' => 'required|numeric',
        'note' => 'nullable|string',
        'property_categorie_id' => 'required',
        'user_id' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return BelongsTo
     **/
    public function propertyCategorie()
    {
        return $this->belongsTo(PropertyCategory::class, 'property_categorie_id');
    }

    /**
     * @return BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasMany
     **/
    public function images()
    {
        return $this->hasMany(Image::class, 'property_id');
    }
}
