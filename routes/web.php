<?php

use Illuminate\Support\Facades\Route;


$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/biens', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');

Route::get('/biens/{slug}-{property}', [App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where(['property'=> $idRegex,
 'slug'=> $slugRegex
]);


Route::prefix('admin')->name('admin.')->group(function(){
   Route::resource('property',App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
   
   Route::resource('option',App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});
