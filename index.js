// Button to hide and display content of configuration exo 1

let btnName = document.getElementById('btnId');
btnName.addEventListener('click', ()=>{
  let element = document.getElementById('elementId');
	if (element.style.display != 'inline'){
    	element.style.display = 'inline';
      btnName.innerHTML = "Masquer";
    }
  else{
    element.style.display = 'none'
    btnName.innerHTML = "Afficher";
  }
})

// button to hide and display content get browser exo 6
let btnNameExo6 = document.getElementById('btnIdExo6');
btnNameExo6.addEventListener('click', ()=>{
  let elementExo6 = document.getElementById('elementIdExo6');
	if (elementExo6.style.display != 'inline'){
    elementExo6.style.display = 'inline';
      btnNameExo6.innerHTML = "Masquer";
    }
  else{
    elementExo6.style.display = 'none'
    btnNameExo6.innerHTML = "Afficher";
  }
})