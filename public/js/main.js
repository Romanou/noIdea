window.onload = function () {
    document.querySelector('#searchButton').addEventListener('click',function () {
        this.classList.toggle('open');
        document.querySelector('div.search').classList.toggle('open');
    });
}