'use strict';

let total = document.querySelector('.total-inp');
let cards = document.querySelector('.cards');
if(total.value.length <= 2){
    total.style.width = '35px';
}
cards.addEventListener('click',function (e) {
    let datPlus = e.target;
    //Если нажали на плюс
    if(datPlus.classList.contains('add') || datPlus.classList.contains('plus')){
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
        mainParent[0].children[0].setAttribute('value',+mainParent[0].children[0].value + +mainParent[0].children[0].dataset.value/4);
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
        total.setAttribute('value',+last + +mainParent[0].children[0].dataset.value/4);
        //Если нажали на минус
    }else if(datPlus.classList.contains('remove')){
        //Рордитель минуса
        let parentMinus = datPlus.parentNode;
        //Контейнер amount
        let parentAmount = parentMinus.parentNode;
        // Родитель прайса
        let mainParent = parentAmount.parentNode.nextElementSibling.children;
        //Меняем значение итоговой цены
        let last = total.getAttribute('value');
        //Если значение прайса равно самом прайсу в data возвращаем фолс
        if(mainParent[0].children[0].value == mainParent[0].children[0].dataset.value/4){
            return false;
        }
        //Меняем значение итоговой цены
        total.setAttribute('value',+last - +mainParent[0].children[0].dataset.value/4);

        //Меняем ширину инпута в зависимости от кол-во цифр в нем
        if(mainParent[0].children[0].value.length <= 5){
            mainParent[0].children[0].style.width = '90px';
        }
        if(mainParent[0].children[0].value.length < 6){
            mainParent[0].children[0].style.width = '100px';
        }

        //Меняем значение инпута в прайсе
        mainParent[0].children[0].setAttribute('value',+mainParent[0].children[0].value - +mainParent[0].children[0].dataset.value/4);
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
        //Меняем длинну инпута для тотал прайс
        if(total.value.length <= 2){
            total.style.width = '35px';
        }
        //Ремувим товар
        parentPrice.parentNode.remove();

        if (cards.children.length == 0){
            $('.form-fill').hide();
            wrapBtn.style.marginTop = '0px';
        }
    }
});

//Убираем по яксу товары из корзины
$(document).ready(function () {
    $('.cl').click(function () {
        let close = $(this).attr('data-id');
        if($(this).hasClass('cl tire')){
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                },
                url: '/ajax',
                type: "POST",
                data:{'tireCl': close} ,
                success: function (data) {
                    $('#count').html(data);
                    // console.log(data);
                }
            });
        }else{
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                },
                url: '/ajax',
                type: "POST",
                data:{'diskCl': close} ,
                success: function (data) {
                    $('#count').html(data);
                    // console.log(data);
                }
            });
        }
        if ($('.cards').length < 2){
            wrapBtn.style.marginTop = '51px';
        }else{
            wrapBtn.style.marginTop = '0px';
        }
    });
});
let wrapBtn = document.querySelector('.wrap-btn');


(cards.children.length < 2) ? wrapBtn.style.marginTop = '51px' : wrapBtn.style.marginTop = '0px';

let radios = document.querySelectorAll('.radios input');
let adress = document.getElementById('adress');
let submitCart = document.getElementById('submitCart');
radios.forEach((el,i) =>{

    el.addEventListener('change',() =>{

        el.style.backgroundColor = '#000';

        if (el === radios[0]){
            adress.value.length === 0 || adress.value === 'Кантемировская 39В' ? adress.value = '' : console.log('Hi Mark');
        }else if (el === radios[1]){
            adress.value = 'Кантемировская 39В';
        }else if (el === radios[2]){
            submitCart.value = 'Оформить заказ';
            submitCart.style.padding = '15px 31.3px';
        }else if (el === radios[3]){
            submitCart.value = 'Перейти к оплате';
            submitCart.style.padding = '15px 25px';
        }

        for (let radio of radios){

            if (!radio.checked){
                radio.style.backgroundColor = 'transparent';
            }

        }

    });
});



let amountOfArticle = document.querySelectorAll('.amount input');

submitCart.addEventListener('click', (e) => {

    this.onsubmit = function () {

        total.removeAttribute('disabled');

        for ( let inp of amountOfArticle ){

            inp.removeAttribute('disabled');

        }
    };
});

adress.oninput = ()=>{
    radios[0].value = adress.value;
};

