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
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullabe();
            $table->text('card_html');
            $table->string('image')->nullabe();
            $table->foreignId('created_by')->constrained('users');
            $table->string('pin_id')->nullable();
            $table->string('board_id')->nullable();
            $table->string('btn_link')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('publish_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};
