<?php
require_once "adminMenu.php";

if(isset($_POST['submit'])) {
    $insert = $db->insertCategory($_POST['name'], $_POST['description']);

    if($insert) {
        header("Location: categoryAdmin.php");
        exit();
    } else {
        $errorMessage = "Failed to insert menu record.";
    }
}

?>
<div class="container">
    <h3>Add a new category:</h3><br>
    <form action="insertCategory.php" method="post">
        <input type="text" name="name" value="" placeholder="Category name"><br>
        <textarea type="text" name="description" value="" placeholder="Category description"></textarea><br>
        <input type="submit" name="submit" value="Insert">
    </form>
</div>
