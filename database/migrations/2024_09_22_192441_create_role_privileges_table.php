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
        Schema::create('role_privileges', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_group_id');
            $table->tinyInteger('view')->default(0);
            $table->tinyInteger('edit')->default(0);
            $table->tinyInteger('full')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')
                ->on('roles')->cascadeOnDelete();

            $table->foreign('permission_group_id')->references('id')
                ->on('permission_groups')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_privileges');
    }
};
