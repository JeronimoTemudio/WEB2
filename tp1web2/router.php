<?php
require_once 'app/controllers/producto.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/admin.usuario.controller.php';
require_once 'app/controllers/categoria.controller.php';


// esta de abajo es una constante para generar una URL dinamica para que funcione en cualquier maquina 
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// el router va a leer la action desde el paramtro "action"

$accion = 'home'; // accion por defecto
if (!empty( $_GET['action'])) { 
    $accion = $_GET['action'];   // asignamos una accion a $action
}

// explode() parsea la accion Ej: pagina/1 --> ['pagina', 1]
$parametro = explode('/', $accion);

switch ($parametro[0]) { 
    case 'home':
        $controller = new productoController();
        $controller->mostrarProductos(false);
        break;
    case 'detalle':
        $controller = new productoController();
        $controller->mostrarDetalle($parametro[1]);
        break;    
    case 'categoria':
        $controller = new productoController();
        $controller->mostrarProductosPorCategoria($parametro[1]);
        break;
    case 'mostrarEditarCategoria':
        $controller = new categoriaController();
        $controller->mostrarEditarCategoria($parametro[1]);
        break;
    case 'editarCategoria':
        $controller = new categoriaController();
        $controller->editarCategoria();
        break;        
    case 'agregar':
       $controller = new productoController();
       $controller->agregarProducto();
        break;
    case 'editar':
        $controller = new productoController();
        $controller->editarProducto($parametro[1]);
        break;
    case 'yaEditado':
        $controller = new productoController();
        $controller->procesarEdicion($parametro[1]);
        break;
    case 'eliminar':
        $controller = new productoController();
        $controller->sacarProducto($parametro[1]);
        break;
     case 'eliminarCategoria':
        $controller = new categoriaController();
        $controller->eliminarCategoria($parametro[1]);
        break;
    case 'nuevaCategoria':
        $controller = new categoriaController();
        $controller->agregarCategoria();
        break;
    case 'agregarCategoria':
        $controller = new categoriaController();
        $controller->mostrarAgregarCategoria();
        break;                       
    case 'login':
        $controller = new authController();
        $controller->mostrarLogin();
        break;
    case 'logout':
        $controller = new authController();
        $controller->logout();
        break;    
    case 'auth':
        $controller = new authController();
        $controller->auth();
        break; 
    case 'admin':
         $controller = new adminController();
         $controller->mostrarAdmin();   
         break; 
    default: 
        echo "404 Page Not Found";
        break;
}

//update categoria
/*UPDATE `productos` SET `id_categoria` = REPLACE(`id_categoria`, 'camioneta', 'camionetas') WHERE `id_categoria` LIKE '%camioneta%' COLLATE utf8mb4_bin*/ 

//borrar categoria
/*  "DELETE FROM categorias WHERE `categorias`.`categoria` = 'camionetas'" */


//borrar producto entero con categoria de arriba
/* 'DELETE FROM `productos` WHERE `id_categoria` LIKE 'camionetas';*/
/*<div class="form-group">
         <label for="categoria" class="label-form">categoria</label>
         <input id="categoria" type="text" name="categoria" placeholder="categoria" class="input-field">
      </div>
      */

