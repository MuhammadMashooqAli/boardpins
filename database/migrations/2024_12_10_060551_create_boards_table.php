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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('board_id')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('privacy');
            $table->integer('follower_count')->default(0);
            $table->integer('collaborator_count')->default(0);
            $table->integer('pin_count')->default(0);
            $table->string('image_cover_url')->nullable();
            $table->timestamp('created_at_board')->nullable();
            $table->timestamp('updated_at_board')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
