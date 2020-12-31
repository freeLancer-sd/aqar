<?php

namespace App\Repositories;

use App\Models\Adv;
use App\Models\Image as ImageModel;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

/**
 * Class AdvRepository
 * @package App\Repositories
 * @version December 31, 2020, 4:25 am UTC
 */
class AdvRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status',
        'note',
        'property_categorie_id',
        'user_id',
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
        return Adv::class;
    }

    public function new_create(Request $request)
    {
        $prop_cat = PropertyCategory::where('title', 'إعلان')->first('id');
        $input = $request->all();
        $input['user_id'] = Auth()->user()->id;
        $input['district_id'] = 1;
        $input['city_id'] = 1;
        $input['property_categorie_id'] = $prop_cat->id;

        $model = $this->model->newInstance($input);

        $model->save();
//         $model;
        if ($model && $request->hasFile('image')) {


            $imageModel = new ImageModel();
            foreach ($request->file('image') as $file) {
                $path = 'upload/property/' . uniqid() . '.' . $file->getClientOriginalExtension();
                $img = Image::make($file);
                $img->save(public_path($path));
                $imageModel->name = $file->getClientOriginalName();
                $imageModel->url = url("/$path");
                $imageModel->property_id = $model->id;
                $imageModel->save();
                $data[] = $imageModel;
            }
            return $data;
        }
//        return $model;
    }
}
