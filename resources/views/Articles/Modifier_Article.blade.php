<x-layout>

    @push('styles')
        @vite('resources/css/Articles/AjouterArticle.css')
    @endpush



    <form class="form" method="POST" action="{{ route('Articles.update', $article->articleID) }}">
        @csrf
        @method('PUT')


        <label for="nomArticle">Nom de l'Article</label>
        <input id="nomArticle" type="text" name="NomArticle" required value="{{ $article->NomArticle }}">



        <label for="CodeArticle">Code de l'Article</label>
        <input id="CodeArticle" type="text" name="CodeArticle" required value="{{ $article->CodeArticle }}">


        <label for="Description">Description</label>
        <input id="Description" type="text" name="Description" value="{{ $article->Description }}">



        <label for="Categorie">Catégorie</label>
        <select id="Categorie" name="CategorieID">
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ $article->CategorieID == $categorie->id ? 'selected' : '' }}>
                    {{ $categorie->NomCategorie }}</option>
            @endforeach
        </select>


        <input type="submit" value="Enregistrer" class="bg-gray-800 text-white p-2 rounded" style="margin-top: 10px">
    </form>



</x-layout>
