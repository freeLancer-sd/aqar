<?php

namespace App\Repositories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

/**
 * Class SliderRepository
 * @package App\Repositories
 * @version November 7, 2020, 2:22 pm UTC
 */
class SliderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'image_url',
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
        return Slider::class;
    }

    /**
     * @param Request $request
     * @return Model|string
     */
    public function createSlider(Request $request)
    {
        if ($request->hasfile('image_url')) {
            $image = $request->file('image_url');
            $imageModel = new Slider();
            $path = 'upload/slider/' . uniqid() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image);
            $img->save(public_path($path));
            $imageModel->title = $request->title;
            $imageModel->image_url = url("/$path");
            $imageModel->status = $request->status;
            $imageModel->save();
            return $imageModel;
        } else {
            return 'null image File';
        }
    }

    public function allApi()
    {
       return $this->model->where('status', 1)->get();
    }
}
