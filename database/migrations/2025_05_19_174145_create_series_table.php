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
        Schema::create('series', function (Blueprint $table) {
            $table->id();

            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->foreignId('subtitle_id')->constrained('subtitles')->onDelete('cascade');

            $table->string('series');
            $table->string('isbn')->unique();
            
            $table->string('cover_image');
            $table->text('description');
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
