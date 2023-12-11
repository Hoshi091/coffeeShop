<?php
require_once "adminMenu.php";
if(isset($_POST['submit'])) {
    $insert = $db->insertDailyMenuItem($_POST['name']);

    if($insert) {
        header("Location: dailyMenuAdmin.php");
        exit();
    } else {
        $errorMessage = "Failed to insert menu record.";
    }
}

?>
<div class="container">
    <h3>Add a new daily menu item:</h3><br>
    <form action="insertDailyMenu.php" method="post">
        <textarea type="text" name="name" value="" placeholder="Menu item text"></textarea><br>
        <input type="submit" name="submit" value="Insert">
    </form>
</div>