'use strict';
let leftTabs = document.querySelector('.panel-tabs');
let panels = document.querySelector('.panel-marks').children;
let plus = document.querySelector('.plus');
let hamb = document.querySelector('.hamb');

leftTabs.addEventListener('click',(e)=>{
   for (let i = 0;i < panels.length;i++){
       if(e.target.dataset.el == 0){
           panels[0].style.display = 'block';
           panels[1].style.display = 'none';
           plus.style.backgroundColor = '#f2f2f2';
           hamb.style.backgroundColor = 'transparent';
       }else if(e.target.dataset.el == 1){
           panels[1].style.display = 'block';
           panels[0].style.display = 'none';
           plus.style.backgroundColor = 'transparent';
           hamb.style.backgroundColor = '#f2f2f2';
       }
   }
});

//Переключалка табов диски и шины
let tabs = document.querySelector('.tabs');
let forms = document.querySelector('.forms').children;

tabs.addEventListener('click',(e) => {
    for (let i = 0;i < tabs.children.length;i++){
        if(e.target == tabs.children[i]){
            forms[i].style.display = 'flex';
            tabs.children[i].style.backgroundColor = '#dddddd';
        }else{
            tabs.children[i].style.backgroundColor = '#cccccc';
            forms[i].style.display = 'none';
        }
    }
});

//Визуальное отображение файлов для загрузки на сервер

let inputImg = document.querySelector('#uploadImg');
let outMainImg = document.querySelector('.add-plus');
let outImg = document.querySelector('.out');
let btn = document.querySelector('#btn');
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
