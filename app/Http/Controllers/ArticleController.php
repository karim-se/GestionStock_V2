<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
    $articles=Article::with("categorie")->get();
    

    return view("Articles/ListeArticles", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Categorie::all();

        return View("Articles.Ajouter_Article", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

      
        Article::create([

        "NomArticle"=>$request["NomArticle"],
        "CategorieID"=>$request["CategorieID"],
        "CodeArticle"=>$request["CodeArticle"],
        "Description"=>$request["Description"]
        ]);

         return redirect()->route('Articles.index'); 
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
        $article=Article::find($id);
        $categories=Categorie::all();
        return view("Articles/Modifier_Article", compact("article", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
      
        $article=Article::find($id);
         $article->update($request->all());

         return redirect()->route("Articles.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $article=Article::find($id);
        $article->delete();

        return redirect()->route("Articles.index");
    }
}
