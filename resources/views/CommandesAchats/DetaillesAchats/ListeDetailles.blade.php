<x-layout>

    @push('styles')
        @vite('resources/css/CommandesAchats/DetaillesAchats/ListeDetaillesAchats.css')
    @endpush










    <p class="Commande-info">
        <strong>Nom Fournisseur :</strong>
        {{ $CommandesAchat->fournisseur->NomFournisseur }}
    </p>

    <p class="Commande-info">
        <strong>Etat Commande :</strong>
        {{ $CommandesAchat->etat->etat }}
    </p>


    <a href="{{ route('CommandesAchats.DetaillesCommandeAchats.create', $CommandesAchat->CommandeAchatID) }}"
        class="ButtonAddArticle">Ajouter Article à la commande </a>


    <table>
        <tr>
            <th>Nom Article</th>
            <th> Prix Unitaire</th>
            <th>Quantite</th>
            <th>Actions</th>


        </tr>

        @foreach ($detaillesCommandesAchats as $detaillesCommandeAchats)
            <tr>
                <td>{{ $detaillesCommandeAchats->article->NomArticle }}</td>
                <td>{{ $detaillesCommandeAchats->PrixUnitaire }}</td>
                <td>{{ $detaillesCommandeAchats->Quantite }}</td>
                <td class="boutons-container">
                    <input class="SupprimButton" type="button" Value="Supprimer"
                        onclick=ShowDeleteWindow('{{ $detaillesCommandeAchats->DetailAchatID }}')>
                    <a class="ModifButton"
                        href={{ route('DetaillesCommandeAchats.edit', $detaillesCommandeAchats->DetailAchatID) }}>Modifier</a>


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
        @vite('resources/js/CommandesAchats/DetaillesAchats/ListeDetaillesAchats.js')
    @endpush

</x-layout>
