<?php

class Autenticador{
    public static function iniciar(){
        if(session_status() != PHP_SESSION_ACTIVE){//verifico si la session ya esta activa
            session_start();// si no lo esta, inicia una sesión  
        } //Esto es necesario para poder usar sesiones y almacenar datos en ellas. son como "cajitas"
    }

    public static function login($usuario){
        Autenticador::iniciar();
        $_SESSION['USUARIO_ID'] = $usuario->id_usuario;
        $_SESSION['EMAIL_ID'] = $usuario->nombreUsuario;
        $_SESSION['ROL'] = $usuario->roll;
    }//Esto permite rastrear al usuario autenticado a lo largo de su visita al sitio web y el rol para mostrar distintos tipo de paginas con distintos permisos

    public static function logout(){
        Autenticador::iniciar();
        session_destroy(); // borra la sesion deslogeando al usuario
    }

    public static function verificar(){//funcion para verifiar si un usuario es logeado a traves de sesion
        Autenticador::iniciar();
        if(!isset($_SESSION['USUARIO_ID'])){
            header('Location: ' . BASE_URL . '/login');
            die();

        }//Comprueba si la variable de sesión USUARIO_ID está definida.
    }
    public static function esAdmin(){//funcion para comprobar si el usuaruario es admin utilizando su rol 
        Autenticador::iniciar();
        if(($_SESSION['ROL'])=="admin"){
            return true;}
        else{return false;};
    }
}

?>