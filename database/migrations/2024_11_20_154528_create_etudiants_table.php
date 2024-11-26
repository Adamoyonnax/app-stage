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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('num_etudiant');
            $table->string('nom_etudiant', 64);
            $table->string('prenom_etudiant', 64);
            $table->date('annee_obtention')->nullable(); // Date de l'année d'obtention, peut être NULL
            $table->string('login', 8);
            $table->string('mdp', 255); // Utilisez 255 pour les mots de passe
            $table->foreignId('num_classe')->constrained('classes')->onDelete('cascade'); // Clé étrangère
            $table->boolean('en_activite')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
