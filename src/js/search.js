let search = document.getElementById('pesquisar');

search.addEventListener('keydown', function (event){
    if(event.key === 'Enter'){
        searchData();
    }
})

function searchData(){
    window.location = 'system.php?search=' + search.value;
}

function reloadPage(){
    window.location.reload();
}

