<?php 

class productoView{

    public function mostrarProductos($productos, $categorias){
        require 'templates/listaProductos.phtml';
    }
    public function mostrarProductoDetallado($productos, $categoria){
        require 'templates/productoDetallado.phtml';
    }
    public function mostrarAdminView($productos,$categorias){
        require 'templates/listaProductosAdmin.phtml';
    }

    public function mostrarForm(){
        require 'templates/form.php';
    }

    public function mostrarError(){
        require 'templates/error.phtml';
    }

    public function editarProducto($modificar){
        require 'templates/fromEditar.phtml';
    }

    public function editarCategoria($categoria){
        require 'templates/editarCategoria.phtml';
    }
    public function mostrarAgregarNuevaCategoria(){
        require 'templates/agregarCategoria.phtml';
    }

}

?>