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
        Schema::create('specificlinks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid'); //código unico
            $table->biginteger('id_user')->nullable();
            $table->biginteger('id_group')->nullable();
            $table->string('name');
            $table->string('url_image');
            $table->json('status')->nullable();
            $table->json('config')->nullable();
            $table->boolean('access')->default(false);
            $table->boolean('trash')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specificlinks');
    }
};
