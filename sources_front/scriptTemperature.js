/*Voir les valeurs de l'input range température*/
const inputTemperature = document.querySelector(".temp"); /*Selectionne l'input range class temp*/

inputTemperature.addEventListener("input", function (
  event /*fonction qui est appelé a chaque fois qu'il y a un evenement sur l'imput */
) {
  const number = document.querySelector(".number"); /*selection de l'output class number*/

  number.innerHTML = inputTemperature.value; /*ajoute la valeur recupéré de l'input dans l'output*/
});
