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
        Schema::create('taskpublics', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignUuid('uid_from_who');
            $table->date('date_start')->nullable();
            $table->time('hour_start', $precision = 0);
            $table->date('date_end')->nullable();
            $table->time('hour_end', $precision = 0)->nullable();
            $table->string('total_dias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taskpublics');
    }
};
