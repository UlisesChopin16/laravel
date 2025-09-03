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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('book_id');
            $table->text('review');
            $table->unsignedTinyInteger('rating');

            $table->timestamps();
            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            // if in the method constrained the parameter `table` is null,
            // the foreign key constraint will be applied to the `id` column of the `books` table
            // using the column name of method foreignId
            // for example if column name is book_id, the foreign key constraint will be applied to the `id` column of the `books` table
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
