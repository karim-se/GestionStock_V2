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
        Schema::create('detailcommandeachats', function (Blueprint $table) {

            $table->increments('DetailAchatID'); // int(11) AI PK

            $table->integer('Quantite');
            $table->integer('PrixUnitaire');

            $table->unsignedInteger('CommandeAchatID');
            $table->unsignedInteger('ArticleID');

            // FK vers commandeachats
            $table->foreign('CommandeAchatID')
                  ->references('CommandeAchatID')
                  ->on('commandeAchats')
                  ->onDelete('cascade');

            // FK vers articles
            $table->foreign('ArticleID')
                  ->references('articleID')
                  ->on('articles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailcommandeachats');
    }
};