<?php


namespace App\Http\Controllers\WEB;


use App\Http\Controllers\Controller;
use App\Models\Property;

class HomeWebController extends Controller
{

    public function index()
    {
        $pays = Property::where('property_type', 'بيع')->take(10);
        $rents = Property::where('property_type', 'إيجار')->take(10);
        return view('welcome', compact(
            'pays', 'rents'
        ));
    }
}
