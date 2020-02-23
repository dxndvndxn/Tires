'use strict';

let tabs = document.querySelector('.tabs');
let desk = document.querySelector('.desk-content-in').children;

tabs.addEventListener('click',(e)=>{
    for(let i = 0;i < tabs.children.length;i++){
        if(e.target == tabs.children[i]){
            tabs.children[i].classList.remove('nonactive-tab');
            tabs.children[i].classList.add('active-tab');
            desk[i].style.display = 'block';

        }else{
            tabs.children[i].classList.remove('active-tab');
            tabs.children[i].classList.add('nonactive-tab');
            desk[i].style.display = 'none';
        }
    }
});
let total = document.querySelector('.total-inp');
let cards = document.querySelector('.cards');

cards.addEventListener('click',function (e) {
    let datPlus = e.target;
   if(datPlus.classList.contains('add')){
       let parentPlus = datPlus.parentNode;
       let parentAmount = parentPlus.parentNode;
       parentAmount.children[0].setAttribute('value',+parentAmount.children[0].value + +parentAmount.children[0].dataset.am);
       let mainParent = parentAmount.parentNode.nextElementSibling.children;
       mainParent[0].children[0].setAttribute('value',+mainParent[0].children[0].value + +mainParent[0].children[0].dataset.value);
       let last = total.getAttribute('value');
       total.setAttribute('value',+last + +mainParent[0].children[0].dataset.value);
   }else if(datPlus.classList.contains('remove')){
       let parentMinus = datPlus.parentNode;
       let parentAmount = parentMinus.parentNode;
       let mainParent = parentAmount.parentNode.nextElementSibling.children;
       let last = total.getAttribute('value');
       if(last == total.dataset.totall){
           return false;
       }
       total.setAttribute('value',+last - +mainParent[0].children[0].dataset.value);
       if(mainParent[0].children[0].value == mainParent[0].children[0].dataset.value){
           return false;
       }
       mainParent[0].children[0].setAttribute('value',+mainParent[0].children[0].value - +mainParent[0].children[0].dataset.value);
       if(parentAmount.children[0].value == 1){
           return false;
       }
       parentAmount.children[0].setAttribute('value',+parentAmount.children[0].value - +parentAmount.children[0].dataset.am);
   }else if(datPlus.classList.contains('cl')){
       let parentClose = datPlus.parentNode;
       let parentPrice = parentClose.parentNode;
       let inputPrice = +parentClose.previousElementSibling.children[0].value;
       let last = total.getAttribute('value');
       total.setAttribute('value',+last - inputPrice);
       parentPrice.parentNode.remove();
   }
});
