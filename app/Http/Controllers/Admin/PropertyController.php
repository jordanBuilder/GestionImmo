<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;

use App\Models\Property;

use Illuminate\Http\Request;

use App\Models\Option;

use App\Http\Requests\Admin\OptionFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('created_at','desc')->paginate(25);
        return view('admin.properties.index',[
            'properties' => $properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' =>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=>'Lomé',
            'codePostal'=>'56BP8080',
            'sold'=>false,
        ]);
        //pluck('id') veut dire qu'on veut recupérer l'ensemble des id
        
        return view('admin.properties.form',[
            'property' => $property,
            'options'=> Option::pluck('name','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {   
        $property = Property::create($request->validated());
        
        $property->options()->sync($request->validated('options'));
        // creer une nouvelle propriete
       
        return redirect()->route('admin.property.index')->with('success','Le bien a bien été créé');
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //on prend en parametre le bien 
        /*ainsi, grace au systeme de model binding qui va trouver automatiquement le bien qui correspond à l'id envoyé dans l'url*/
        return view('admin.properties.form',['property' => $property,
        'options'=>Option::pluck('name','id'),
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {   
        $property->options()->sync($request->validated('options'));
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'Le bien a bien été mis à jour');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a bien été supprimé');
    }
}
