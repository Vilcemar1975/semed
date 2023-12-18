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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('uid_from_who')->nullable();
            $table->unsignedBigInteger('id_articles');
            $table->integer('position')->default(3);
            $table->string('title');
            $table->string('nickname');
            $table->longText('text');
            $table->boolean('public')->default(false);
            $table->foreign('id_articles')->references('id')->on('articles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
