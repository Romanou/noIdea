window.onload = function () {
    document.querySelector('#searchButton').addEventListener('click',function () {
        this.classList.toggle('open');
        document.querySelector('div.search').classList.toggle('open');
    });

    document.querySelector('#header div.menu div.hamb').addEventListener('click',function () {
        document.querySelector('#header').classList.toggle('open');
    });
};