<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datos_img', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_url')->nullable;
            $table->string('nombre_descrip')->nullable;
            $table->string('etiqueta')->nullable;
            $table->string('fecha')->nullable;
            $table->string('descripcion')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_img');
    }
};
