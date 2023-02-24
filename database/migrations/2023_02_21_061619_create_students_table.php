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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('level_id')->constrained()->cascadeOnDelete();
            $table->boolean('active')->defaultTrue();
            $table->boolean('assigned')->defaultTrue();
            $table->date('join_date')->nullable();
            $table->string('guardian1')->nullable();
            $table->string('guardian1_relationship')->nullable();
            $table->string('guardian2')->nullable();
            $table->string('email1')->nullable();
            $table->string('contact1')->nullable();
            $table->string('guardian2_relationship')->nullable();
            $table->string('email2')->nullable();
            $table->string('contact2')->nullable();
            $table->string('lrn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
