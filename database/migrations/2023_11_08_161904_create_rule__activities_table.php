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
        Schema::create('rule__activities', function (Blueprint $table) {
            $table->id();
            $table->biginteger('id_group')->nullable();
            $table->unsignedBigInteger('id_activities');
            $table->string('title');
            $table->mediumText('rule');
            $table->foreign('id_activities')->references('id')->on('activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rule__activities');
    }
};
