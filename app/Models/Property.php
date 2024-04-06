<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "surface",
        "price",
        "city",
        "rooms",
        "bedRooms",
        "floor",
        "address",
        "codePostal",
        "sold",

    ];

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
    // Un slug est une version conviviale d'un texte, généralement utilisé dans les URLs pour identifier une ressource de maniere lisible, comprehensible et mémorisable par l'homme
    
    public function getSlug():string{
        //A l'appel de la methode getSlug, elle prend le titre de la ressource c-a-d $this->title et génère un slug à partir de celui-ci en utilisant Str::slug(): C'est une fonction qui remplace les caractères spéciaux et les espaces par des tirets

        return Str::slug($this->title);
    }
}
