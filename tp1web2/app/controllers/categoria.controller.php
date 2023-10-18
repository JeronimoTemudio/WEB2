<?php
require_once 'app/models/categoria.model.php';
require_once 'app/models/producto.model.php';
require_once 'app/views/producto.view.php';
require_once 'app/autenticador.php';


class categoriaController{
    private $categoriaModel;
    private $productoModel;
    private $view;

    
    public function __construct(){
        //verificamos si esta logueado 
        Autenticador::verificar();
        $this->categoriaModel = new categoriaModel();
        $this->productoModel = new productoModel();
        $this->view = new productoView();
    }
    public function eliminarCategoria($categoria){//funcion para eliminar una categoria primero eliminando los productos que tiene
        if((Autenticador :: esAdmin()) == true){
        $idCategoria= $this->categoriaModel->getCategoria($categoria);
        $this->productoModel->eliminarProductosPorCategoria($idCategoria->id_categoria);
        $this->categoriaModel->eliminarCategoria($idCategoria->id_categoria);}
    }
    public function mostrarAgregarCategoria(){//funcion para mostrar el template donde se agrega una categoria
        $this->view->mostrarAgregarNuevaCategoria();
    }
    public function agregarCategoria(){//funcion para agregar una categoria
        if((Autenticador :: esAdmin()) == true){
            $categoria = $_POST['nuevaCategoria'];
            if(empty($categoria)){
                $this->view->mostrarError("Debe completar todos los campos");
            }
            else {$this->categoriaModel->agregarCategoria($categoria);
                header('Location: '.BASE_URL .'/admin'); }
        }
        else{ $this->view->mostrarError("no es admin");}
    }

    public function mostrarEditarCategoria($categoria){//funcion para mostrar el template donde se edita una categoria
        if((Autenticador :: esAdmin()) == true){
            $this->view->editarCategoria($categoria);  }
            else{ $this->view->mostrarError("no es admin");}
    }
    public function editarCategoria(){//funcion para editar una categoria
        if((Autenticador :: esAdmin()) == true){
        $categoria = $_POST['categoria'];
        $Ncategoria = $_POST['nuevaCategoria'];
         $this->categoriaModel->editarCategoria($Ncategoria,$categoria);
         header('Location: '.BASE_URL .'/admin');}
         else{ $this->view->mostrarError("no es admin");}
        }
    }