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
            $table->id();
            $table->string('name');
            $table->integer('unit');
            $table->decimal('unit_cost', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->integer('task_id');
            $table->timestamps();
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
