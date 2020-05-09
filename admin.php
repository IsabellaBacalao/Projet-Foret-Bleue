<?php
include 'backend.php';

//Nouveau enregistrement

if($action == "NEW"){
    $code_produit = $_POST["Code"];
    $nom_produit = $_POST["Nom"];
    $prix = $_POST["Prix"];
    $taille = $_POST["Taille"];
    $quantité = $_POST["Quantité"];

    if($code_produit == ""){
        $sql = "INSERT INTO produit  VALUES (NULL, '$nom_produit', '$prix', '$taille', '$quantité')";
        $conn->query($sql);
    }else{
        $sql = "update produit set Nom = '$nom_produit',
                                  Prix = '$prix',
                                  Taille = '$taille'
                                  Quantité = '$quantité'
                                  WHERE Code = '$code_produit' ";
        $conn->query($sql);
        $code_produit = "";
        $nom_produit = "";
        $prix = "";
        $taille = "";
        $quantité = "";

    }
}

// SUPPRIMER

if($action == "DEL"){
    $code_produit = $_POST["code_produit"];
    $sql = "delete FROM produit where code_produit = '$code_produit' ";
    $conn->query($sql);

    $code_produit = "";
    $nom_produit = "";
    $prix = "";
    $taille = "";
    $quantité = "";
}

// MODIFIER
if($action == "UPD"){
    $code_produit = $_POST["code_produit"];
    $sql = "select * from produit WHERE code_produit = '$code_produit' ";
    $res = $conn->query($sql);
    $lst_produit = $res->fetch();

    $code_produit = $lst_produit["code_produit"];
    $nom_produit = $lst_produit["nom_produit"];
    $prix = $lst_produit["prix"];
    $taille = $lst_produit["taille"];
    $quantité = $lst_produit["quantité"];
}


// LECTURE DES DONNÉES

$sql = "select * from produit";
$res = $conn->query($sql);
$lst_produit = $res->fetchALL();

?>

<!DOCTYPE html>
<head>
<html lang="fr">
   <link rel="stylesheet" href="BS341/css/bootstrap.min.css">
    <title>ADMINISTRATEUR</title>
</head>
<body>
<center>
<h1> Gestion des produits </h1>

<div class= "container">
<h2> Produits </h2>
<table class="table table-striped">
    <tr>
    <th>Code </th>
    <th>Produit </th>
    <th>Prix </th>
    <th>Taille </th>
    <th>Quantité </th>
    <th></th>
    <th></th>
    </tr>

    <tr>
		<form action="admin.php" method="post">
		<input type="hidden"   name="action" value="NEW">
		<input type="hidden" name="Code" id="code_produit" value="<?php echo $code_produit; ?>"></th>
		<th></th>
		<th><input type="text" name="Nom" id="nom_produit" value="<?php echo $nom_produit; ?>"></th>
		<th><input type="text" name="Prix" id="prix" value="<?php echo $prix; ?>"></th>
		<th><input type="text" name="Taille" id="taille" value="<?php echo $taille; ?>"></th>
		<th><input type="text" name="Quantité" id="quantité" value="<?php echo $quantité; ?>"></th>
        <th><input type="submit" value="OK"></th>
		<th></th>
		</form>
	</tr>

    <?php
        	foreach ($lst_produit as $row){
        	   echo "<tr>";
            	   echo "<td>" . $row["code_produit"]       ."</td>";
            	   echo "<td>" . $row["nom_produit"]       ."</td>";
                   echo "<td>" . $row["prix"]    ."</td>";
                   echo "<td>" . $row["taille"]    ."</td>";
                   echo "<td>" . $row["quantité"]    ."</td>";
            ?>

    	   <th>
    	   		<form action="admin.php" method="post">
    	   			<input type="hidden"   name="action" value="UPD">
    	   			<input type="hidden"   name="code_produit" value="<?php echo $row["code_produit"] ;?>">
    	   			<input type="submit" value="M">
    	 		</form>
    	   </th>
    	   <th>
    	   		<form action="admin.php" method="post">
    	   			<input type="hidden"   name="action" value="DEL">
    	   			<input type="hidden"   name="code_produit" value="<?php echo $row["code_produit"] ;?>">
    	   			<input type="submit" value="S">
    	   		</form>
    	   </th>

    	   <?php
	   echo "</tr>";
    }
    ?>

</table>

</div>
</center>
</body>
</html>


