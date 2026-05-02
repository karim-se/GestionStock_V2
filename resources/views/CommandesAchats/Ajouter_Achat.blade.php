<x-layout>

    @push('styles')
        @vite('resources/css/CommandesAchats/AjouterCommandeAchat.css')
    @endpush



    <form class="form" method="POST" action="{{ route('CommandesAchats.store') }}">
        @csrf


        <h1 style="text-align: center; font-size: 30px; font-weight: bold;">Commande Achat</h1>






        <label for="Fournisseur">Fournisseur</label>
        <select id="Fournisseur" name="FournisseurID">
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->FournisseurID }}">{{ $fournisseur->NomFournisseur }}</option>
            @endforeach
        </select>



        <label for="Etat">Etat</label>
        <select id="Etat" name="etatID">
            @foreach ($etats as $etat)
                <option value="{{ $etat->id }}">{{ $etat->etat }}</option>
            @endforeach
        </select>


        <div id="article_vide">
            @if ($errors->any())
                <div class="alert alert-danger" style="color: red; text-align:center;font-weight: bold;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>






        <h1 style="text-align: center; font-size: 17px; font-weight: bold;">Ajouter des Articles</h1>

        <div class="addArticle">


            <div class="ligne-article">

                <div class="champ">
                    <label for="Article">Nom Article </label>
                    <select id="Article">
                        @foreach ($articles as $article)
                            <option value="{{ $article->articleID }}">{{ $article->NomArticle }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="champ">
                    <label for="PrixUnitaire">Prix Achat Unitaire</label>
                    <input id="PrixUnitaire" type="number" placeholder="0.00">
                </div>

                <div class="champ">
                    <label for="Quantite">Quantité</label>
                    <input id="Quantite" type="number" placeholder="1">
                </div>

                <div class="champ bouton">
                    <button type="button" onclick="Afficher_Articles()"
                        class="bg-gray-800 text-white p-2 rounded">Ajouter Ligne</button>
                </div>

            </div>

            <div id="duplicate-alert" class="alert-toast" style="color: red ; text-align:center;"></div>

            <div class="table-container">
                <table id="Liste_Articles" class="data-table">
                    <thead>
                        <tr>
                            <th>Nom Article</th>
                            <th>Prix Unitaire</th>
                            <th>Quantité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody></tbody>
                </table>

            </div>
        </div>


        <input type="submit" value="Enregistrer" class="bg-gray-800 text-white p-2 rounded" style="margin-top: 10px">
    </form>

    @push('scripts')
        @vite('resources/js/CommandesAchats/Ajouter_Achat.js')
    @endpush
</x-layout>
