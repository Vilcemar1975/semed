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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignUuid('uid_from_who'); //código unico
            $table->biginteger('id_user')->nullable(); // quem cadastrou
            $table->biginteger('id_group')->nullable();
            $table->biginteger('id_author')->nullable();
            $table->string('title')->nullable();
            $table->string('nickname')->nullable();
            $table->string('category')->nullable();
            $table->string('classification')->nullable();//
            $table->string('url')->nullable();
            $table->string('type', 5)->nullable(); //jpeg, png, jpg
            $table->mediumText('description')->nullable();
            $table->string('source', 120)->nullable(); //Fonte da imagem se tiver
            $table->boolean('logo')->default(false); //Se é uma logomarca sim ou não
            $table->boolean('trash')->default(false);
            $table->json('config')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
