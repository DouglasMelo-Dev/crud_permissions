<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('module_permission', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();

            // Chaves estrangeiras:
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('module_permission');
    }
};
