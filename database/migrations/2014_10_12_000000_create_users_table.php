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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('uid_from_who'); //código unico
            $table->string('id_user')->nullable(); //Usuário que Criou a Conta
            $table->string('id_group')->nullable();
            $table->string('matriculation', 50)->nullable();
            $table->string('type_user', 50)->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->json('phones')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->json('configs')->nullable();
            $table->rememberToken();
            $table->string('permission')->default("leitor");
            $table->string('trash')->default(false);
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
