<?php
if(!(isset($_SESSION['panier']))){
$panier=array();
}
else{
$panier=$_SESSION['panier'];
}
?>

<table cellpadding="10">>
    <tr>
        <th>Ref</th><th>Designation</th><th>Prix</th><th>Quantite</th>
    </tr>
    <?php
    $total=0;
    for($i=0;$i<count($panier);$i++) {
        $total=$total+$panier[$i]['prix'] * $panier[$i]['quantite'];
    ?>
    <tr>
            <td><?= $panier[$i]['ref'] ?></td>
            <td><?= $panier[$i]['designation']?></td>
            <td><?= $panier[$i]['prix'] ?></td>
            <td><?= $panier[$i]['quantite'] ?></td>
            <td><a href="RetirerDuPanier.php?index=<?=$i?>">Retirer</a></td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="3">Total</td>
        <td><?=$total?></td>
    </tr>
</table>