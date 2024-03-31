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
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Campo para o nome completo
            $table->string('address'); // Campo para o endereço (rua, bairro, etc...)
            $table->string('cep', 9); // Campo para o CEP (8 dígitos)
            $table->string('email'); // Campo para o email
            $table->string('phone_number'); // Campo para o número de telefone
            $table->text('professional_objective')->nullable(); // Campo para o objetivo profissional (se houver)
            $table->string('academic_course')->nullable(); // Campo para o curso acadêmico (se houver)
            $table->string('institution')->nullable(); // Campo para a instituição de ensino (se houver)
            $table->year('start_year')->nullable(); // Campo para o ano de início do curso (se houver)
            $table->year('expected_completion_year')->nullable(); // Campo para o ano de conclusão previsto (se houver)
            $table->text('skills')->nullable(); // Campo para as habilidades técnicas (se houver)
            $table->string('languages')->nullable(); // Campo para os idiomas (se houver)
            $table->text('projects')->nullable(); // Campo para os projetos realizados (se houver)
            $table->text('certifications')->nullable(); // Campo para as certificações obtidas (se houver)
            $table->text('extracurricular_activities')->nullable(); // Campo para atividades extracurriculares (se houver)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
