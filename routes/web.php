<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function(){
   Route::resource('property',App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
   
   Route::resource('option',App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});