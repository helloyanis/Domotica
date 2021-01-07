const backdropElement= document.querySelector(".backdrop");
const menuButton= document.querySelector(".btn");

menuButton.addEventListener("click",function(){
  backdropElement.classList.toggle("active");
});


/*Voir les valeurs de l'input range température*/
$(function() {
	$('.temp').next().text('25'); // Valeur par défaut
	$('.temp').on('input', function() {
		var $set = $(this).val();
		$(this).next().text($set);
	});
});