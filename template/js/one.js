'use strict';
let tire = $(".form_for_characteristics:eq(0)");
let disk = $(".form_for_characteristics:eq(1)");
//Лейбл для машины шины
let labelAutoTire = $(".labels div:eq(0)");
//Лейбл для машины диски
let labelAutoDisk = $(".labels div:eq(1)");
//Лейбл для шины
let labelTire = $(".labels div:eq(2)");
//Лейбл для диска
let labelDisk = $(".labels div:eq(3)");
//Селекты в шинах
let selectsTires = $(".selects_wrap .form_for_characteristics:eq(0)");
//Селекты в дисках
let selectsDisks = $(".selects_wrap .form_for_characteristics:eq(1)");
//Селекты в машинах шин
let selectsInAutoTire = $(".selects_wrap .form_for_car:eq(0)");
//Селекты в машинах дисков
let selectsInAutoDisk = $(".selects_wrap .form_for_car:eq(1)");

let btn = document.querySelector('#btn');

$('#tire').addClass('active');
$('#disk').addClass('notActive');
labelTire.addClass('addBorder');
labelDisk.addClass('addBorder');
labelAutoDisk.on('click', () => {
    selectsTires.hide();
    selectsDisks.hide();
    selectsInAutoTire.hide();
    selectsInAutoDisk.css({display:'flex'});
});
labelAutoTire.on('click', () => {
    selectsTires.hide();
    selectsDisks.hide();
    selectsInAutoDisk.hide()
    selectsInAutoTire.css({display:'flex'});
});
labelTire.on('click', () => {
    selectsDisks.hide();
    selectsInAutoTire.hide();
    selectsInAutoDisk.hide()
    selectsTires.css({display:'flex'});
});
labelDisk.on('click', () => {
    selectsDisks.css({display:'flex'});
    selectsInAutoDisk.hide()
    selectsInAutoTire.hide();
    selectsTires.hide();
});
$('#tire').on('click',  () => {
    labelAutoTire.show();
    tire.show();
    labelTire.show();
    labelDisk.hide();
    disk.hide();
    labelAutoDisk.hide();
    selectsInAutoTire.hide();
    selectsInAutoDisk.hide();
});
$('#disk').on('click',  () => {
    tire.hide();
    labelTire.hide();
    labelAutoTire.hide();
    selectsInAutoTire.hide();
    selectsInAutoTire.hide();
    disk.css({display:'flex'});
    labelDisk.show();
    labelAutoDisk.show();
});
let legends = document.querySelector('.legends').children;
let labels = document.querySelector('.labels').children;

document.querySelector('.legends').addEventListener('click', (e) => {
    for (let i = 0;i <legends.length; i++){
        if(e.target == legends[i]){
            legends[i].classList.remove('notActive');
            legends[i].classList.add('active');
            labelAutoTire.removeClass('addBorder');
            labelAutoDisk.removeClass('addBorder');
            labelTire.removeClass('nonBorder');
            labelDisk.removeClass('nonBorder');
            labelTire.addClass('addBorder');
            labelDisk.addClass('addBorder');

        }else {
            legends[i].classList.remove('active');
            legends[i].classList.add('notActive');
        }
        if(e.target == legends[0]){
            btn.setAttribute('form','search_tires');
        }else if(e.target == legends[1]){
            btn.setAttribute('form','search_disks');
        }
    }
});
document.querySelector('.labels').addEventListener('click', (e) => {
    for (let i = 0;i <labels.length; i++){
        if(e.target == labels[i]){
            labels[i].classList.remove('nonBorder');
            labels[i].classList.add('addBorder');
        }else {
            labels[i].classList.remove('addBorder');
            labels[i].classList.add('nonBorder');
        }
        //Меня значение атрибута у кнокпи в зависимости от нажатой вкладки
        if(e.target == labels[0]){
            btn.setAttribute('form','search_tire_by_car');
        }else if(e.target == labels[1]){
            btn.setAttribute('form','search_disk_by_car');
        }else if(e.target == labels[2]){
            btn.setAttribute('form','search_tires');
        }else if(e.target == labels[3]){
            btn.setAttribute('form','search_disks');
        }
    }
});
//Выбираем селекты
let selectTires = document.querySelector('#search_tires').children;
let selectDisks = document.querySelector('#search_disks .wrap').children;
let selectDisk2 = document.querySelector('#search_disks .wrap:nth-child(2)').children;
//Циклим селекты чтобы убирался атрибут required
for(let i = 0; i <selectTires.length; i++){
    selectTires[i].setAttribute('required','');
    selectTires[i].addEventListener('change',()=>{
        for(let a of selectTires){
            a.removeAttribute('required');
        }
    });
}
for(let i = 0; i <selectDisks.length; i++){
    selectDisks[i].setAttribute('required','');
    selectDisks[i].addEventListener('change',()=>{
        for(let a of selectDisks){
            a.removeAttribute('required');
        }
        for(let a of selectDisk2){
            a.removeAttribute('required');
        }
    });
}
for(let k = 0; k <selectDisk2.length; k++){
    selectDisks[k].setAttribute('required','');
    selectDisk2[k].addEventListener('change',()=>{
        for(let a of selectDisk2){
            a.removeAttribute('required');
        }
        for(let a of selectDisks){
            a.removeAttribute('required');
        }
    });
}
