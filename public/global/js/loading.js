
let loading = document.querySelector("#carregando")
loading.style.display = "flex";
let content = document.querySelector("#conteudo")
content.style.display = "none";

window.onload = function(){
        //hide the preloader
        let item = document.querySelector("#carregando")
        let content = document.querySelector("#conteudo")

        item.style.opacity = "0";
        content.style.display = "initial";

    }
