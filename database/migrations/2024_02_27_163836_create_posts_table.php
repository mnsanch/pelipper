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
        Schema::create('pppposts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_User');
            $table->foreign('ID_User')->references('id')->on('pppussers')->onDelete('cascade');
            $table->unsignedBigInteger('ID_Category');
            $table->foreign('ID_Category')->references('id')->on('pppcategory_names')->onDelete('cascade');
            $table->string('Post');
            $table->integer('Upvote')->default(0);
            $table->integer('Downvote')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pppposts');
    }
};
