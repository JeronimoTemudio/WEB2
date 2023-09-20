"use strict"
let btnCargar1 = document.querySelector("#btn-cargar1").addEventListener("click", cargarCarrito);
let btnCargar2= document.querySelector("#btn-cargar2").addEventListener("click", cargarCarrito2);
let btnCargar3 = document.querySelector("#btn-cargar3").addEventListener("click", cargarCarrito3);
let btnBorrarUltimo = document.querySelector("#btn-borrar-ultimo").addEventListener("click", borrarUltimo);
let btnVaciar = document.querySelector("#btn-vaciar").addEventListener("click", vaciarLista);
let tablaDom=document.querySelector(".table-body");
let parrafoIncompleto=document.querySelector("#parrafo-incompleto");
let tablaCarrito=[
    {
        producto: "motor",
        cantidad: "1",
        precio: "140000",
    },
    {
        producto: "Turbo",
        cantidad: "1",
        precio: "67000",
    }
]
generarTabla();

function cargarCarrito2(){
    let i = 0;
    for(i=0;i<2;i++){
        cargarCarrito();
    }
}
function cargarCarrito3(){
    let i=0;
    for(i=0;i<3;i++){
        cargarCarrito();
    }
}
function cargarCarrito(){
    let valorProducto = document.querySelector("#input-producto").value;
    let valorCantidad = document.querySelector("#input-cantidad").value;
    let valorPrecio = document.querySelector("#input-precio").value;
    let nuevoItem={
        producto: valorProducto,
        cantidad: valorCantidad,
        precio: valorPrecio,   
    }
    if((valorProducto!='')&&(valorCantidad>0)&&(valorPrecio>0)){
    tablaCarrito.push(nuevoItem);
    generarTabla(tablaCarrito);
    parrafoIncompleto.innerHTML="";}
    else{
        formularioIncompleto();
    }   
}
function formularioIncompleto() {
    parrafoIncompleto.innerHTML="Error, no completo alguna de las 3 casillas";
}
function generarTabla(arregloDatos){ 
  
    tablaDom.innerHTML="";
    for (const item of tablaCarrito) { 
        let tr=document.createElement("tr");
        let tda=document.createElement("td");
        let tdb=document.createElement("td");
        let tdc=document.createElement("td");
        tda.innerHTML=item.producto;
        tdb.innerHTML=item.cantidad;
        tdc.innerHTML=item.precio;
        tr.appendChild(tda);
        tr.appendChild(tdb);
        tr.appendChild(tdc);
        tablaDom.appendChild(tr);   
    }
}
function borrarUltimo() {
    tablaCarrito.pop();
    generarTabla();
}
function vaciarLista(){   
 tablaDom.innerHTML="";
 tablaCarrito=[];
}