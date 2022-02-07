// Button to hide and display content of configuration exo 1
let btnName = document.getElementById('btnId');
let element = document.getElementById('elementId');
let btnNameExo6 = document.getElementById('btnIdExo6');
let elementExo6  = document.getElementById('elementIdExo6');


function toHideAndShow(btn, tohide) {
if (tohide.style.display != 'inline'){
  tohide.style.display = 'inline';
  btn.innerHTML = "Masquer";
  }
else{
  tohide.style.display = 'none'
  btn.innerHTML = "Afficher";
}
}

btnName.addEventListener('click',() => toHideAndShow(btnName,element))
btnNameExo6.addEventListener('click',() => toHideAndShow(btnNameExo6,elementExo6))