/*Ouverture et fermeture du menu burger */
const backdropElement = document.querySelector(".backdrop"); /*Selectionne la div avec la classe backdrop*/
const menuButton = document.querySelector(".btn");
/*Selectionne le bouton avec la classe btn*/

/*Quand on va cliquer sur le bouton, la classe "active" sera ajouté ou supprimé à la div backdrop selon l'état actuel*/
menuButton.addEventListener("click", function () {
  backdropElement.classList.toggle("active");
});
