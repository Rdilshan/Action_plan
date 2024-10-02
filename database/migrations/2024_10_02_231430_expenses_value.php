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
        Schema::create('exonensesValue', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('Type', ['Transport', 'Accommodation', 'Others']);
            $table->integer('no_unit');
            $table->decimal('totalKM', 8, 2);
            $table->decimal('unit_cost', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->integer(column: 'task_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exonensesValue');
    }
};
