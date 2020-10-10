<?php

namespace App\Repositories;

use App\Models\Image as ImageModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

/**
 * Class ImageRepository
 * @package App\Repositories
 * @version October 8, 2020, 5:43 am UTC
 */

class ImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'url',
        'property_id',
        'user_id'
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
        return ImageModel::class;
    }

    public function createApi(Request $request)
    {
        if ($request->hasfile('images')) {
            $image = $request->file('images');
            $imageModel = new ImageModel();
            $path = 'upload/property/' . uniqid() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image);
            $img->save(public_path($path));
            $imageModel->name = $image->getClientOriginalName();
            $imageModel->url = url("/$path");
            $imageModel->property_id = $request->property_id;
            $imageModel->user_id = $request->user_id;
            $imageModel->save();
            return $imageModel;
        }
    }
}
