<x-layout>

    @push('styles')
        @vite('resources/css/Articles/AjouterArticle.css')
    @endpush



    <form class="form" method="POST" action="{{ route('Articles.store') }}">
        @csrf


        <label for="nomArticle">Nom de l'Article</label>
        <input id="nomArticle" type="text" name="NomArticle" required>



        <label for="CodeArticle">Code de l'Article</label>
        <input id="CodeArticle" type="text" name="CodeArticle" required>


        <label for="Description">Description</label>
        <input id="Description" type="text" name="Description">



        <label for="Categorie">Catégorie</label>
        <select id="Categorie" name="CategorieID">
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->NomCategorie }}</option>
            @endforeach
        </select>


        <input type="submit" value="Enregistrer" class="bg-gray-800 text-white p-2 rounded" style="margin-top: 10px">
    </form>



</x-layout>
