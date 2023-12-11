<?php

require_once "adminMenu.php";


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $delete = $db->deleteDrinkMenuItem($id);

    if ($delete) {
        header("Location: drinkMenuAdmin.php");
    } else {
        header("Location: drinkMenuAdmin.php");
    }
} else {
    header("Location: drinkMenuAdmin.php");
}