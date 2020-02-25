'use strict';

let total = document.querySelector('.total-inp');
let cards = document.querySelector('.cards');

cards.addEventListener('click',function (e) {
    let datPlus = e.target;
    //Если нажали на плюс
   if(datPlus.classList.contains('add')){
       //Родитель плюса
       let parentPlus = datPlus.parentNode;
       //Родитель родителя плюса
       let parentAmount = parentPlus.parentNode;
       //Инпут в блоке amount
       parentAmount.children[0].setAttribute('value',+parentAmount.children[0].value + +parentAmount.children[0].dataset.am);
       //Родитель price
       let mainParent = parentAmount.parentNode.nextElementSibling.children;
       if(mainParent[0].children[0].value.length >= 5){
           mainParent[0].children[0].style.width = '110px';
       }
       if(mainParent[0].children[0].value.length >= 6){
           mainParent[0].children[0].style.width = '125px';
       }
       //Инпут price
       mainParent[0].children[0].setAttribute('value',+mainParent[0].children[0].value + +mainParent[0].children[0].dataset.value);
       //Забираем значение total и меняем его
       let last = total.getAttribute('value');
       if(total.value.length >= 5){
           total.style.width = '110px';
       }else{
           total.style.width = '100px';
       }
       if(total.value.length >= 6){
           total.style.width = '120px';
       }else{
           total.style.width = '110px';
       }
       total.setAttribute('value',+last + +mainParent[0].children[0].dataset.value);
       //Если нажали на минус
   }else if(datPlus.classList.contains('remove')){
       //Рордитель минуса
       let parentMinus = datPlus.parentNode;
       //Родитель инпута
       let parentAmount = parentMinus.parentNode;
       // Родитель прайса
       let mainParent = parentAmount.parentNode.nextElementSibling.children;
       //Меняем значение итоговой цены
       let last = total.getAttribute('value');
       //Если итоговая цена равна data
       if(last == total.dataset.totall){
           return false;
       }
       //Меняем значение итоговой цены
       total.setAttribute('value',+last - +mainParent[0].children[0].dataset.value);
       //Если значение прайса равно самом прайсу в data возвращаем фолс
       if(mainParent[0].children[0].value == mainParent[0].children[0].dataset.value){
           return false;
       }
       if(mainParent[0].children[0].value.length <= 5){
           mainParent[0].children[0].style.width = '90px';
       }
       if(mainParent[0].children[0].value.length < 6){
           mainParent[0].children[0].style.width = '100px';
       }
       //Меняем значение инпута в прайсе
       mainParent[0].children[0].setAttribute('value',+mainParent[0].children[0].value - +mainParent[0].children[0].dataset.value);
       //Если значение единица возвращаем фолс
       if(parentAmount.children[0].value == 1){
           return false;
       }
       //Меняем значение инпута
       parentAmount.children[0].setAttribute('value',+parentAmount.children[0].value - +parentAmount.children[0].dataset.am);
       //Если нажалаи на клоус
   }else if(datPlus.classList.contains('cl')){
       // Родитель клоус
       let parentClose = datPlus.parentNode;
       //Родитель price
       let parentPrice = parentClose.parentNode;
       //Инпут
       let inputPrice = +parentClose.previousElementSibling.children[0].value;
       //Значение итоговой цены инпута
       let last = total.getAttribute('value');
       //Меням значение итоговой цены при закрытиии
       total.setAttribute('value',+last - inputPrice);
       //Ремувим товар
       parentPrice.parentNode.remove();
   }
});
