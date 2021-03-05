<?php


namespace App\Http\Controllers\WEB;


use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Property;

class HomeWebController extends Controller
{

    public function index()
    {
//        return
        $pays = Property::where('property_type', 'بيع')->get()->take(10);
        $rents = Property::where('property_type', 'إيجار')->get()->take(10);
        return$offers = Image::where('property_id', '!=', null)->with('property')->get();
        return view('welcome', compact(
            'pays', $pays, 'rents', $rents, 'offers', $offers
        ));
    }
}
