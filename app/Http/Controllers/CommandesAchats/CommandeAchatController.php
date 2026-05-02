<?php

namespace App\Http\Controllers\CommandesAchats;

use App\Http\Controllers\Controller;
use App\Models\CommandeAchat;
use App\Models\Detailcommandeachat;
use App\Models\Fournisseur;
use App\Models\Etat;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CommandeAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandeAchats = CommandeAchat::with(["fournisseur", "etat"])->get();


        return View("CommandesAchats/ListeAchats", compact("commandeAchats"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $fournisseurs = Fournisseur::all();
        $etats = Etat::all();
        $articles = Article::all();
        return View("CommandesAchats/Ajouter_Achat", compact("fournisseurs", "etats", "articles"));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $validated = $request->validate([
            'FournisseurID'           => 'required|exists:fournisseurs,FournisseurID',
            'etatID'                  => 'required|exists:Etat,id',
            'articles'                => 'required|array|min:1',
            'articles.*.ArticleID'    => 'required|exists:articles,articleID',
            'articles.*.Quantite'     => 'required|integer|min:1',
            'articles.*.PrixUnitaire' => 'required|numeric|min:0',
        ], [
            'articles.required' => 'Aucun article n\'a été ajouté à cette commande.',
        ]);

        try {
            // Tout ce qui se trouve à l'intérieur de la closure sera annulé en cas d'erreur
            DB::transaction(function () use ($validated) {

                // 1. Création de la commande principale
                $commandeAchat = CommandeAchat::create([
                    'FournisseurID' => $validated['FournisseurID'],
                    'etatID'        => $validated['etatID'],
                    'DateCommande'  => now(),
                ]);



                // 2. Création des détails
                foreach ($validated['articles'] as $article) {
                    DetailCommandeAchat::create([
                        'CommandeAchatID' => $commandeAchat->CommandeAchatID, // Assure-toi que c'est la bonne clé primaire
                        'ArticleID'       => $article['ArticleID'],
                        'Quantite'        => $article['Quantite'],
                        'PrixUnitaire'    => $article['PrixUnitaire'],
                    ]);
                    
                }
            });


            return redirect()->route("CommandesAchats.index")
                             ->with('success', 'Commande enregistrée avec succès.');

        } catch (\Exception $e) {

            Log::error("Erreur lors de la création de la commande : " . $e->getMessage());

            return back()->withInput()
                         ->withErrors(['error' => 'Une erreur est survenue lors de le création de la commande . veuillez réessayer plus tard!!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($commandeAchatID)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commandeAchat = CommandeAchat::find($id);
        $fournisseurs = Fournisseur::all();
        $etats = Etat::all();


        return View("CommandesAchats/Modifier_CommandeAchat", compact("commandeAchat", "fournisseurs", "etats"));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commandeAchat = CommandeAchat::find($id);
        $commandeAchat->update($request->all());

        return redirect()->route("CommandesAchats.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $commandeAchat = CommandeAchat::find($id);
        $commandeAchat->delete();

        return redirect()->route("CommandesAchats.index");
    }
}
