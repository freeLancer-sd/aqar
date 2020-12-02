<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\BaseRepository;

/**
 * Class SettingRepository
 * @package App\Repositories
 * @version December 2, 2020, 5:36 pm UTC
*/

class SettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Setting::class;
    }
}
