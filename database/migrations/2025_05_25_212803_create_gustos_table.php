<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGustosTable extends Migration
{
    public function up(): void
    {
        Schema::create('gustos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->boolean('comida_tipica')->default(false);
            $table->boolean('comida_rapida')->default(false);
            $table->boolean('comida_saludable')->default(false);
            $table->boolean('arroz_especial')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gustos');
    }
}
