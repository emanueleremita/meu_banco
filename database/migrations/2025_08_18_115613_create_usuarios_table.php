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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('senha', 255);
            $table->foreignId('perfil_id')->nullable()->constrained('perfis')->onDelete('set null');
            $table->string('status_usuario', 30)->default('ativo');
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('email');
            $table->index('perfil_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
