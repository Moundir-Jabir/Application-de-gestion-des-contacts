<?php
    $oldName = "";
    $oldPhone = "";
    $oldEmail = "";
    $oldAdrress = "";
    session_start();
    require('../../session/library.php');
    require('../database/models/contact.php');
    $item = new Contact();
    $contacts = $item->getContactsByUser($_SESSION['user']->id);
    redirection_login();
    $id_contact = $_GET['id_contact'] ?? "";
    if($id_contact != ""){
        $updateContact = $item->getContact($id_contact);
        $oldName = $updateContact->name;
        $oldPhone = $updateContact->phone;
        $oldEmail = $updateContact->email;
        $oldAdrress = $updateContact->address;
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        if($id_contact == ""){
            $item->addContact($_SESSION['user']->id, $name, $phone, $email, $address);
        }else{
            $item->updateContact($id_contact, $name, $phone, $email, $address);
        }
        header("Location: contacts.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Contacts</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container top">
        <h1>Contacts</h1> <br>
        <h2>Contacts list:</h2> <hr>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <?php if($contacts == "Data not found"){ ?>
                        No contacts.
                    <?php }else{
                        foreach ($contacts as $contact) { ?>
                            <tr>
                                <td><?php echo $contact->name; ?></td>
                                <td><?php echo $contact->email; ?></td>
                                <td><?php echo $contact->phone; ?></td>
                                <td><?php echo $contact->address; ?></td>
                                <td><a href="contacts.php?id_contact=<?php echo $contact->id; ?>">Edit</a> <br> <a href="delete_contacts.php?id_contact=<?php echo $contact->id; ?>">Delete</a></td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
            </table>
        </div> <br>
        <h2>Add contact:</h2> <br>
        <form action="contacts.php<?php if($id_contact != ""){echo "?id_contact=$id_contact";} ?>" method="POST">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $oldName; ?>">
                    <div id="error1" class="invalid-feedback"></div>
                </div>
                <div class="col">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?php echo $oldPhone; ?>">
                    <div id="error2" class="invalid-feedback"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $oldEmail; ?>">
                <div id="error3" class="invalid-feedback"></div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" rows="2" placeholder="Enter address" name="address"><?php echo $oldAdrress; ?></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
    <script src="../js/contacts.js"></script>
</body>
</html>