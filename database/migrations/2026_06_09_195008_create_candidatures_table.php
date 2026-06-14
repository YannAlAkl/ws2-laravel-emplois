<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offre_emploi_id')->constrained('offre_emplois')->onDelete('cascade');
            $table->string('prenom');
            $table->string('nom');
            $table->string('courriel');
            $table->string('telephone')->nullable();
            $table->text('message')->nullable();
            $table->string('cv_chemin');
            $table->string('cv_nom_original');
            $table->string('cv_type_mime');
            $table->integer('cv_taille');
            $table->string('statut')->default('recu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
