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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('uid_from_who'); //código unico
            $table->string('iddequem')->nullable();
            $table->string('codsite')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->json('body')->nullable();
            $table->boolean('trash')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
