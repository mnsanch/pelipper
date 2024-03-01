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
        Schema::create('pppussers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Avatar');
            $table->foreign('ID_Avatar')->references('id')->on('pppavatars')->onDelete('cascade');
            $table->unsignedBigInteger('ID_Rol');
            $table->foreign('ID_Rol')->references('id')->on('ppprols')->onDelete('cascade');
            $table->string('Username');
            $table->string('Mail')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pppussers');
    }
};
