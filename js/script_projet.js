// Variable globale pour le timer
let timerX = undefined;

// Variable pour l'image courante
let slideIndex = 1;

changerPhoto(slideIndex);

// Fonction qui anime le carrousel d'images selon la durée déterminée.
// Le timer s'interrompt lors du clique sur une flèche (précédent, suivant), et recommence à s'animer lorsqu'on reclique
function gererAnimation(duree,n) {
    if (timerX != undefined) {
        clearInterval(timerX);
        timerX = undefined;
    } else {
        plusSlides(n);
        timerX = setInterval("plusSlides("+n+")",duree);
    }
}

// Slide précédent ou suivant
function plusSlides(n) {
    changerPhoto(slideIndex += n);
}

// Fonction qui change la photo selon la position actuelle du carrousel
function changerPhoto(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {slideIndex = 1;}
    if (n < 1) {slideIndex = slides.length;}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "block";
}

// Fonction qui change la couleur de fond sur la div nouveautes lorsqu'on passe la souris dessus
function changerFondNouveautes() {
    let division = document.getElementById("nouveautes");
    division.style.backgroundColor = "whitesmoke";
    division.style.transition = "0.3s ease-out";
}

// Fonction qui change la couleur de fond sur la div soldes lorsqu'on passe la souris dessus
function changerFondSoldes() {
    let division = document.getElementById("soldes");
    division.style.backgroundColor = "gainsboro";
    division.style.transition = "0.3s ease-out";
}

// Fonction qui rétablit la couleur de fond de départ sur les div accueil-produits lorsque la souris quitte ces divs
function retablirFond() {
    let divisions = document.getElementsByClassName("accueil-produits");
    for (let i = 0; i < divisions.length; i++) {
        divisions[i].style.backgroundColor = "#fff";
        divisions[i].style.transition = "0.3s ease-out";
    }
}

// Fonction qui change la couleur de fond des boutons lorsqu'on passe la souris dessus
function changerFondBoutons() {
    let boutons = document.getElementsByClassName("boutons");
    for (let i = 0; i < boutons.length; i++) {
        boutons[i].setAttribute("style", "background-color:#000 !important;border-color:#000 !important;transition:0.3s ease-out !important;");
    }
}

// Fonction qui rétablit la couleur de fond des boutons lorsque la souris quitte le bouton
function retablirFondBoutons() {
    let boutons = document.getElementsByClassName("boutons");
    for (let i = 0; i < boutons.length; i++) {
        boutons[i].setAttribute("style", "background-color:#6c757d !important;border-color:#6c757d !important;transition:0.3s ease-out !important;");
    }
}