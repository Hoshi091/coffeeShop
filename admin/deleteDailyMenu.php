<?php
require_once "adminMenu.php";


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $delete = $db->deleteDailyMenuItem($id);

    if($delete) {
        header("Location: dailyMenuAdmin.php");
    } else {
        header("Location: dailyMenuAdmin.php");
    }
} else {
    header("Location: dailyMenuAdmin.php");
}