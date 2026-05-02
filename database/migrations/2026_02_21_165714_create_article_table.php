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
        Schema::create('articles', function (Blueprint $table) {

            $table->increments('articleID'); // int(11) AI PK

            $table->text('NomArticle');
            $table->text('CodeArticle');
            $table->text('Description')->nullable();

            $table->float('PrixAchatStandard');
            $table->float('PrixVenteStandard');

            $table->integer('StockActuel');
            $table->integer('StockMinimum');

            $table->unsignedBigInteger('CategorieID');

            // Si relation avec table categorie
            $table->foreign('CategorieID')
                  ->references('id')
                  ->on('categorie')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
