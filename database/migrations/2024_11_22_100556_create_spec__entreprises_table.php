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
        Schema::create('spec_entreprise', function (Blueprint $table) {
            $table->unsignedBigInteger('num_entreprise');
            $table->unsignedBigInteger('num_spec');

            $table->foreign('num_entreprise')
                ->references('num_entreprise')
                ->on('entreprise')
                ->onDelete('cascade');

            $table->foreign('num_spec')
            ->references('num_spec')
            ->on('specialite')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spec_entreprise');
    }
};
