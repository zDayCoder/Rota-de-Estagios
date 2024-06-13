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
        Schema::create('vacancy', function (Blueprint $table) {
            $table->increments('vaga_id'); // Primary key with auto-increment
            $table->integer('company_id');
            $table->string('name', 35);
            $table->string('description', 100);
            $table->decimal('salary', 8, 2); // Adjust precision and scale as needed
            $table->enum('model', ['presencial', 'hibrido', 'homeoffice']);
            $table->integer('addreess_id');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy');
    }
};
