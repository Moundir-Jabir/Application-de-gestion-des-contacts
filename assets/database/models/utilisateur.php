<?php
require('data_provider.php');
class Utilisateur extends DataProvider {
    public function getUserByUsernameAndPassword($username, $password){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "SELECT * FROM utilisateur WHERE username = :username && password = :password";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":username" => $username,
            ":password" => $password
        ]);
        $data = $smt->fetch(PDO::FETCH_OBJ);
        $smt = null;
        $db = null;
        return $data;
    }

    public function addUser($username, $password){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "INSERT INTO utilisateur (username, password) VALUES (:username, :password)";
        $smt = $db->prepare($sql);
        try{
            $smt->execute([
                ":username" => $username,
                ":password" => $password
            ]);
            return "bien";
        }
        catch(Exception $e){
            return $e;
        }
        $smt = null;
        $db = null;
    }
}