
<x-layout>

    @push('styles')
        @vite('resources/css/CommandesAchats/ListeAchats.css')
    @endpush
  






    <a href="{{route("CommandesAchats.create")}}" class="ButtonAddArticle">Ajouter nouveau Achat </a>    

    
    <table>
     <tr>
         <th>Nom Article</th>
         <th> Prix Unitaire</th>
        <th>Quantite</th>
        <th>Actions</th>
       
        
     </tr>

       @foreach ($detaillesCommandesAchats as $detaillesCommandeAchats)
         
             
        <tr>
              <td>{{ $detaillesCommandeAchats->article->NomArticle}}</td>
              <td>{{ $detaillesCommandeAchats->PrixUnitaire }}</td>
              <td>{{ $detaillesCommandeAchats->Quantite }}</td>
              <td class="boutons-container">
                    <input class="SupprimButton" type="button" Value="Supprimer" onclick=ShowDeleteWindow('{{$detaillesCommandeAchats->DetailAchatID}}')>
                    <a class="ModifButton" href={{route("DetaillesCommandeAchats.edit", $detaillesCommandeAchats->DetailAchatID)}}>Modifier</a>
               
                    
              </td>

        </tr>
     
     @endforeach
     

     

</table>

    <form id="SupprimerForm" method="post"  >

            @csrf
            @method('DELETE')

        <p>Etes vous sur de vouloir supprimer cette ligne ??  </p>
        <button class="ValidButton" type="Submit">Valider</button> 
        <input class="CancelButton" type="button" Value="Annuler" onclick=HideDeleteWindow()>
        
    </form>    


    @push('scripts')
      @vite('resources/js/CommandesAchats/ListeAchats.js')
    @endpush
    
</x-layout>