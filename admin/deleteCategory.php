<?php

require_once "adminMenu.php";


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $delete = $db->deleteCategory($id);

    if($delete) {
        header("Location: categoryAdmin.php");
    } else {
        header("Location: categoryAdmin.php");
    }
} else {
    header("Location: categoryAdmin.php");
}