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
        Schema::create('group_permission', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('module_permission_id');
            $table->timestamps();

            //Chaves estrangeiras
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('module_permission_id')->references('id')->on('module_permission')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_permission');
    }
};
