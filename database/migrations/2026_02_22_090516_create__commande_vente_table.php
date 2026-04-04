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
        Schema::create('commandeVentes', function (Blueprint $table) {

            $table->increments('CommandeVenteID'); // int(11) AI PK

            $table->dateTime('DateCommande');

            $table->unsignedInteger('ClientID');
            $table->unsignedBigInteger('etatID');

            // FK vers etat
            $table->foreign('etatID')
                  ->references('id')
                  ->on('Etat')
                  ->onDelete('restrict');

            // FK vers clients
            $table->foreign('ClientID')
                  ->references('ClientID')
                  ->on('clients')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandeVentes');
    }
};