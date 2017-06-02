window.onload = function () {
    document.querySelector('#searchButton').addEventListener('click',function () {
        document.querySelector('div.search').classList.toggle('open');
    });
}