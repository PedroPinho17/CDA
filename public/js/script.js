//Menu//
const selectElement = (element) => document.querySelector(element);
//abrir e fechar a nav ao clicar
selectElement('.menu-icons').addEventListener('click',() => {
    selectElement('nav').classList.toggle('active');
});
//Fim do Menu//

//Read More//
const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {
    // Uncomment in case you only want to allow for the display of only one collapsed item at a time!
    // const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
    // if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
    //   currentlyActiveAccordionItemHeader.classList.toggle("active");
    //   currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
    // }
    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }

  });
});
//Fim do Read More//

/////////////Loja///////////////////
let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});
////////////////////Fim da Loja////////////////////////////////////////////

/*
/////////////Equipa Tecnica///////////////////
function fetch_info(i){
  let profile = ["../../img/Equipa_tecnica/treinadorP.png","../../img/Equipa_tecnica/treinadorAD.png","../../img/Equipa_tecnica/treinadorGR.png","../../img/Equipa_tecnica/diretor.png"];
  let name=["Paulo Candeias","Paulo Soares","António","Rui"];
  let status = ["Treinador Principal","Treinador Adjunto","Treinador de Guarda - Redes","Diretor"];
  let descricao = ["Sou Treinador de uma equipa fantastica", "Sou adjunto do Paulo Candeias","Quis Ajudar como treinador de Guarda-redes","Diretor da equipa"];
  document.getElementById("profile").src=profile[i];
  document.getElementById("name").innerHTML=name[i];
  document.getElementById("status").innerHTML=status[i];
  document.getElementById("about").innerHTML=descricao[i];
};
//////////////////Fim do Equipa Tecnica////////////////////////////////
*/

window.sr = ScrollReveal();

sr.reveal('.animate-left', {
    origin:'left',
    duration:1000,
    distance: '25rem',
    delay:300
});

sr.reveal('.animate-right', {
    origin:'right',
    duration:1000,
    distance: '25rem',
    delay:600
});

sr.reveal('.animate-top', {
    origin:'top',
    duration:1000,
    distance: '25rem',
    delay:600
});

sr.reveal('.animate-bottom', {
    origin:'bottom',
    duration:1000,
    distance: '25rem',
    delay:600
});
