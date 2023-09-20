
document.addEventListener("DOMContentLoaded", resposive);

function resposive(){
let btnResposive=document.querySelector("#btn-nav");
btnResposive.addEventListener("click",menuResponsive);

    function menuResponsive(){  
        let nav=document.querySelector("nav");
        let clase1="nav";
        let clase2="toggle-nav"
        nav.classList.toggle(clase1);
        nav.classList.toggle(clase2);  
    }
}