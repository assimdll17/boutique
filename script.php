<?php
require("connection.php");

$products_json = file_get_contents("./products.json");
$products_data = json_decode($products_json, true);

$nbre_products  = 100;
$categories = []; 
foreach ($products_data as  $product){
    if($nbre_products == 0) break;
    
    $insert_products = $pdo_conn->prepare("INSERT INTO 
    `produit`(`SKU`, `NAME`, `PRICE`, `DESCRIPTION`,`IMAGE`)
     VALUES (?,?,?,?,?)");

    $insert_products->execute([$product['sku'],$product['name'],$product['price'],$product['description'],$product['image']]);

    $product_categories = $product['category'];
    foreach ($product_categories as $category){

        if(!in_array($category['id'], $categories)){
            $insert_categ = $pdo_conn->prepare("INSERT INTO `category`(`ID`, `NAME`) VALUES (?,?)");
            $insert_categ->execute([$category['id'], $category['name']]);
            array_push($categories, $category['id']);
        }

        $insert_poduct_categ = $pdo_conn->prepare("INSERT INTO `prod_cat`(`SKU`, `ID`) VALUES (?,?)");
        $insert_poduct_categ->execute([$product['sku'], $category['id']]);
    }

    $nbre_products --;
}
