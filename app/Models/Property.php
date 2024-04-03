<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function options():BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
}