<x-layout>

    @push('styles')
        @vite('resources/css/CommandesAchats/ListeAchats.css')
    @endpush







    <a href="{{ route('CommandesAchats.create') }}" class="ButtonAddArticle">Ajouter nouveau Achat </a>


    <table>
        <tr>
            <th>Nom Fournisseur</th>
            <th> Etat Commande</th>
            <th>Date Commande</th>
            <th>Détailles</th>
            <th>Actions</th>


        </tr>

        @foreach ($commandeAchats as $commandeachat)
            <tr>
                <td>{{ $commandeachat->fournisseur->NomFournisseur }}</td>
                <td>{{ $commandeachat->etat->etat }}</td>
                <td>{{ $commandeachat->DateCommande }}</td>
                <td><a
                        href ="{{ route('CommandesAchats.DetaillesCommandeAchats.index', ['CommandesAchat' => $commandeachat->CommandeAchatID]) }}">
                        👁️ Voir Détailles</a></td>
                <td class="boutons-container">
                    <input class="SupprimButton" type="button" Value="Supprimer"
                        onclick=ShowDeleteWindow('{{ $commandeachat->CommandeAchatID }}')>
                    <a class="ModifButton"
                        href={{ route('CommandesAchats.edit', $commandeachat->CommandeAchatID) }}>Modifier</a>


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
        @vite('resources/js/CommandesAchats/ListeAchats.js')
    @endpush

</x-layout>
