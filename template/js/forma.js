'use strict';

let signIn = document.querySelector('#in');
let signUp = document.querySelector('#up');
let forma = document.querySelector('#up_in');
let close = document.querySelector('.close');
let submt = document.querySelector("input[type='submit']");

//По клику войти

signIn.addEventListener('click',()=>{
    for(let i = 0; i < forma.children.length;i++){
        if(forma[i].classList.contains('signIn')){
            forma[i].style.display = 'block';
            close.style.display = 'block';
            submt.setAttribute('value','Вход');
            submt.setAttribute('name','in');
        }else{
            forma[i].style.display = 'none';
        }
    }
});
//По клику зарегаться
signUp.addEventListener('click',()=>{
    for(let i = 0; i < forma.children.length;i++){
        if(forma[i].classList.contains('signUp')){
            forma[i].style.display = 'block';
            close.style.display = 'block';
            submt.setAttribute('value','Регистрация');
            submt.setAttribute('name','submit');
        }else{
            forma[i].style.display = 'none';
        }
    }
});
close.addEventListener('click', ()=>{
    for(let i = 0; i < forma.children.length;i++){
        forma[i].style.display = 'none';
        close.style.display = 'none';
    }
});
//Валидация
function isValid(id, pat) {
    let value = $(id).val();
    let pattern =  new RegExp("^"+pat+"","i");
    if(pattern.test(value)) {
        return true;
    }else {
        return false;
    }
}
//Валидация email
$("#email").on('input', function(){
     let email = isValid("#email", '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}$');
    if(email){
        if(passreg.value >= 8){
            submt.removeAttribute('disabled');
            passreg.style.border = '1px solid green';
        }
        $("#email").addClass('valid');
    }else{
        $("#email").css({border:'1px solid red'});
        submt.setAttribute('disabled','');
    }
});
$("#email2").on('input', function(){
    let email2 = isValid("#email2", '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}$');
    if(email2){
        if(passin.value >= 8){
            submt.removeAttribute('disabled');
            passin.style.border = '1px solid green';
        }
        $("#email2").addClass('valid');
    }else{
        $("#email2").css({border:'1px solid red'});
        submt.setAttribute('disabled','');
    }
});
let passreg = document.querySelector('input[name=passreg]');
let passin = document.querySelector('input[name=passin]');
//Валидация пароля
passreg.oninput = function() {
    if (this.value.length < 8) {
        this.style.border = '1px solid red';
        submt.setAttribute('disabled','');
        this.focus();
    } else {
        if($("#email").hasClass('valid')) {
            this.style.border = '1px solid green';
            submt.removeAttribute('disabled');
        }
    }
};
passin.oninput = function() {
    if (this.value.length < 8) {
        this.style.border = '1px solid red';
        submt.setAttribute('disabled','');
        this.focus();
    } else {
        if($("#email2").hasClass('valid')) {
            this.style.border = '1px solid green';
            submt.removeAttribute('disabled');
        }
    }
};
