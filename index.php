<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de e-commerce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bienvenue sur notre site</h1>
    <h2><a href="index.php?panier=1">Panier</a></h2>
<table>
         <tr>
           <td width="20%" valign="top">
             <div id="categorie"> <?php require('./categorie.php');?></div>
           </td>
           <td width="80%" valign="top">
             <div id="contenu">
             <?php 
             if(isset($_GET['panier']))
             { require('./panier.php');}
             else {
             require('./produits.php');}
             ?>
             </div>
           </td>
         
</body>
</html>








