<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="District",
 *      required={"name", "number", "city_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="number",
 *          description="number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="city_id",
 *          description="city_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class District extends Model
{
    use SoftDeletes;

    public $table = 'districts';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'number',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'number' => 'string',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:190',
        'number' => 'required|string|max:190|min:1',
        'city_id' => 'required'
    ];

    /**
     * @return BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
