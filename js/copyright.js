// Syntaxe qui permet de stocker la date
var LaDate = new Date();
// On définit la valeur dans le <span> en recuperant son id et en y insérant du code html via le script js
document.getElementById("DateCopyright").innerHTML = ( "©" + " " + LaDate.getFullYear() + " " + "Copyright - Gippet-Vinard Priscillia");
