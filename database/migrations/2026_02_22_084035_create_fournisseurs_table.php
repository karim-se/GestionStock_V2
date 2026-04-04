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
        Schema::create('fournisseurs', function (Blueprint $table) {

            $table->increments('FournisseurID'); // int(11) AI PK

            $table->text('NomFournisseur');
            $table->text('Adresse')->nullable();
            $table->text('Telephone')->nullable();
            $table->text('Email')->nullable();
            $table->text('Role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};