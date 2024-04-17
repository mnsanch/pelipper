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
        Schema::create('ppppost_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('pppcategories_id');
            $table->unsignedBigInteger('pppposts_id');
            $table->foreign('pppcategories_id')->references('id')->on('pppcategories')->onDelete('cascade');
            $table->foreign('pppposts_id')->references('id')->on('pppposts')->onDelete('cascade');
            $table->primary(['pppcategories_id', 'pppposts_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppppost_categories');
    }
};
