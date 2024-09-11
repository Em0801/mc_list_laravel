<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OverpassService;
use App\Models\Restaurant;

class UpdateRestaurantList extends Command
{
    protected $signature = 'restaurants:update-list';
    protected $description = 'Actualizar la lista de restaurantes McDonald\'s en Cataluña';

    protected $overpassService;

    public function __construct(OverpassService $overpassService)
    {
        parent::__construct();
        $this->overpassService = $overpassService;
    }

    public function handle()
    {
        $this->info('Actualizando la lista de restaurantes...');

        try {
            $data = $this->overpassService->fetchRestaurants();
            Restaurant::truncate();

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

            $this->info('Lista de restaurantes actualizada exitosamente.');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }

        return 0;
    }
}
