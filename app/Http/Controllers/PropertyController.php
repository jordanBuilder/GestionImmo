<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Property;
class PropertyController extends Controller
{
    public function index(){
       $properties = Property::paginate(4);
       return view('property.index',[
        'properties'=> $properties
       ]);
    }
    
    //pour afficher un bien particulier, on prendra en parametre un string et l'id de la proprieté
    public function show(string $slug, Property $property){

    }
}
