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
        Schema::create('documentations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->nullable()->default(null);
            $table->string('codsite')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->default(12);
            $table->string('cpf', 20)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('cnh', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('pispasep', 20)->nullable();
            $table->mediumText('obs')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentations');
    }
};
