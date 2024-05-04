<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchPropertiesRequest;

use App\Models\Property;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request){
        //quand on fait paginate ou limit cela va generer un builder et c'est grace à ça on va generer une requete
         //et partir de là il appelle les methodes
        $query = Property::query()->orderBy('created_at','desc');

        if($request->validated('price')){
           $query = $query->where('price','<=', $request->validated('price'));
        }

        if($request->validated('surface')){
           $query = $query->where('surface','>=', $request->validated('surface'));
        }

        if($request->validated('rooms')){
           $query = $query->where('price','>=', $request->validated('rooms'));
        }
        if($request->validated('title')){
           $query = $query->where('title','like', "%{$request->validated('title')}%");
        }

       return view('property.index',[
        'properties'=> $query->paginate(16),
        'validated'=>$request->validated()
       ]);
    }

    //pour afficher un bien particulier, on prendra en parametre un string et l'id de la proprieté
    public function show(string $slug, Property $property){
      $expectedSlug = $property->getSlug();
      if ($slug != $property->getSlug()) {
         return to_route('property.show',['slug' => $expectedSlug,
         'property' => $property]);
      }
      return view('property.show',[
         'property'=>$property
      ]);
    }


}
