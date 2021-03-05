<?php

namespace App\Repositories;

use App\Models\Image as ImageModel;
use App\Models\Property;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        'property_categorie_id',
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
        return Property::class;
    }

    public function index()
    {
        return Property::where('status', 3)
            ->orderBy('id', 'DESC')
            ->paginate(50);
    }

    public function user($id)
    {
        return $this->model->where('user_id', $id)->orderBy('id', 'DESC')->get();
    }

    public function saveImages(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');
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
        return false;
    }

    public function new_create(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
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
                return $imageModel;
            }
        }
        return $model;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|void
     */
    public function new_update(Request $request, $id)
    {
        $input = $request->all();
        $query = $this->model->newQuery();
        $model = $query->findOrFail($id);
        $model->fill($input);
        if ($request->hasFile('image')) {
            $this->saveImage($request);
        }
        $model->save();

    }

    public function saveImage(Request $request)
    {
        $imageModel = new ImageModel();
        foreach ($request->file('image') as $file) {
            $path = 'upload/property/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file);
            $img->save(public_path($path));
            $imageModel->name = $file->getClientOriginalName();
            $imageModel->url = url("/$path");
            $imageModel->property_id = $id;
            $imageModel->save();
            return $imageModel;
        }
    }
}
