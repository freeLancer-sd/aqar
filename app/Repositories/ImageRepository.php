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
        'user_id',
        'fileName'
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

//    public function createApi(Request $request)
//    {
//        $folderPath = $request->fileName;
//        if ($request->hasfile('images')) {
//            $image = $request->file('images');
//            $imageModel = new ImageModel();
//            $path = "upload/$folderPath/" . uniqid() . '.' . $image->getClientOriginalExtension();
//            $img = Image::make($image);
//            $img->save(public_path($path));
//            $imageModel->name = $image->getClientOriginalName();
//            $imageModel->url = url("/$path");
//            $imageModel->property_id = $request->property_id;
//            $imageModel->user_id = $request->user_id;
//            $imageModel->save();
//            return $imageModel;
//        }
//    }

    public function createApi(Request $request)
    {

        if ($request->hasfile('images')) {
            if (isset($request->user_id)) {

                return $this->save_user($request);
            }
            if (isset($request->property_id)) {

                return $this->save_property($request);
            }
        }
        return false;

    }

    private function save_property(Request $request)
    {
        $folderPath = $request->fileName;
        $image = $request->file('images');
        $imageModel = new ImageModel();
        $path = "upload/$folderPath/" . uniqid() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image);

        /* insert watermark at bottom-right corner with 10px offset */
//        $img->insert(public_path('mark.png'), 'bottom-right', 10, 10);
        $img->insert(public_path('mark.png'), 'top', 50, 50);
        $img->save(public_path($path));
        $imageModel->name = $image->getClientOriginalName();
        $imageModel->url = url("/$path");
        $imageModel->property_id = $request->property_id;
        $imageModel->user_id = $request->user_id;
        $imageModel->save();
        return $imageModel;

    }

    private function save_user(Request $request)
    {
        $folderPath = $request->fileName;
        $image = $request->file('images');
//        $path = "upload/$folderPath/" . 'profile_u_' . $request->user_id . '.' . $image->getClientOriginalExtension();
        $path = "upload/$folderPath/" . 'profile_u_' . $request->user_id . '.' . 'png';

        $imageModel = ImageModel::where('user_id', $request->user_id)
            ->first();
//            ->firstOrCreate([
//            'name' => $image->getClientOriginalName(),
//            'url' => url("/$path"),
//            'user_id' => $request->user_id
//        ]);
        $img = Image::make($image);
        /* insert watermark at bottom-right corner with 10px offset */
        $img->insert(public_path('mark.png'), 'bottom-right', 50, 50);
        $img->save(public_path($path));
        if ($imageModel) {
            $imageModel->name = $image->getClientOriginalName();
            $imageModel->url = url("/$path");
            $imageModel->user_id = $request->user_id;
            $imageModel->save();
            return $imageModel;
        }
        else{
            $imageModel = new ImageModel();
            $imageModel->name = $image->getClientOriginalName();
            $imageModel->url = url("/$path");
            $imageModel->user_id = $request->user_id;
            $imageModel->save();
            return $imageModel;
        }
    }
}
