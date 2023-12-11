<?php require_once "adminMenu.php";

if ($_GET['id'] !== null) {
    $category = $db->getCategory($_GET['id']);
}

if (isset($_POST['submit'])) {
    $update = $db->updateCategory($_POST['id'], $_POST['name'], $_POST['description']);

    if ($update) {
        header("Location: categoryAdmin.php");
    } else {
        header("Location: categoryAdmin.php");
    }
}
?>
<div class="container">
    <h3>Edit a category:</h3><br>
    <br><br>
    <form action="updateCategory.php" method="post" style="display: flex; flex-direction: column">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $category['name']; ?>"><br>
        <label for="description">Description:</label>
        <textarea type="text" name="description" value="<?php echo $category['description']; ?>"><?php echo $category['description']; ?></textarea><br>
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</div>