<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Setting",
 *      required={""},
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
 *          property="version",
 *          description="version",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="version_last",
 *          description="version_last",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="primary_color",
 *          description="primary_color",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="secondary_color",
 *          description="secondary_color",
 *          type="string"
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
 *          property="logo",
 *          description="logo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobile_first",
 *          description="mobile_first",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobile_secondary",
 *          description="mobile_secondary",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="whats_app_first",
 *          description="whats_app_first",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="whats_app_secondary",
 *          description="whats_app_secondary",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fb_page",
 *          description="fb_page",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tw_page",
 *          description="tw_page",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="snp_page",
 *          description="snp_page",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ins_page",
 *          description="ins_page",
 *          type="string"
 *      )
 * )
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'version',
        'version_last',
        'primary_color',
        'secondary_color',
        'logo',
        'mobile_first',
        'mobile_secondary',
        'whats_app_first',
        'whats_app_secondary',
        'fb_page',
        'tw_page',
        'snp_page',
        'ins_page'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'version' => 'string',
        'version_last' => 'string',
        'primary_color' => 'string',
        'secondary_color' => 'string',
        'logo' => 'string',
        'mobile_first' => 'string',
        'mobile_secondary' => 'string',
        'whats_app_first' => 'string',
        'whats_app_secondary' => 'string',
        'fb_page' => 'string',
        'tw_page' => 'string',
        'snp_page' => 'string',
        'ins_page' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:191',
        'version' => 'nullable|string|max:191',
        'version_last' => 'nullable|string|max:191',
        'primary_color' => 'nullable|string|max:191',
        'secondary_color' => 'nullable|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'logo' => 'nullable|string|max:191',
        'mobile_first' => 'nullable|string|max:191',
        'mobile_secondary' => 'nullable|string|max:191',
        'whats_app_first' => 'nullable|string|max:191',
        'whats_app_secondary' => 'nullable|string|max:191',
        'fb_page' => 'nullable|string|max:191',
        'tw_page' => 'nullable|string|max:191',
        'snp_page' => 'nullable|string|max:191',
        'ins_page' => 'nullable|string|max:191'
    ];

    
}
