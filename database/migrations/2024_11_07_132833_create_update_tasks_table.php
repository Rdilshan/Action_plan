<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('update_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer(column: 'task_id');
            $table->string(column: 'year');
            $table->string(column: 'KPI');
            $table->string(column: 'percentage');
            $table->string(column: 'review')->nullable();
            $table->json(column: 'files')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('update_tasks');
    }
};
