let selectedArticles = new Set();

// Fonction pour afficher l'alerte de duplication (Toast)
// Fonction pour afficher l'alerte de duplication (Toast)
function showDuplicateAlert(articleName) {
    const alertElement = document.getElementById("duplicate-alert");
    if (!alertElement) return;

    alertElement.innerHTML = `L'article <strong>${articleName}</strong> a déjà été ajouté !`;
    alertElement.classList.add("show");
}

// Fonction principale pour ajouter un article au tableau
window.Afficher_Articles = function () {
    const alertElement = document.getElementById("duplicate-alert");
    const alertElement2 = document.getElementById("article_vide");

    if (alertElement) {
        alertElement.classList.remove("show");
    }

    let articleSelect = document.getElementById("Article");
    let prixInput = document.getElementById("PrixUnitaire");
    let quantiteInput = document.getElementById("Quantite");

    const articleId = articleSelect.value;
    const articleNom = articleSelect.options[articleSelect.selectedIndex].text;
    const prix = parseFloat(prixInput.value);
    const quantite = parseInt(quantiteInput.value);

    if (
        !prix ||
        isNaN(prix) ||
        prix <= 0 ||
        !quantite ||
        isNaN(quantite) ||
        quantite <= 0
    ) {
        alert(
            "Veuillez entrer un prix unitaire valide (> 0) et une quantité valide (> 0).",
        );
        return;
    }

    if (selectedArticles.has(articleId)) {
        showDuplicateAlert(articleNom);
        return;
    }

    let table = document.querySelector("#Liste_Articles tbody");
    let tr = document.createElement("tr");
    tr.setAttribute("data-article-id", articleId); // Pour la suppression JS

    tr.innerHTML = `
            <td>${articleNom}</td>
            <td>${prix.toFixed(2)}</td>
            <td>${quantite}</td>
            <td><button type="button" onclick="supprimerArticle(this, '${articleId}')" class="bg-red-600 text-white p-2 rounded">Supprimer</button></td>
        `;
    table.appendChild(tr); // Insertion directe dans la table

    let index = document.getElementById("Liste_Articles").rows.length - 1; // -1 pour la ligne TH, -1 car l'index commence à 0.

    if (alertElement2 && index > 0) {
        alertElement2.style.display = "none";
    }

    // Si vous voulez utiliser la logique d'origine pour l'indexation:
    // let index = document.getElementById("Liste_Articles").rows.length - 1;

    let hiddenContainer = document.createElement("div");
    hiddenContainer.classList.add("hidden-article");
    hiddenContainer.setAttribute("data-hidden-article-id", articleId);

    hiddenContainer.innerHTML = `
            <input type="hidden" name="articles[${index}][ArticleID]" value="${articleId}">
            <input type="hidden" name="articles[${index}][PrixUnitaire]" value="${prix.toFixed(2)}">
            <input type="hidden" name="articles[${index}][Quantite]" value="${quantite}">
        `;

    document.querySelector("form").appendChild(hiddenContainer); // Ajout à la fin du formulaire

    selectedArticles.add(articleId);
    prixInput.value = "";
    quantiteInput.value = "";
};

// Fonction pour supprimer un article de la liste
window.supprimerArticle = function (button, articleId) {
    // 1. Supprimer la ligne du tableau
    let tr = button.closest("tr");
    tr.remove();

    // 3. Retirer l'article de la liste des articles sélectionnés
    selectedArticles.delete(articleId);
};
