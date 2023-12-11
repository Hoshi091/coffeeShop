<?php
include_once "lib/DB.php";

use PO\Lib\DB;
$db = new DB("localhost", 3306, "root", "", "coffeeshop_db");

?>
<div class="tm-top-header">
      <div class="container">
        <div class="row">
          <div class="tm-top-header-inner">
            <div class="tm-logo-container">
              <img src="img/logo.png" alt="Logo" class="tm-site-logo">
              <h1 class="tm-site-name tm-handwriting-font">Cafe House</h1>
            </div>
            <div class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
            </div>
            <nav class="tm-nav">
                <ul class="main-menu" id="main-menu container">
                    <?php
                    $menu = $db->getMenuItems();
                    foreach ($menu as $menuName => $menuUrl) {
                        echo '<li><a href="'.$menuUrl.'">'.$menuName.'</a></li>';
                    }
                    ?>
                    <li><a href="./admin/login.php">Login</a></li>
                </ul>

            </nav>
          </div>
        </div>
      </div>
    </div>
