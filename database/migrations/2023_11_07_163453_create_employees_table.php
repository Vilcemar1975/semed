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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('uid_from_who'); //código unico
            $table->string('from_who')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->string('pis_pasep', 50)->nullable();
            $table->string('role', 50)->nullable();
            $table->string('tableau', 50)->nullable();
            $table->string('placement', 50)->nullable();
            $table->string('employee', 50)->nullable();
            $table->boolean('status')->default(false);
            $table->date('admission')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->boolean('trash')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
