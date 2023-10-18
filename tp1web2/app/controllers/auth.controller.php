<?php
require_once 'app/views/auth.view.php';
require_once 'app/models/usuario.model.php';
require_once 'app/autenticador.php';


class authController{
    private $view;
    private $model;
    

    function __construct(){
        $this->model = new usuarioModel();
        $this->view = new authView();
    }

    public function mostrarLogin(){
        $this->view->mostrarLogin();;
    }

    public function auth(){
        $nombreUsuario = $_POST ['nombre'];
        $password = $_POST['password'];
        //obtengo los datos del post de login

        if(empty($nombreUsuario) || empty($password)){//verifico la integridad de los datos
            $this->view->mostrarLogin('El nombre o la contrasenia estan incompletas...');
            return;//si estan incompletos van de nuevo al login
        }
        //si estan completos busco el usuario por el nombre usuario
        $usuario = $this->model->getByNombreUsuario($nombreUsuario);
        if($usuario && password_verify($password , $usuario->password)){
            // si usuario existe y la contrasenia coinside....
            Autenticador::login($usuario);//autenticado
            if($usuario->roll=="admin"){        //si el rol del usuario es admin lo mando al admin controller       
                header('Location: '.BASE_URL .'/admin');
            }
            else{
                header('Location: '.BASE_URL);// si no es admin lo envio al de usuarios
            }
        } else{

            $this->view->mostrarLogin('Usuario invalido, intentar de nuevo');//si no coicidio nombre usuario y la contraseña ejecutamos
            //login con parametro error
        }
    }

    public function logout(){//deslogeo a travez de elimar la sesion
         Autenticador::logout();
         header('Location: '.BASE_URL);
    }
    
}