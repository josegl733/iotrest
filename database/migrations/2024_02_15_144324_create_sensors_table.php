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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique(); //nombre del sensor 
            $table->string("type"); // tipo de sensors 
            $table->decimal("value", 20, 2); // valor del sensor 
            $table->datetime("date"); // fecha u hora de la lectura
            $table->integer("user_id"); // usuario que realizo la lectura
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors_');
    }
};
