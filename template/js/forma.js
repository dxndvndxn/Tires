'use strict';
let signIn = document.querySelector('#in');
let signUp = document.querySelector('#up');
let forma = document.querySelector('#up_in');
let close = document.querySelector('.close');
let submt = document.querySelector("input[type='submit']");

signIn.addEventListener('click',()=>{
    for(let i = 0; i < forma.children.length;i++){
        if(forma[i].classList.contains('signIn')){
            forma[i].style.display = 'block';
            close.style.display = 'block';
            submt.setAttribute('value','Вход');
        }else{
            forma[i].style.display = 'none';
        }
    }
});
signUp.addEventListener('click',()=>{
    for(let i = 0; i < forma.children.length;i++){
        if(forma[i].classList.contains('signUp')){
            forma[i].style.display = 'block';
            close.style.display = 'block';
            submt.setAttribute('value','Регистрация');
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
$("#email").change( function(){
     let email = isValid("#email", '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}$');
    if(email){
        $("#email").addClass('valid');
    }else{
        $("#email").css({border:'1px solid red'});
        submt.setAttribute('disabled','');
    }
});
//Валидация пароля
$('input[name=passreg]').change(function() {
     let pswd = $(this).val();
    if (pswd.length < 8){
        $('input[name=passreg]').css({border:'1px solid red'});
        submt.setAttribute('disabled','');
    }else{
        $('input[name=passreg]').addClass('valid');
    }
});
//Проверка на отправку формы
$('input[name=passreg]').blur(function () {
    if($('input[name=passreg]').hasClass('valid') && $("#email").hasClass('valid')){
        submt.removeAttribute('disabled');
    }
});
$("#email").blur(function () {
    if($('input[name=passreg]').hasClass('valid') && $("#email").hasClass('valid')){
        submt.removeAttribute('disabled');
    }
});