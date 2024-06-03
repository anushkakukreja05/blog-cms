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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->text('body');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');

            $table->foreign('comment_id')
                  ->references('id')
                  ->on('comments');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
