<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detailcommandeventes', function (Blueprint $table) {

            $table->increments('DetailVenteID');
            // int(36) AI PK → en MySQL int max = 11 affichage,
            // Laravel increments() crée INT UNSIGNED AUTO_INCREMENT

            $table->unsignedInteger('CommandeVenteID');
            $table->unsignedInteger('ArticleID');

            $table->integer('PrixUnitaire');
            $table->integer('Quantite');

            // FK vers commandeventes
            $table->foreign('CommandeVenteID')
                  ->references('CommandeVenteID')
                  ->on('commandeVentes')
                  ->onDelete('cascade');

            // FK vers articles
            $table->foreign('ArticleID')
                  ->references('articleID')
                  ->on('articles')
                  ->onDelete('cascade');

            $table->index(['CommandeVenteID', 'ArticleID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailcommandeventes');
    }
};
