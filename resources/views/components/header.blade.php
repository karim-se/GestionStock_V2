<header class="bg-gray-800 text-white p-4">
    <nav class="container mx-auto flex  items-center">
        <a href="/" class="font-bold text-xl">MonProjet</a>
        
        <ul class="flex space-x-4 items-left ml-10">
            <li><a href="/" class="hover:text-gray-300">Accueil</a></li>
            
            <li class="dropdown">
                <button class="dropbtn">Catalogue</button>
                <div class="dropdown-content">
                    <a href="{{ route('Articles.index') }}">Articles</a>
                    <a href="{{ route('CommandesAchats.index') }}">Commandes Achats</a>
                </div>
            </li>
        </ul>
    </nav>

    <style>
        /* Correction : font-size au lieu de text-size */
        .dropbtn {
            background: transparent;
            color: white;
            font-size: 16px; 
            border: none;
            padding: 0;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 200px; /* Légèrement élargi pour le texte long */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 10;
            top: 100%; /* S'assure qu'il s'affiche sous le bouton */
            left: 0;
            border-radius: 4px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            border-radius: 4px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</header>