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
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->date('birth_date');
            $table->string('gender');
            $table->string('cpf')->unique();
            $table->string('phone');
            $table->string('educational_institution');
            $table->string('current_course');
            $table->string('current_period');
            $table->integer('user_id');
            $table->integer('address_id');
            $table->enum('work_contract', ['a_procura', 'contratado']);
            $table->enum('internship_approval', ['aprovado', 'reprovado'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
};
