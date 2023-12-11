<?php require_once "adminMenu.php";


if (isset($_POST['submit'])) {
    $update = $db->insertDrinkMenuItem( $_POST['name'],$_POST['description'],$_POST['price'],$_POST['drink_category_id'],$_POST['url']);

    if ($update) {
        header("Location: drinkMenuAdmin.php");
    } else {
        header("Location: drinkMenuAdmin.php");
    }
}
?>
<div class="container" >
    <h3>Add drink:</h3><br>
    <br><br>
    <form action="insertDrinkMenu.php" method="post" style="display: flex; flex-direction: column">
        <label for="name">Name:</label>
        <input type="text" name="name" value=""><br>
        <label for="description">Description:</label>
        <textarea name="description"></textarea><br>
        <label for="price">Price:</label>
        <input type="text" name="price" value="" required><br>
        <label for="drink_category_id">Category:</label>
        <select name="drink_category_id" required>
            <?php
            $categories = $db->getCategories();
            foreach ($categories as $category) {

                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
            }
            ?>
        </select><br>
        <label for="url">Image link:</label>
        <textarea name="url"></textarea><br>
        <input type="submit" name="submit" value="Update">
    </form>
</div>