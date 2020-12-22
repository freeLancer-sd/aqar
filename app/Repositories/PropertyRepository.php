<?php

namespace App\Repositories;

use App\Models\Image as ImageModel;
use App\Models\Property;
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
            ->where('lat', '!=', '')
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
}
