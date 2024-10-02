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
        Schema::create('FundingValue', function (Blueprint $table) {
            $table->id(); // Primary key (auto-increment)
            $table->string('name');
            $table->integer('unit');
            $table->integer('unit_charge');
            $table->integer('amount');
            $table->integer('amount');
            $table->integer('task_id');
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FundingValue');
    }
};
