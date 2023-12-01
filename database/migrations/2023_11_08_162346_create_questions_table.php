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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('uid_from_who'); //código unico
            $table->biginteger('id_user')->nullable(); // quem cadastrou
            $table->biginteger('id_group')->nullable();
            $table->json('creators')->nullable();
            $table->string('category', 30)->nullable();
            $table->string('title')->nullable();
            $table->string('nickname')->nullable();
            $table->string('level', 50)->nullable();
            $table->mediumText('to_ask')->nullable();
            $table->float('value', 3, 2)->nullable();
            $table->string('material')->nullable();
            $table->json('response')->nullable();
            $table->boolean('image')->default(false); //verdadeiro se tive imagem na atividade
            $table->longText('observation')->nullable();
            $table->boolean('acess')->default(false);
            $table->boolean('public')->nullable();
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
        Schema::dropIfExists('questions');
    }
};
