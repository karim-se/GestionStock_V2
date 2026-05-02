<x-layout>

    @push('styles')
        @vite('resources/css/CommandesAchats/DetaillesAchats/AjouterDetaillesAchat.css')
    @endpush

    <form class="form" method="POST"
        action ="{{ route('DetaillesCommandeAchats.update', [$detailcommandeAchat->DetailAchatID]) }}">
        @csrf
        @method('PUT')


        <label for ="Article">Nom Article</label>
        <select id="Article" name="ArticleID">
            @foreach ($articles as $article)
                <option value="{{ $article->articleID }}"
                    {{ $detailcommandeAchat->ArticleID == $article->articleID ? 'selected' : '' }}>
                    {{ $article->NomArticle }}</option>
            @endforeach

        </select>





        <label for="PrixUnitaire">Prix Unitaire</label>
        <input type="number" id="PrixUnitaire" name="PrixUnitaire" value="{{ $detailcommandeAchat->PrixUnitaire }}">





        <label for="Quantite">Quantite</label>
        <input type="number" id="Quantite" name="Quantite" value="{{ $detailcommandeAchat->Quantite }}">



        <input type="submit" value="Enregistrer" class="bg-gray-800 text-white p-2 rounded" style="margin-top: 10px">
    </form>

</x-layout>
