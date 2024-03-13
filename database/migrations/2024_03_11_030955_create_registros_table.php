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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id'); 
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade'); 
            $table->string('tipo_interacao');
            $table->timestamp('data_interacao')->nullable();
            $table->text('descricao_interacao')->nullable();
            $table->timestamps();
        });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
