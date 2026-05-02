<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\CommandeAchat;

class AcceuilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // 1. Total des articles (Somme de la colonne quantité)
        $totalArticles = Article::sum('StockActuel');

        // 2. Articles en rupture (Quantité égale à 0)
        $alertesRupture = Article::where('StockActuel', '<=', 0)->count();



        // 3. Valeur totale du stock (Prix * Quantité)
        // Note : On peut utiliser selectRaw pour plus de performance
        $CommandesEnCours = CommandeAchat::where("etatID", "=", 1)->count();

        // 4. Les 5 derniers mouvements ou articles ajoutés


        return view('Accueil', compact(
            'totalArticles',
            'alertesRupture',
            'CommandesEnCours',
        ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
