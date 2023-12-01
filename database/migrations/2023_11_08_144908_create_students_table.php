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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('uid_from_who'); //código unico
            $table->biginteger('id_user')->nullable();
            $table->biginteger('id_group')->nullable();
            $table->biginteger('id_school')->nullable();
            $table->biginteger('id_schedule')->nullable();
            $table->string('room', 15)->nullable();
            $table->string('series', 2)->nullable();
            $table->boolean('access')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
