window.onload = function () {
    var header = document.querySelector('#header');

    document.querySelector('#searchButton').addEventListener('click',function () {
        this.classList.toggle('open');
        document.querySelector('div.search').classList.toggle('open');
    });

    document.querySelector('#header div.menu div.hamb').addEventListener('click',function () {
        header.classList.toggle('open');
    });

    document.querySelector('#header div.black_screen').addEventListener('click',function(){
        header.classList.toggle('open');
    });
};