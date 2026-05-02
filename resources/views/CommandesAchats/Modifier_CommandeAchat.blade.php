<x-layout>

    @push('styles')
        @vite('resources/css/CommandesAchats/AjouterCommandeAchat.css')
    @endpush



    <form class="form" method="POST" action="{{ route('CommandesAchats.update', $commandeAchat->CommandeAchatID) }}">
        @csrf
        @method('PUT')


        <label for="Fournisseur">Fournisseur</label>
        <select id="Fournisseur" name="FournisseurID">
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->FournisseurID }}"
                    {{ $commandeAchat->FournisseurID == $fournisseur->FournisseurID ? 'selected' : '' }}>
                    {{ $fournisseur->NomFournisseur }}</option>
            @endforeach
        </select>



        <label for="Etat">Etat</label>
        <select id="Etat" name="etatID">
            @foreach ($etats as $etat)
                <option value="{{ $etat->id }}" {{ $commandeAchat->etatID == $etat->id ? 'selected' : '' }}>
                    {{ $etat->etat }}</option>
            @endforeach
        </select>

        <input type="submit" value="Enregistrer" class="bg-gray-800 text-white p-2 rounded" style="margin-top: 10px">
    </form>



</x-layout>
