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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->bigInteger('id_user');
            $table->bigInteger('id_group');
            $table->string('title')->nullable();
            $table->string('lei')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('year')->nullable();
            $table->tinyInteger('highlight')->nullable();
            $table->string('position_special', 100)->nullable();
            $table->string('access', 10)->nullable();
            $table->json('status')->nullable();
            $table->json('config')->nullable();
            $table->tinyInteger('trash')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
