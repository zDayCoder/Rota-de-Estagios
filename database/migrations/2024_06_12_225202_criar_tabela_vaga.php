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
            $table->increments('id'); 
            $table->integer('company_id');
            $table->string('name', 35);
            $table->string('description', 100);
            $table->decimal('salary', 8, 2); 
            $table->integer('skills_id');
            $table->enum('model', ['presencial', 'hibrido', 'homeoffice']);
            $table->integer('trainee_id');
            $table->enum('status',['Aberta','Fechada','Cancelada']);
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
