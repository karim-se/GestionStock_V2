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
        Schema::create('commandeAchats', function (Blueprint $table) {

            $table->increments('CommandeAchatID'); // int(11) AI PK

            $table->dateTime('DateCommande');

            $table->unsignedInteger('FournisseurID');
            $table->unsignedBigInteger('etatID');

            // Clé étrangère vers fournisseurs
            $table->foreign('FournisseurID')
                  ->references('FournisseurID')
                  ->on('fournisseurs')
                  ->onDelete('cascade');

            // Clé étrangère vers etat (si Statut_ID référence cette table)
            $table->foreign('etatID')
                  ->references('id')
                  ->on('Etat')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandeachats');
    }
};