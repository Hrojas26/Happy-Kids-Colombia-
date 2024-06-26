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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->date('dateCollection');
            $table->time('timeCollection');
            $table->integer('numberToys');
            $table->string('observations')->nullable();
            $table->unsignedBigInteger('user_id'); // Cambiado a unsignedBigInteger para seguir las convenciones de Laravel
            $table->foreign('user_id')->references('id')->on('users'); // Asumiendo que la tabla de usuarios se llama 'users'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
