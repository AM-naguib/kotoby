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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean("status")->default(1);
            $table->integer('no_pages')->nullable();
            $table->string("lang")->nullable();
            $table->string("size")->nullable();
            $table->text("image_url")->nullable();
            $table->text("pdf_url")->nullable();
            $table->foreignId('author_id')->nullable()->constrained('authors');
            $table->foreignId('section_id')->nullable()->constrained('sections');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
