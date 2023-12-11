<?php

include_once "DB.php";

use PO\Lib\DB;
$db = new DB("localhost", 3306, "root", "", "coffeeshop_db");

if (isset($_GET['category_id'])) {
    $drinks = $db->filterDrinksByCategory($_GET['category_id']);

    foreach ($drinks as $drink) {
      echo'<div class="tm-product">';
      echo'          <img src="' . $drink['img_url'] . '" alt="Product">';
      echo'          <div class="tm-product-text">';
      echo'            <h3 class="tm-product-title">' . $drink['name'] . '</h3>';
      echo'            <p class="tm-product-description">' . $drink['description'] . '</p>';
      echo'          </div>';
      echo'          <div class="tm-product-price">';
      echo'            <a href="#" class="tm-product-price-link tm-handwriting-font"><span class="tm-product-price-currency">$</span>' . $drink['price'] . '</a>';
      echo'          </div>';
      echo'        </div>';
    }
} else {
    echo 'Invalid category ID';
}