<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    public function up(): void
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('categoria'); // comida_tipica, comida_rapida, saludable, arroz
            $table->string('especialidades');
            $table->string('ubicacion');
            $table->string('contacto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
}

