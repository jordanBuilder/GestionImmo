<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(){

    }
    
    //pour afficher un bien particulier, on prendra en parametre un string et l'id de la proprieté
    public function show(string $slug, Property $property){

    }
}
