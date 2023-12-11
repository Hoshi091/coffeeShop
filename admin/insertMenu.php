<?php require_once "adminMenu.php";

if(isset($_POST['submit'])) {
    $insert = $db->insertMenuRecord($_POST['name'], $_POST['url']);

    if($insert) {
        header("Location: menuActionsAdmin.php");
        exit();
    } else {
        $errorMessage = "Failed to insert menu record.";
    }
}

?>
<div class="container">
    <h3>Add a new menu item:</h3><br>
    <form action="insertMenu.php" method="post">
        <input type="text" name="name" value="" placeholder="Page name"><br>
        <input type="text" name="url" value="" placeholder="Page url"><br>
        <input type="submit" name="submit" value="Insert">
    </form>
</div>