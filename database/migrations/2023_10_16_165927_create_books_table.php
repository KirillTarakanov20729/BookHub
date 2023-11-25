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
            $table->timestamps();

            $table->string("name");

            $table->foreignId("author_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("genre_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->decimal("rating", 3, 1)->nullable();
            $table->text("description");
            $table->text("full_description");
            $table->string("link");
            $table->integer("subLevel");
            $table->string("image_path");
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
