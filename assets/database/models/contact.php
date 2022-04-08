<?php
require('data_provider.php');
class Contact extends DataProvider {
    public function addContact($id_user, $name, $phone, $email, $address){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "INSERT INTO contact (id_utilisateur, name, phone, email, address) VALUES (:id_user, :name, :phone, :email, :address)";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id_user" => $id_user,
            ":name" => $name,
            ":phone" => $phone,
            ":email" => $email,
            ":address" => $address
        ]);
        $smt = null;
        $db = null;
    }

    public function getContactsByUser($id_user){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "SELECT * FROM contact WHERE id_utilisateur = :id_user";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id_user" => $id_user
        ]);
        $data = $smt->fetchAll(PDO::FETCH_OBJ);
        $smt = null;
        $db = null;
        if(!$data){
            return "Data not found";
        }
        return $data;
    }

    public function getContact($id){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "SELECT * FROM contact WHERE id = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id" => $id
        ]);
        $data = $smt->fetch(PDO::FETCH_OBJ);
        $smt = null;
        $db = null;
        return $data;
    }

    public function updateContact($id, $name, $phone, $email, $address){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "UPDATE contact SET name = :name, phone = :phone, email = :email, address = :address WHERE id = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":name" => $name,
            ":phone" => $phone,
            ":email" => $email,
            ":address" => $address,
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }

    public function deleteContact($id){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "DELETE FROM contact WHERE id = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }
}