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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignUuid('uid_from_who'); //código unico
            $table->biginteger('id_user')->nullable(); // quem cadastrou
            $table->biginteger('id_group')->nullable();
            $table->biginteger('id_from_who')->nullable();
            $table->string('title')->nullable();
            $table->string('nickname')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('category', 30)->nullable();
            $table->date('date_start')->nullable();
            $table->time('hour_start', $precision = 0);
            $table->date('date_end')->nullable();
            $table->time('hour_end', $precision = 0);
            $table->boolean('highlight')->default(false);
            $table->string('position', 50)->nullable();
            $table->boolean('acess')->default(false);
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
        Schema::dropIfExists('events');
    }
};
