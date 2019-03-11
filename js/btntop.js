// Script qui fait apparaitre un bouton "top" quand l'utilisateur descend la page de 35 pixels afin que l'internaute navigue plus aisement sur le site (UI)

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 35 || document.documentElement.scrollTop > 35) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}
