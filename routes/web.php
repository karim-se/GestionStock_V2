<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommandesAchats\CommandeAchatController;
use App\Http\Controllers\CommandesAchats\DetaillesCommandeAchatController;

Route::get('/', function () {
    return view('welcome');
});




Route::resource("Articles", ArticleController::class);   
Route::resource("CommandesAchats", CommandeAchatController::class);
Route::resource("CommandesAchats.DetaillesCommandeAchats",DetaillesCommandeAchatController::class)->shallow();



