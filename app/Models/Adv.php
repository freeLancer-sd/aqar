<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Adv",
 *      required={"status", "property_categorie_id", "user_id", "city_id", "district_id"},
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
 *          property="bath_number",
 *          description="bath_number",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="hall_number",
 *          description="hall_number",
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
 *          property="land_number",
 *          description="land_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="destination",
 *          description="destination",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="advertiser_status",
 *          description="advertiser_status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="floor",
 *          description="floor",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="the_number_stores",
 *          description="the_number_stores",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="the_number_apartments",
 *          description="the_number_apartments",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="street_area",
 *          description="street_area",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="the_purpose",
 *          description="the_purpose",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="wells",
 *          description="wells",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rental_type",
 *          description="rental_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rental_data",
 *          description="rental_data",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="property_type",
 *          description="property_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="car_entrance",
 *          description="car_entrance",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="deluxe",
 *          description="deluxe",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="kitchen",
 *          description="kitchen",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="swimming_pool",
 *          description="swimming_pool",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="driver_room",
 *          description="driver_room",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="maids_room",
 *          description="maids_room",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="elevator",
 *          description="elevator",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="furnished",
 *          description="furnished",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="cellar",
 *          description="cellar",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="courtyard",
 *          description="courtyard",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="extension",
 *          description="extension",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="property_categorie_id",
 *          description="property_categorie_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
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
 *      ),
 *      @SWG\Property(
 *          property="city_id",
 *          description="city_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="district_id",
 *          description="district_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status_mobile",
 *          description="status_mobile",
 *          type="boolean"
 *      )
 * )
 */
class Adv extends Model
{
    use SoftDeletes;

    public $table = 'properties';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $fillable = [
        'title',
        'status',
        'note',
        'property_categorie_id',
        'user_id',
        'city_id',
        'district_id',
        'ads_mobile'
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
        'ads_mobile'=> 'string',
        'lat' => 'float',
        'lng' => 'float',
        'status' => 'integer',
        'space' => 'integer',
        'price' => 'float',
        'note' => 'string',
        'property_categorie_id' => 'integer',
        'user_id' => 'integer',
        'city_id' => 'integer',
        'district_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:191',
        'status' => 'required|integer',
        'note' => 'nullable|string',
        'ads_mobile'=> 'required|max:22'
    ];

    /**
     * @return BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * @return BelongsTo
     **/
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

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
