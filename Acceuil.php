<?php

include 'config.php';
include 'backend.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACCUEIL </title>

    <link rel="stylesheet" href="BS341/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mr+Dafoe"/>
    <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Julius Sans One' rel='stylesheet'>

</head>
<body>

<!-- Bandeau jaune ou il y a le nom du site, la navbar et les icons -->
<div id="bandeau">
    <center>
        <h2>Boutique en ligne</h2>
        <h1>
           <a href="Acceuil.php">Forêt Bleue</a>
        </h1>

        <div id="icon">

            <a href="Compte.php">
                <img src="user.png" alt="Compte" style="width:20px;height:20px;border:0">
            </a>
            <a href="Panier.php">
                <img src="panier.png" alt="Panier" style="width:20px;height:20px;border:0">
            </a>
            <a href="admin.php">
                <img src="admin.png" alt="Admin" style="width:20px;height:20px;border:0">
            </a>
        </div>


    </center>
</div>


<div class = "container">

  <br>
   <div class = "alert alert-success">
        <a href="#" class="badge badge-success">Voir panier</a>
   </div>

   <div class="row">
   <?php
        $sql = "SELECT * FROM `produit` ";
        $res=$conn->query($sql);
        $lst_produit = $res->fetch();
        //print_r($lst_produit);

while($row = $res->fetch()) { ?>


<center>
      <div class="col-sm-6 col-md-4">
         <div class="thumbnail">
             <img
             title=<?php echo $row["nom_produit"];?>
             alt=<?php echo $row["nom_produit"];?>
             class="card-img-top"
             src=<?php echo $row["image"];?> width="250" height="338">
             <div class="card-body">
             <span> <?php echo $row["nom_produit"];?> </span>
                 <h4 class="card-title"><?php echo $row["prix"];?>€</h4>
                 <input id="code_produit" name="code_produit"
                 type="hidden" value=<?php echo $row["code_produit"];?>
                 <p class="card-text">Taille <?php echo $row["taille"];?></p>
                 <form method="post" action="Panier.php">
                    <button class="btn btn-success"
                    name="accion"
                    value="ajouterProduit"
                    type="submit">
                    Ajouter au panier</button>
                </form>
             </div>
         </div>
      </div>
      </center>
<?php } ?>
    </div>
</div>


<?php include 'footer.php';?>

