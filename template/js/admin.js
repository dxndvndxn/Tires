'use strict';
let leftTabs = document.querySelector('.panel-tabs');
let panels = document.querySelector('.panel-marks').children;
let plus = document.querySelector('.plus');
let hamb = document.querySelector('.hamb');
let btn = document.querySelector('#btn');
let inputImg = document.querySelector('#uploadImg');
let loc = window.location.href;
if(loc.match(/[1-9]+/)){
    panels[1].style.display = 'block';
    panels[0].style.display = 'none';
    panels[2].style.display = 'none';
    plus.style.backgroundColor = 'transparent';
    leftTabs.children[2].style.backgroundColor = 'transparent';
    hamb.style.backgroundColor = '#f2f2f2';
}
leftTabs.addEventListener('click',(e)=>{
   for (let i = 0;i < panels.length;i++){
       if(e.target.dataset.el == 0){
           panels[0].style.display = 'block';
           panels[1].style.display = 'none';
           panels[2].style.display = 'none';
           plus.style.backgroundColor = '#f2f2f2';
           hamb.style.backgroundColor = 'transparent';
           leftTabs.children[2].style.backgroundColor = 'transparent';
       }else if(e.target.dataset.el == 1){
           panels[1].style.display = 'block';
           panels[0].style.display = 'none';
           panels[2].style.display = 'none';
           plus.style.backgroundColor = 'transparent';
           leftTabs.children[2].style.backgroundColor = 'transparent';
           hamb.style.backgroundColor = '#f2f2f2';
       }else if(e.target.dataset.el == 2){
           panels[2].style.display = 'block';
           panels[1].style.display = 'none';
           panels[0].style.display = 'none';
           plus.style.backgroundColor = 'transparent';
           hamb.style.backgroundColor = 'transparent';
           leftTabs.children[2].style.backgroundColor = '#f2f2f2';
       }
   }
});

//Переключалка табов диски и шины
let tabs = document.querySelector('.tabs');
let forms = document.querySelector('.forms').children;
let price = document.querySelector('#price');
let amount = document.querySelector('#amount');
let nameArt = document.querySelector('#nameTire');
let description = document.querySelector('#description');
tabs.addEventListener('click',(e) => {
    for (let i = 0;i < tabs.children.length;i++){
        if(e.target === tabs.children[i]){
            forms[i].style.display = 'flex';
            tabs.children[i].style.backgroundColor = '#dddddd';
        }else{
            tabs.children[i].style.backgroundColor = '#cccccc';
            forms[i].style.display = 'none';
        }
        if(e.target === tabs.children[0]){
            btn.setAttribute('form', forms[0].id);
            inputImg.setAttribute('form', forms[0].id);
            price.setAttribute('form', forms[0].id);
            amount.setAttribute('form', forms[0].id);
            nameArt.setAttribute('form', forms[0].id);
            description.setAttribute('form', forms[0].id);
            btn.setAttribute('name', 'newTire');
        }else if(e.target === tabs.children[1]){
            btn.setAttribute('form', forms[1].id);
            inputImg.setAttribute('form', forms[1].id);
            price.setAttribute('form', forms[1].id);
            amount.setAttribute('form', forms[1].id);
            nameArt.setAttribute('form', forms[1].id);
            description.setAttribute('form', forms[1].id);
            btn.setAttribute('name', 'newDisk');
        }
    }
});

//Визуальное отображение файлов для загрузки на сервер
let outMainImg = document.querySelector('.add-plus');
let outImg = document.querySelector('.out');
let count = 0;
inputImg.addEventListener('change',()=>{
    //Создаем псевдомассив из загрузочных файлов
    let deFile = inputImg.files;
    for(let i = 0;i < deFile.length;i++){
        //Создаем объект который читает файл
        let reader = new FileReader();
        //Читаем конкретно img
        reader.readAsDataURL(deFile[i]);
        reader.onload = function () {
            let imgWrap = document.createElement('div');
            outImg.addEventListener('click',(e)=>{
                let circles = document.getElementsByClassName('circle');
                for(let k = 0;k < circles.length;k++){
                    if(e.target.classList.contains('circle')){
                        outMainImg.innerHTML = `<img src="${e.target.previousElementSibling.getAttribute('src')}">`;
                        outMainImg.style.height = 'auto';
                        btn.setAttribute('value',e.target.dataset.name);
                        e.target.style.border = 'none';
                        e.target.style.backgroundColor = '#e32636';
                        if(e.target === circles[k]){
                            circles[k].style.border = 'none';
                            circles[k].style.backgroundColor = '#e32636';
                        }else{
                            circles[k].style.border = '1px solid #1c1c1c';
                            circles[k].style.backgroundColor = '#f2f2f2';
                        }
                    }else{
                        return;
                    }

                }
            });
            outImg.append(imgWrap);
            imgWrap.insertAdjacentHTML("afterBegin", `<span class="circle" data-name="${deFile[i].name}" data-i="${count++}"></span>`);
            imgWrap.insertAdjacentHTML("afterBegin", `<img src="${reader.result}">`);
        }
    }
});

//Блок удаления товара
let btns = document.querySelectorAll('.delete');

for(let i = 0; i < btns.length; i++){
    btns[i].addEventListener('click',function (e) {
        if(e.target === btns[i]){
            btns[i].classList.toggle('activeDeleteBtn');
            if(btns[i].hasAttribute('value')){
                btns[i].removeAttribute('value');
            }else{
                btns[i].setAttribute('value',btns[i].dataset.val);
            }
        }
    })
}

