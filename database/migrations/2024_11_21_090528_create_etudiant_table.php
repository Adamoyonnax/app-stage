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
        Schema::create('etudiant', function (Blueprint $table) {
            $table->id('num_etudiant');
            $table->string('nom_etudiant', 64);
            $table->string('prenom_etudiant', 64);
            $table->date('annee_obtention')->nullable(); 
            $table->string('login', 8);
            $table->string('mdp', 255); 
            $table->unsignedBigInteger('num_classe'); 
            $table->boolean('en_activite')->default('1');

            // Définition de la clé étrangère
            $table->foreign('num_classe')
                ->references('num_classe') // Correspond à la colonne id définie dans 'classe'
                ->on('classe')            // Nom de la table
                ->onDelete('cascade');    // Supprime les étudiants liés si une classe est supprimée
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant');
    }
};