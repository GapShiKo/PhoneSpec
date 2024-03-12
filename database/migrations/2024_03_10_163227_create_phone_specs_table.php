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
        Schema::create('phone_specs', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("date");
            $table->string("memory");
            $table->string("SoC");
            $table->string("cameras");
            $table->string("thumbnail")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_specs');
    }
};
