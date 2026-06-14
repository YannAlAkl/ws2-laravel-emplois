<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offre_emplois', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('entreprise');
            $table->string('ville');
            $table->string('type_emploi');
            $table->string('salaire')->nullable();
            $table->string('description');
            $table->string('responsabilites');
            $table->text('exigences');
            $table->boolean('est_active')->default(true);
            $table->date('date_publication')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offre_emplois');
    }
};
