<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('end_date');
            $table->text('description')->nullable();
            //$table->integer('curriculum_id');
            $table->foreignId('curriculum_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
