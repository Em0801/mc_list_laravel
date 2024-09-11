<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('osm_id')->unique();
            $table->string('name');
            $table->decimal('lat', 10, 8)->nullable();  // Permitir nulos en latitud
            $table->decimal('lon', 11, 8)->nullable();  // Permitir nulos en longitud
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
