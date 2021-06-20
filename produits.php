<?php require_once("connection.php")?>
<?php

if (isset($_GET['categor'])){
$idCat=$_GET['categor'];
$sql="SELECT * FROM produit WHERE sku IN (SELECT sku FROM prod_cat WHERE id=$idCat)";
}
else{
$sql="SELECT * FROM produit";
}

$stmt = $pdo->query($sql);
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Liste des produits</h1>

<?php foreach ($produits as $produit) : ?>

<div class="produit">
   <table>
      <tr>
        <td>Ref : </td>
        <td><?=$produit["sku"]?></td>
        <td rowspan="3">
        <img src="<?=$produit["image"];?>" style='height:100px';>
        </td>
      </tr>
      <tr>
          <td>Designation:</td>
          <td><?=$produit["name"]?></td>
      </tr>
      <tr>
          <td>Prix : </td>
          <td><?=$produit["price"]?></td>
      </tr>
      <tr>
          <td colspan="3">
              <form action="ajouterPanier.php" method="POST">
              <input type="hidden" name="ref" value="<?=$produit["sku"]?>">
              <input type="hidden" name="designation" value="<?=$produit["name"]?>">
              <input type="hidden" name="prix" value="<?=$produit["price"]?>">             
              <input type="text" name="quantite" value="1">
              <button>Ajouter</button>
              </form>
          </td>
      </tr>
    </table>
</div>
   
<?php endforeach ?>
<br style="clear:both">