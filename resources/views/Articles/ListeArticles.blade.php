<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/Articles/ListeArticles.css')
    @vite('resources/js/Articles/ListeArticles.js')
</head>



<body>

    <a href="{{route("Articles.create")}}" class="ButtonAddArticle">Ajouter Article</a>    

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
            
                <td> {{$article->NomArticle}} </td>
                <td> {{$article->CodeArticle}} </td>
                <td> {{$article->Description}}
                <td> {{$article->categorie->NomCategorie}} </td>
                <td>
                    <input class=SupprimButton type="button" Value="Supprimer" onclick=ShowDeleteWindow('{{$article->articleID}}')>
                    
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


    
</body>
</html>