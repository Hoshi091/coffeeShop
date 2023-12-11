<?php require_once "adminMenu.php";


if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $delete = $db->deleteMenuItem($id);

    if($delete) {
        header("Location: menuActionsAdmin.php");
    } else {
        header("Location: menuActionsAdmin.php");
    }
} else {
    header("Location: categoryAdmin.php");
}