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
        Schema::create('pppvotes', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id ');
            $table->unsignedBigInteger('pppposts_id');
            $table->boolean('vote');
            $table->foreign('pppposts_id')->references('id')->on('pppposts')->onDelete('cascade');
            $table->foreign('users_id ')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['users_id ', 'pppposts_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pppvotes');
    }
};