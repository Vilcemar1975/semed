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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid'); //código unico
            $table->biginteger('id_user')->nullable(); // quem cadastrou
            $table->biginteger('id_group')->nullable();
            $table->biginteger('id_from_who')->nullable();
            $table->json('creators')->nullable();
            $table->string('title')->nullable();
            $table->string('nickname')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('category', 30)->nullable();
            $table->string('genre', 120)->nullable();
            $table->string('classification')->nullable();
            $table->string('url')->nullable();
            $table->string('type', 5)->nullable(); //jpeg, png, jpg
            $table->string('source', 120)->nullable(); //Fonte da imagem se tiver
            $table->boolean('highlight')->default(false);
            $table->string('position', 50)->nullable();
            $table->boolean('acess')->default(false);
            $table->json('status')->nullable();
            $table->json('config')->nullable();
            $table->boolean('trash')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
