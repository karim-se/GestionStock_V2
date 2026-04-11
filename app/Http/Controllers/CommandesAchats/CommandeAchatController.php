<?php

namespace App\Http\Controllers\CommandesAchats;

use App\Http\Controllers\Controller;
use App\Models\CommandeAchat;
use App\Models\Detailcommandeachat;
use App\Models\Fournisseur;
use App\Models\Etat;


use Illuminate\Http\Request;

class CommandeAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $commandeAchats=CommandeAchat::with(["fournisseur", "etat"])->get();


        return View("CommandesAchats/ListeAchats", compact("commandeAchats"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $fournisseurs=Fournisseur::all();
        $etats=Etat::all();
        return View("CommandesAchats/Ajouter_Achat", compact("fournisseurs", "etats"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

            $validated = $request->validate([
                'FournisseurID' => 'required|exists:fournisseurs,FournisseurID',
                'etatID'        => 'required|exists:etats,etatID',
            ]);

            // Création de la commande
            CommandeAchat::create([
                'FournisseurID' => $validated['FournisseurID'],
                'etatID'        => $validated['etatID'],
                'DateCommande'  => now(),
            ]);

        return redirect()->route("CommandesAchats.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($commandeAchatID)
    {
         $commandsAchats=CommandeAchat::find($commandeAchatID);
       $detaillesCommandesAchats=Detailcommandeachat::where("CommandeAchatID",$commandeAchatID)->get();

     

         return view("CommandesAchats/DetaillesCommande/ListeDetailles", compact("commandsAchats","detaillesCommandesAchats"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $commandeAchat=CommandeAchat::find($id);
       $fournisseurs=Fournisseur::all();
        $etats=Etat::all();


       return View("CommandesAchats/Modifier_CommandeAchat", compact("commandeAchat","fournisseurs","etats"));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $commandeAchat=CommandeAchat::find($id);
         $commandeAchat->update($request->all());

         return redirect()->route("CommandesAchats.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    $commandeAchat=CommandeAchat::find($id);
       $commandeAchat->delete();
       
       return redirect()->route("CommandesAchats.index");
    }
}
