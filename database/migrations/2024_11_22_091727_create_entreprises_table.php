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
        Schema::create('entreprise', function (Blueprint $table) {
            $table->id('num_entreprise');
            $table->string('raison_sociale', 128);
            $table->string('nom_contact', 128)->nullable();
            $table->string('nom_resp', 128)->nullable();
            $table->string('rue_entreprise', 128)->nullable();
            $table->integer('cp_entreprise')->nullable();
            $table->string('ville_entreprise', 128);
            $table->string('tel_entreprise', 128)->nullable();
            $table->string('fax_entreprise', 128)->nullable();
            $table->string('email', 128)->nullable();
            $table->text('observation')->nullable();
            $table->string('site_entreprise', 128)->nullable();
            $table->string('niveau', 32);
            $table->boolean('en_activite')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprise');
    }
};
