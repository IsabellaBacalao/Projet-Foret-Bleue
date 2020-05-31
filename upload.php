<?php
include 'backend.php';



if(isset($_POST["submit"])){
    $b = getimagesize($_FILES["userImage"]["tmp_name"]);
    //Vérifiez si l'utilisateur à sélectionné une image
    if($b !== false){
        //Récupérer le contenu de l'image
        $file = $_FILES['userImage']['tmp_name'];
        $image = addslashes(file_get_contents($file));

        $host     = 'localhost';
        $username = 'root';
        $password = ' ';
        $db     = 'test';



        // Vérifier la connexion
        if($db->connect_error){
            die("Erreur de connexion: " . $db->connect_error);
        }

        //Insérer l'image dans la base de données
        $query = $db->query("INSERT into gallery (image) VALUES ('$image')");
        if($query){
            echo "Fichier uploadé avec succès.";
        }else{
            echo "Échec d'upload du fichier.";
        }
    }else{
        echo "Veuillez sélectionner une image à uploader.";
    }
}
?>