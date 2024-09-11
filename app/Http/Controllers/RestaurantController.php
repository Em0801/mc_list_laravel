<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Services\OverpassService;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $overpassService;

    public function __construct(OverpassService $overpassService)
    {
        $this->overpassService = $overpassService;
    }

    public function index()
    {
        // Mostrar la lista de restaurantes
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
    }

    public function show($id)
    {
        $restaurant = Restaurant::where('osm_id', $id)->firstOrFail();
        return response()->json($restaurant);
    }


    public function updateList()
    {
        // Actualizar la lista de restaurantes desde la API
        try {
            $data = $this->overpassService->fetchRestaurants();
            Restaurant::truncate(); // Eliminar todos los restaurantes previos

            foreach ($data['elements'] as $element) {
                // Verificar si existen las claves 'lat' y 'lon'
                $lat = $element['lat'] ?? null;
                $lon = $element['lon'] ?? null;

                // Crear el restaurante solo si existen las coordenadas
                Restaurant::create([
                    'osm_id' => $element['id'],
                    'name' => $element['tags']['name'] ?? 'McDonald\'s',
                    'lat' => $lat,
                    'lon' => $lon
                ]);
            }

            return response()->json(['message' => 'Lista de restaurantes actualizada.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteAll()
    {
        // Eliminar todos los registros de la tabla
        Restaurant::truncate();
        return response()->json(['message' => 'Todos los registros han sido eliminados.']);
    }
}
