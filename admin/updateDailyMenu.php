<?php require_once "adminMenu.php";

if ($_GET['id'] !== null){
    $menuItem = $db->getDailyMenuItem($_GET['id']);
}


if (isset($_POST['submit'])) {
    $update = $db->updateDailyMenuItem($_POST['id'], $_POST['name']);

    if ($update) {
        header("Location: dailyMenuAdmin.php");
    } else {
        header("Location: dailyMenuAdmin.php");
    }
}
?>
<div class="container">
    <h3>Edit daily menu item:</h3><br>
    <br><br>
    <form action="updateDailyMenu.php" method="post">
        <textarea type="text" name="name" value="<?php echo $menuItem['menu_name']; ?>"><?php echo $menuItem['menu_name'] ?></textarea><br>
        <input type="hidden" name="id" value="<?php echo $menuItem['id']; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</div>