<x-layout>
   
    @push('styles')
        @vite('resources/css/CommandesAchats/AjouterCommandeAchat.css')
    @endpush

  

        <form class="form" method="POST" action="{{ route('CommandesAchats.store') }}">
            @csrf

        
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

            <input type="submit" value="Enregistrer" class="bg-gray-800 text-white p-2 rounded" style="margin-top: 10px">
        </form>

    
    
</x-layout>