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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignId('id_user');
            $table->foreignId('id_group')->nullable();
            $table->tinyInteger('region');
            $table->string('inep', 10);
            $table->date('date_open')->nullable();
            $table->string('name');
            $table->string('unit')->nullable();
            $table->string('nickname')->nullable();
            $table->json('phones')->nullable();
            $table->json('emails')->nullable();
            $table->string('type', 10)->nullable();
            $table->string('level', 100)->nullable();
            $table->longText('description')->nullable();
            $table->json('direction')->nullable();
            $table->json('structure')->nullable();
            $table->json('config')->nullable();
            $table->json('status')->nullable();
            $table->json('social_media')->nullable();
            $table->boolean('highlight')->nullable();
            $table->string('special_position')->nullable();
            $table->string('acesso')->nullable();
            $table->boolean('trash')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
