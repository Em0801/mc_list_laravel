<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

//Ruta index - Listar restaurantes
Route::get('/', [RestaurantController::class, 'index']);

//Mostrar restaurante en particular
Route::get('/get/{id}', [RestaurantController::class, 'show']);

//Actualizar los registros de restaurantes
Route::get('/update-list', [RestaurantController::class, 'updateList']);

//Eliminar todos los registros de restaurantes
Route::get('/delete-all', [RestaurantController::class, 'deleteAll']);