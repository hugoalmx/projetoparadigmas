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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Adicionando a coluna user_id
            $table->foreign('user_id')->references('id')->on('users'); // Definindo a chave estrangeira
            $table->string('name');
            $table->string('email')->unique();
            $table->string('empresa')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('categoria')->nullable();
            $table->boolean('cliente')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
