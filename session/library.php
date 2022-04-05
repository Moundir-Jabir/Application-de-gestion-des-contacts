<?php

    function authenticate($username, $password){
        require(dirname(__FILE__) . '/../assets/database/models/utilisateur.php');
        $item = new Utilisateur();
        $data = $item->getUserByUsernameAndPassword($username, $password);
        if(!$data){
            return false;
        }else{
            date_default_timezone_set('UTC');
            $data->date_connexion = date('l jS \of F Y h:i:s A');
            $_SESSION['user'] = $data;
            return true;
        }
    }

    function is_authenticate(){
        return isset($_SESSION['user']);
    }

    function redirection_login(){
        if(!is_authenticate()){
            header("Location: index.php");
            die();
        }
    }

    function redirection_admin(){
        if(is_authenticate()){
            header("Location: profil.php");
            die();
        }
    }
?>