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
        Schema::create('andresses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignUuid('uid_from_who'); //código unico
            $table->biginteger('id_user')->nullable(); // quem cadastrou
            $table->biginteger('id_group')->nullable();
            $table->string('from_who')->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('street')->nullable();
            $table->string('number', 5)->nullable();
            $table->string('complement')->nullable();
            $table->string('district')->nullable();
            $table->string('city', 120)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('country', )->nullable();
            $table->string('permission', 20)->nullable();
            $table->boolean('status')->default();
            $table->string('ibge', 10)->nullable();
            $table->string('gia', 5)->nullable();
            $table->string('ddd', 3)->nullable();
            $table->string('siafi', 5)->nullable();
            $table->boolean('trash')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('andresses');
    }
};
