<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <form method="POST" action="{{route("Articles.store")}}">
        @csrf

        <label for="nomArticle">nom Article</label>
        <input id="nomArticle" type="text" name="NomArticle">

        <label for="CodeArticle">Code Article</label>
        <input id="CodeArticle" type="text" name="CodeArticle">

         <label for="Description">Description</label>
        <input id="Description" type="text" name="Description">

        <label for="Categorie">Nom Categorie</label>
        <select id="Categorie" name="CategorieID">

            @foreach ( $categories as  $categorie)
            <option  value="{{$categorie->id}}"> {{$categorie->NomCategorie}}</option>
                
            @endforeach

        </select>

        <input type="submit" value="Enregistrer">
    </form>    

</body>
</html>




