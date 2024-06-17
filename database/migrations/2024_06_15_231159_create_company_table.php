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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('fancy_name');
            $table->string('cnpj')->unique();
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('municipal_registration')->nullable();
            $table->string('state_registration')->nullable();
            $table->string('legal_nature');
            $table->string('branch');
            $table->integer('user_id');
            $table->integer('address_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
