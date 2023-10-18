<?php
require 'app/model.php';
//pagina conexion con la tabla usuarios de la bd jj_autopartes
class usuarioModel{
    private $bd;
    
        function __construct(){
        $this->bd = new PDO('mysql:host=localhost;dbname=jj_autopartes;charset=utf8', 'root','');
    }
    //funcion para buscar un usuario en basse a su nombre
        public function getBynombreUsuario($nombreUsuario){
        $consulta = $this->bd->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $consulta->execute([$nombreUsuario]);

        return $consulta->fetch(PDO::FETCH_OBJ);
            // NO FETCHALL por que solo quiero un mail es inecesario un arreglo 

    }

}