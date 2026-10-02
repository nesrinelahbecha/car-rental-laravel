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
    Schema::create('voitures', function (Blueprint $table) {
        $table->id();
        $table->string('marque');
        $table->string('modele');
        $table->string('immatriculation')->unique();
        $table->integer('annee');
        $table->string('couleur');
        $table->string('carburant'); // Essence, Diesel, Électrique, Hybride
        $table->string('transmission'); // Manuelle, Automatique
        $table->integer('nombre_places');
        $table->decimal('prix_par_jour', 8, 2);
        $table->boolean('disponible')->default(true);
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
