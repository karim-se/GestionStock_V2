<x-layout>

 @push('styles')
        @vite('resources/css/CommandesAchats/AjouterDetaillesAchat.css')
    @endpush

   <form  class="form" method="POST" action ="{{ route('CommandesAchats.DetaillesCommandeAchats.store',[$commandeAchat->CommandeAchatID]) }}" >
     @csrf

      
                    <label for ="Article">Nom Article</label>
                    <select id="Article" name="ArticleID">
                            @foreach ($articles as $article )
                                    <option value="{{ $article->articleID}}">{{ $article->NomArticle }}</option>
                            
                            @endforeach

                    </select>

              


              
                        <label  for="PrixUnitaire">Prix Unitaire</label>
                        <input type="number" id="PrixUnitaire" name="PrixUnitaire">

                


                
                        <label  for="Quantite">Quantite</label>
                        <input type="number" id="Quantite" name="Quantite">

                

                       <input type="submit" value="Enregistrer" class="bg-gray-800 text-white p-2 rounded" style="margin-top: 10px">
</form> 
 
</x-layout> 