<?php
session_start();
if(isset($_SESSION['panier'])) {
    $panier = $_SESSION['panier'];
} else {
    $panier = array();
}

$index = count($panier);
$panier[$index]['ref']=$_POST['ref'];
$panier[$index]['prix']=$_POST['prix'];
$panier[$index]['designation']=$_POST['designation'];
$panier[$index]['quantite']=$_POST['quantite'];
$_SESSION['panier'] = $panier;
header("location:index.php?panier=1")
?>