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
            $table->integer(column: 'task_id')->nullable();
            $table->string(column: 'year')->nullable();
            $table->string(column: 'review');
            $table->json(column: 'files');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('update_tasks');
    }
};
