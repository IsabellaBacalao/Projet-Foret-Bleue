<?php

//Mes fonctions


function creationPanier(){

    if(!isset($_SESSION['panier'])){

		$_SESSION['panier'] = array();
		$_SESSION['panier']['libelleProduit'] = array();
		$_SESSION['panier']['quantité'] = array();
		$_SESSION['panier']['prix'] = array();
		$_SESSION['panier']['verrou'] = false;

	}
	return true;
}

 // la fonction d'ajout de produit au panier
function ajouterProduit($libelleProduit, $quantité, $prix){
    // Verification de l'existence du panie
	if(creationPanier() && !isVerrouille()){

        //Si le produit existe déjà on ajoute seulement la quantité
		$positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
		if($positionProduit !== false){

			$_SESSION['panier']['quantité'][$positionProduit] += $quantité;
		}
		else{
            //Sinon on ajoute le produit
			array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
			array_push( $_SESSION['panier']['quantité'],$quantité);
			array_push( $_SESSION['panier']['prix'],$prix);
		}
	}
	else{
		// c'estle message qui s'affiche
		echo 'Erreur!! Veuillez contacter l\'administrateur ajouterProduit';
	}
}


function modifierQteProduit($libelleProduit, $quantité){

   if(creationPanier() && !isVerrouille()){

   	if($quantité > 0)
   	{
   		$positionProduit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

   		if($positionProduit !== false)
   		{
   		 	$_SESSION['panier']['quantité'][$positionProduit]= $quantité;
   		}
   	}
   	else
   	supprimerProduit($libelleProduit);

   }
   else
   echo 'Erreur!! Veuillez contacter l\'administrateur modifier produit';
}


function supprimerProduit($libelleProduit){

 	if(creationPanier() && !isVerrouille()){

 		$tmp =array();
 		$tmp['libelleProduit'] = array();
 		$tmp['quantité'] = array();
 		$tmp['prix'] = array();
 		$tmp['verrou'] = $_SESSION['panier']['verrou'];


 		for($i= 0; $i < count($_SESSION['panier']['libelleProduit']); $i++){

 			if($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit){

 			array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
 			array_push( $tmp['quantité'], $_SESSION['panier']['quantité'][$i]);
 			array_push( $tmp['prix'], $_SESSION['panier']['prix'][$i]);
 			}
 		}

 		$_SESSION['panier'] = $tmp;
 		unset($tmp);
 	}
 	else
 	echo 'Erreur!! Veuillez contacter l\'administrateur sup';
}

function montantGlobal(){
 	$total = 0;
 	for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++){
 		$total = $_SESSION['panier']['quantité'][$i] * $_SESSION['panier']['prix'][$i];
 	}
 	return $total;
}


function supprimerPanier(){
 	unset($_SESSION['panier']);
 }

function isVerrouille(){
 	if(isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
    return true;
 	else
    return false;
}

function compterProduit(){
    if(isset($_SESSION['panier']))
 	return count ($_SESSION['panier']['libelleProduit']);
 	else
 	return 0;
}

?>



