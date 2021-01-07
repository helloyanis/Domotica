const backdropElement= document.querySelector(".backdrop");
const menuButton= document.querySelector(".btn");

menuButton.addEventListener("click",function(){
  backdropElement.classList.toggle("active");
});