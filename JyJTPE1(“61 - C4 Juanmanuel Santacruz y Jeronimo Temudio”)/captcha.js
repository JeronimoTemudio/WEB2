"use strict"
//Generamos numero aleatorio

let btnGenerarNumeroAleatorio = document.querySelector("#genera-num-captcha");
btnGenerarNumeroAleatorio.addEventListener("click", generarNumero);
//Declaramos el boton para validar e l Captcha
let btnComparNumero=document.querySelector("#validar-captcha");
btnComparNumero.addEventListener("click", compararNumeros);

//creamos la funcion que genera un numero aleatorio entre x y x, luego mostramos ese numero en un parrafo
function generarNumero() {
    let numero=Math.floor((Math.random()*700000)+100000);
    let parrafoCaptcha=document.querySelector("#parrafo-captcha");
    parrafoCaptcha.innerHTML=numero;
    console.log(numero);
}
//creamos una funcion que obtiene un numero escrito por el usuario y luego comparamos ese numero con el numero aleatorio creado anteriormente, 
function compararNumeros(){
    let numeroUsuario=document.querySelector("#numero-del-usuario").value;
    let numero=document.querySelector("#parrafo-captcha").innerHTML;
    let parrafoBienvenido=document.querySelector("#parrafo-bienvenido");
    function bienvenido(){  /* subfuncion que muestra por pantalla los datos del usuario en caso de que apruebe el captcha*/ 
        let nombreUsuario=document.querySelector("#nombre-usuario").value;
        let apellidoUsuario=document.querySelector("#apellido-usuario").value;
        let emailUsuario=document.querySelector("#email-usuario");
        removeCaptcha();
        showForm();
        console.log(nombreUsuario);
        parrafoBienvenido.innerHTML= nombreUsuario +" "+ apellidoUsuario  ;
        
      
    }
    if((numeroUsuario==numero) && (numeroUsuario != 0)){/* si el numero del usuario es el mismo que el numero aleatorio generado y distinto de cero, llama a la funcion bienvenido*/
        bienvenido();
    }
    else{
        parrafoBienvenido.innerHTML="mal, volve a intentar";/*si el numero del usuario es distinto al captcha, le muestra en un parrafo que esta mal y vuelve a generar el numero*/
        generarNumero();
        limpiarInput();
       
    }    
    function limpiarInput(){
        let numeroUsuario=document.querySelector("#numero-del-usuario").value='';
    }
}
function removeCaptcha(){  //funcion para simular que una vez aprobado el captcha la pagina te permite avanzar al carrito//
    let divCaptcha=document.querySelector(".contenedor-captcha");
    let clase1="contenedor-captcha";
    let clase2="toggle-contenedor-captcha"
    divCaptcha.classList.remove(clase1);
    divCaptcha.classList.add(clase2);  
}
function showForm(){  //funcion para simular que una vez aprobado el captcha la pagina te permite avanzar al carrito//
    let contenedorForm=document.querySelector(".contenedor-form");
    let clase1="contenedor-form";
    let clase2="toggle-contenedor-form"
    contenedorForm.classList.remove(clase1);
    contenedorForm.classList.add(clase2);  
}


