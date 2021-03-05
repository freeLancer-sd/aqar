<?php


namespace App\Http\Controllers\WEB;


use App\Http\Controllers\Controller;
use App\Models\Property;

class HomeWebController extends Controller
{

    public function index()
    {
//        return
        $pays = Property::all();
        $rents = Property::where('property_type', 'إيجار')->get()->take(10);
        return view('welcome', compact(
            'pays', $pays, 'rents', $rents
        ));
    }
}
