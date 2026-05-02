<x-layout>

    @push('styles')
        @vite('resources/css/Articles/ListeArticles.css')
    @endpush







    <a href="{{ route('Articles.create') }}" class="ButtonAddArticle">Ajouter nouveau Article </a>


    <table>
        <tr>
            <th>Nom Article</th>
            <th>Code Aricle</th>
            <th>Description</th>
            <th>Categorie</th>
            <th>Actions</th>
        </tr>


        @foreach ($articles as $article)
            <tr>

                <td> {{ $article->NomArticle }} </td>
                <td> {{ $article->CodeArticle }} </td>
                <td> {{ $article->Description }} </td>
                <td> {{ $article->categorie->NomCategorie }} </td>
                <td class="boutons-container">
                    <input class="SupprimButton" type="button" Value="Supprimer"
                        onclick=ShowDeleteWindow('{{ $article->articleID }}')>
                    <a class="ModifButton" href={{ route('Articles.edit', $article->articleID) }}>Modifier</a>

                </td>


            </tr>
        @endforeach


    </table>


    <form id="SupprimerForm" method="post">

        @csrf
        @method('DELETE')

        <p>Etes vous sur de vouloir supprimer cette ligne ?? </p>
        <button class="ValidButton" type="Submit">Valider</button>
        <input class="CancelButton" type="button" Value="Annuler" onclick=HideDeleteWindow()>

    </form>


    @push('scripts')
        @vite('resources/js/Articles/ListeArticles.js')
    @endpush

</x-layout>
