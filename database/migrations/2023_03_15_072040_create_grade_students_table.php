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
        Schema::create('grade_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_student_id')->constrained()->cascadeOnDelete();
            $table->json('q1')->nullable();
            $table->json('q2')->nullable();
            $table->json('q3')->nullable();
            $table->json('q4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_students');
    }
};
