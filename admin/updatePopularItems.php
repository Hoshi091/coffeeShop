<?php
require_once "adminMenu.php";

if (isset($_POST['submit'])) {
    if (isset($_POST['selectedItems']) && is_array($_POST['selectedItems'])) {
        $update=$db->updatePopularItems($_POST['selectedItems']);
        if ($update) {
            header("Location: popularItemsAdmin.php");
        } else {
            header("Location: popularItemsAdmin.php");
        }
    }
}