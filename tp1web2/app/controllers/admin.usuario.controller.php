<?php
require_once 'app/controllers/producto.controller.php';


    class adminController{
        private $view;
        private $controller;
        
        function __construct(){
            $this->controller = new productoController();
            //$this->view = new productoView();
        }
        public function mostrarAdmin(){//mostrar el visual de admin
            $admin=true;
           // $this->view->mostrarAdminView();
            $this->controller->mostrarProductos($admin);
        }
    }