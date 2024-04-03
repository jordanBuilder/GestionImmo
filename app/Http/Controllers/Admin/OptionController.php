<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Models\Property;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::paginate(25);
        return view('admin.options.index',[
            'options' => $options
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $option = new Option();
       
        
        return view('admin.options.form',[
            'option' => $option
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        // creer une nouvelle propriete
        $option = Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success','L\'option  a bien ét" créé');
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        //on prend en parametre le bien 
        /*ainsi, grace au systeme de model binding qui va trouver automatiquement le bien qui correspond à l'id envoyé dans l'url*/
        return view('admin.options.form',['option' => $option]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'L\'option a bien été mise à jour');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        //
        $option->delete();
        return to_route('admin.property.index')->with('success', 'L\'option a bien été supprimé');
    }
}
