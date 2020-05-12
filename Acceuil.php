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
        Message...
        <a href="#" class="badge badge-success">Voir panier</a>
   </div>

   <div class="row">
   <?php
        $sql = "SELECT * FROM `produit` ";
        $res=$conn->query($sql);
        $lst_produit = $res->fetch();
        //print_r($lst_produit);

   ?>


      <div class="c-goodsitem j-goodsli j-goodsli-588205 col-xlg-20per col-lg-3 col-sm-4 col-xs-6 j-expose__content-goodsls">
         <div class="card">
             <img
             title="Vans noir"
             alt="title"
             class="card-img-top"
             src="vansslipon.jpeg" width="250" height="338">
             <div class="card-body">
             <span>Vans noir</span>
                 <h4 class="card-title">70€</h4>
                 <p class="card-text">Homme</p>
                 <button class="btn btn-primary"
                 name="btnAccion"
                 value="ajouter"
                 type="submit">
                 Ajouter au panier</button>
             </div>
         </div>
      <br>
      </div>
      <div class="c-goodsitem j-goodsli j-goodsli-588205 col-xlg-20per col-lg-3 col-sm-4 col-xs-6 j-expose__content-goodsls">
           <div class="card">
               <img
               title="Vans bordeux"
               alt="title"
               class="card-img-top"
               src="vansold.jpeg" width="250" height="338">
               <div class="card-body">
               <span>vans bordeux</span>
                   <h4 class="card-title">79.99€</h4>
                   <p class="card-text">Homme</p>
                   <button class="btn btn-primary"
                   name="btnAccion"
                   value="ajouter"
                   type="submit">
                   Ajouter au panier</button>
               </div>
           </div>
      <br>
      </div>
      <div class="c-goodsitem j-goodsli j-goodsli-588205 col-xlg-20per col-lg-3 col-sm-4 col-xs-6 j-expose__content-goodsls">
          <div class="card">
              <img
              title="Nike blanche"
              alt="title"
              class="card-img-top"
              src="nikeblazer.jpeg" width="250" height="338">
              <div class="card-body">
              <span>Nike blanche</span>
                  <h4 class="card-title">56.79€</h4>
                  <p class="card-text">Homme</p>
                  <button class="btn btn-primary"
                  name="btnAccion"
                  value="ajouter"
                  type="submit">
                  Ajouter au panier</button>
              </div>
          </div>
      <br>
      </div>
      <div class="c-goodsitem j-goodsli j-goodsli-588205 col-xlg-20per col-lg-3 col-sm-4 col-xs-6 j-expose__content-goodsls">
          <div class="card">
              <img
              title="Nike air"
              alt="title"
              class="card-img-top"
              src="nikeair.jpeg" width="250" height="338">
              <div class="card-body">
              <span>Nike air</span>
                  <h4 class="card-title">50.31€</h4>
                  <p class="card-text">Femme</p>
                  <button class="btn btn-primary"
                  name="btnAccion"
                  value="ajouter"
                  type="submit">
                  Ajouter au panier</button>
              </div>
          </div>
      <br>
      </div>
      <div class="c-goodsitem j-goodsli j-goodsli-588205 col-xlg-20per col-lg-3 col-sm-4 col-xs-6 j-expose__content-goodsls">
           <div class="card">
               <img
               title="Nike"
               alt="title"
               class="card-img-top"
               src="nikeday.jpeg" width="250" height="338">
               <div class="card-body">
               <span>Nike</span>
                   <h4 class="card-title">70.00€</h4>
                   <p class="card-text">Femme</p>
                   <button class="btn btn-primary"
                   name="btnAccion"
                   value="ajouter"
                   type="submit">
                   Ajouter au panier</button>
               </div>
           </div>
      <br>
      </div>
      <div class="c-goodsitem j-goodsli j-goodsli-588205 col-xlg-20per col-lg-3 col-sm-4 col-xs-6 j-expose__content-goodsls">
           <div class="card">
               <img
               title="Converse"
               alt="title"
               class="card-img-top"
               src="converse.jpeg" width="250" height="338">
               <div class="card-body">
               <span>Converse</span>
                   <h4 class="card-title">60.00€</h4>
                   <p class="card-text">Femme</p>
                   <button class="btn btn-primary"
                   name="btnAccion"
                   value="ajouter"
                   type="submit">
                   Ajouter au panier</button>
               </div>
           </div>
       </div>

</div>




<!-- Nom et prénom des devs -->
<br><br>
<div id="IsaTim">
    <center>
        <h4>Site crée par:<br>
        Isabella Bacalao<br>
        Timothée Riou</h4>
    </center>
</div>

</body>

</html>