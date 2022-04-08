<?php
    require('../database/models/contact.php');
    $item = new Contact();
    $item->deleteContact($_GET['id_contact']);
    header("Location: contacts.php");
?>