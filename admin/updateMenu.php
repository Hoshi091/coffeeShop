<?php require_once "adminMenu.php";

if ($_GET['id'] !== null){
    $menuItem = $db->getMenuItem($_GET['id']);
}


if (isset($_POST['submit'])) {
    $update = $db->updateMenuItem($_POST['id'], $_POST['name'], $_POST['url']);

    if ($update) {
        header("Location: menuActionsAdmin.php");
    } else {
        header("Location: menuActionsAdmin.php");
    }
}
?>
<div class="container">
    <h3>Edit menu item:</h3><br>
    <br><br>
    <form action="updateMenu.php" method="post">
        <input type="text" name="name" value="<?php echo $menuItem['page_name']; ?>" placeholder="Page name"><br>
        <input type="text" name="url" value="<?php echo $menuItem['page_url']; ?>" placeholder="Page url"><br>
        <input type="hidden" name="id" value="<?php echo $menuItem['id']; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</div>