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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Task-specific fields
            $table->string('Title');
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->text('introduction')->nullable();

            $table->text('Note')->nullable();

            $table->string('File')->nullable();
            $table->string('name')->nullable();

            $table->string('review')->nullable();


            // Foreign key to link to subactions table
            $table->unsignedBigInteger('subaction_id');
            $table->foreign('subaction_id')->references('id')->on('subactions')->onDelete('cascade');

            // Foreign key to link tasks to users table
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
