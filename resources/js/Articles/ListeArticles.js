function ShowDeleteWindow(articleID) {
    let Supprimer = document.getElementById("SupprimerForm");
    Supprimer.style.display = "block";

    Supprimer.action = `/Articles/${articleID}`;
}

function HideDeleteWindow() {
    let Supprimer = document.getElementById("SupprimerForm");
    Supprimer.style.display = "none";
}

// rendre les fonctions globales (important)
window.ShowDeleteWindow = ShowDeleteWindow;
window.HideDeleteWindow = HideDeleteWindow;
