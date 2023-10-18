<?php
require_once 'app/models/producto.model.php';
require_once 'app/models/categoria.model.php';
require_once 'app/views/producto.view.php';
require_once 'app/autenticador.php';



class productoController{
    private $model;
    private $modelCategoria;
    private $view;
    private $controller;
    public function __construct(){
        //verificamos si esta logueado 
        Autenticador::verificar();
        $this->model = new productoModel();
        $this->modelCategoria = new categoriaModel();
        $this->view = new productoView();
    }
    public function mostrarProductos(){
        $categorias= $this->modelCategoria->getCategorias();
        // meto en la variable productos los resultados de la funcion que ya tenia en model
        $productos = $this->model->getProductos();
        if((Autenticador :: esAdmin()) == true){
            $this->view->mostrarAdminView($productos,$categorias);}//si es admin mostramos la vista de admin
        else{
            $this->view->mostrarProductos($productos,$categorias);}//si es usuario mostramos la vista de usuario

    }
    public function mostrarDetalle($id){//funcion para mostrar los detalles inviduales de un producto
        $detalles = $this->model->getDetalleProducto($id);
        $idCategoria=$this->model->getIdcategoriaPorId($id);
        $categoria=$this->modelCategoria->getCategoriaPorId($idCategoria->id_categoria);
        $this->view->mostrarProductoDetallado($detalles,$categoria);
    }

    public function mostrarProductosPorCategoria($categoria){//funcion para mostrar los productos de una categoria
        $categorias= $this->modelCategoria->getCategorias($categoria);  
        $id_categoria= $this->modelCategoria->getCategoria($categoria)->id_categoria;
        $productos = $this->model->getProductosCategoria($id_categoria);
        $this->view->mostrarProductos($productos,$categorias);
    }
   

    function agregarProducto(){//funcion para agregar producto en caso de ser admin
        //obtengo los datos del usuario
        if((Autenticador :: esAdmin()) == true){
        $producto = $_POST['producto'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['categoria'];
        //validamos 
        if(empty($producto) || empty($precio)||($precio<0)|| empty($id_categoria) ){
            $this->view->mostrarError("Debe completar todos los campos");
            return;
        }
        $idCategoria=$this->modelCategoria->getCategoria($id_categoria)->id_categoria;
 
        $id = $this->model->insertarProducto($producto, $descripcion, $precio, $idCategoria);
        if($id){
            header('Location: '.BASE_URL .'/admin');

        } else{
            $this->view->mostrarError('Error al insertar productos');
        }
    } else{ header('Location: '.BASE_URL); }
    }
   
    function sacarProducto($id){//funcion para eliminar productos en caso de ser admin
        if((Autenticador :: esAdmin()) == true){
        $this->model->borrarProducto($id); 
        header('Location: '.BASE_URL .'/admin'); //ruta q me lleva a 'home' otra vez para q crear el efecto de dinamismo 
    }else{header('Location: '.BASE_URL);}
    }

    function editarProducto($id){//funcion para editar productos
        if((Autenticador :: esAdmin()) == true){
            $modificar = $this->model->editarProducto($id);//dentro de modificar tengo el producto que deseo editar
            $this->view->editarProducto($modificar);//le paso a editarProducto un arreglo que tiene todas las columnas de un elemento 
                
        }
    }
    function procesarEdicion($id){//funcion para editar con los datos nuevos
        $Nproducto = $_POST['nuevoProducto'];
        $Nprecio = $_POST['nuevoPrecio'];
        $Ndescripcion = $_POST['nuevaDescripcion'];

        if(empty($Nproducto) || empty($Nprecio)||($Nprecio<0) ){
            $this->view->mostrarError("Debe completar todos los campos");
            return;
        }else{
            $this->model->actualizarProducto( $Nproducto, $Nprecio, $Ndescripcion, $id);
        header('Location: '.BASE_URL .'/admin');} 
        
    }
}
?>