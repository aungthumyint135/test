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
        Schema::create('latest_news', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('image');
            $table->string('title_en');
            $table->string('title_ch');
            $table->text('text_en');
            $table->text('text_ch');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_news');
    }
};