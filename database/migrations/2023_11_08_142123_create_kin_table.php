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
        Schema::create('kin', function (Blueprint $table) {
            $table->id();
            $table->string('from_who')->nullable();
            $table->biginteger('id_group')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->string('grandfather', 20)->nullable();
            $table->string('father', 20)->nullable();
            $table->string('child', 20)->nullable();
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
        Schema::dropIfExists('kin');
    }
};
