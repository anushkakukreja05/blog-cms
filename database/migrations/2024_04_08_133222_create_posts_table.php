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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('excerpt');
            $table->text('body');
            $table->string('image_path');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
