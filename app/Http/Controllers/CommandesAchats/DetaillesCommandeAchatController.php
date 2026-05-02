<?php

namespace App\Http\Controllers\CommandesAchats;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommandeAchat;
use App\Models\Detailcommandeachat;
use App\Models\Article;

class DetaillesCommandeAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CommandeAchat $CommandesAchat)
    {
        //


        $detaillesCommandesAchats = $CommandesAchat->detailcommandeachats;


        return view("CommandesAchats/DetaillesAchats/ListeDetailles", compact("CommandesAchat", "detaillesCommandesAchats"));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($commandeAchatId)
    {
        //
        $commandeAchat = CommandeAchat::find($commandeAchatId);
        $articles = Article::all();

        return view("CommandesAchats/DetaillesAchats/Ajouter_DetailleAchat", compact("commandeAchat", "articles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $commandeAchatId)
    {
        //


        $validated = $request->validate([

            'articles'                => 'required|array|min:1',
            'articles.*.ArticleID'    => 'required|exists:articles,articleID',
            'articles.*.Quantite'     => 'required|integer|min:1',
            'articles.*.PrixUnitaire' => 'required|numeric|min:0',
        ], [
            'articles.required' => 'Aucun article n\'a été ajouté à cette commande.',
        ]);

        foreach ($validated['articles'] as $article) {



            $exists = DetailCommandeAchat::where('CommandeAchatID', $commandeAchatId)
                ->where('ArticleID', $article['ArticleID'])
                ->exists();




            if ($exists) {
                $nomArticle = Article::find($article['ArticleID'])->NomArticle;

                return redirect()->back()->withErrors(['article_exists' => 'L\'article "' . $nomArticle . '" existe déjà.']);
            }


        }






        foreach ($validated['articles'] as $article) {

            DetailCommandeAchat::create([
                'CommandeAchatID' => $commandeAchatId,
                'ArticleID' => $article['ArticleID'],
                'Quantite' => $article['Quantite'],
                'PrixUnitaire' => $article['PrixUnitaire'],
            ]);



        }

        return redirect()->route("CommandesAchats.DetaillesCommandeAchats.index", ["CommandesAchat" => $commandeAchatId]);
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
        $detailcommandeAchat = Detailcommandeachat::find($id);
        $articles = Article::all();

        return View("CommandesAchats/DetaillesAchats/Modifier_DetailleAchat", compact("detailcommandeAchat", "articles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $detailcommandeAchat = Detailcommandeachat::find($id);
        $commandeAchatId = $detailcommandeAchat->CommandeAchatID;
        $detailcommandeAchat->update($request->all());

        return redirect()->route("CommandesAchats.DetaillesCommandeAchats.index", ["CommandesAchat" => $commandeAchatId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //


        $detailcommandeachat = Detailcommandeachat::find($id);
        $commandeAchatId = $detailcommandeachat->CommandeAchatID;
        $detailcommandeachat->delete();



        return redirect()->route("CommandesAchats.DetaillesCommandeAchats.index", ["CommandesAchat" => $commandeAchatId]);
    }
}
