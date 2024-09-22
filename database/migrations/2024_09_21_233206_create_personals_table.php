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
        Schema::create('personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matricule')->unique('personal_matricule_unique');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_embauche');
            $table->string('poste');
            $table->string('email')->unique('personal_email_unique');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('code_acces');
            $table->rememberToken();
            $table->enum('actif', ['oui', 'non'])->default('oui');
            $table->enum('role', ['admin', 'simple'])->default('simple');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};