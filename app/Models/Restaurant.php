<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // Asegúrate de agregar todos los campos que necesitas
    protected $fillable = [
        'osm_id',     // ID de OpenStreetMap
        'name',       // Nombre del restaurante
        'lat',        // Latitud
        'lon',        // Longitud
    ];
}
