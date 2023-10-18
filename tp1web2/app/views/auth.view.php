<?php 

class authView{

    public function mostrarLogin($error = null){
        require 'templates/login.phtml';
    }

    public function mostrarErrorAuth(){
        require 'templates/error.phtml';
    }
}