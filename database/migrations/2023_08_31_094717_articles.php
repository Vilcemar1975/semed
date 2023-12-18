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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignUuid('uid_from_who')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->bigInteger('id_group')->nullable();
            $table->bigInteger('creators')->nullable();
            $table->string('category');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('nickname')->nullable();
            $table->json('status')->nullable();
            $table->json('config')->nullable();
            $table->boolean('highlight')->nullable();
            $table->string('special_position')->nullable();
            $table->string('acesso')->nullable();
            $table->boolean('trash')->default(false);

            // Definir as chaves estrangeiras, se necessário
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
