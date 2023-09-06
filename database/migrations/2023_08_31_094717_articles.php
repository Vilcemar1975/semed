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
            $table->string('codsite')->nullable();
            $table->biginteger('id_user')->nullable();
            $table->biginteger('id_group')->nullable();
            $table->json('creators')->nullable();
            $table->string('title');
            $table->string('nickname')->unique();
            $table->string('subtitle')->nullable();
            $table->string('category')->nullable();
            $table->longText('text')->nullable();
            $table->boolean('detach')->nullable()->default(false);
            $table->json('url_image')->nullable(); //recebe um array de url de imagens
            $table->string('position', 50)->nullable();
            $table->json('config')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->boolean('access')->nullable()->default(false);
            $table->boolean('trash')->nullable()->default(false);
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
