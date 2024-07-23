<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->text('name');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            // Chaves estrangeiras:
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
