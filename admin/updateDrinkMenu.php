<?php require_once "adminMenu.php";

if ($_GET['id'] !== null){
    $drink = $db->getDrink($_GET['id']);
}


if (isset($_POST['submit'])) {
    $update = $db->updateDrinkMenuItem($_POST['id'], $_POST['name'],$_POST['description'],$_POST['price'],$_POST['drink_category_id'],$_POST['url']);

    if ($update) {
        header("Location: drinkMenuAdmin.php");
    } else {
        header("Location: drinkMenuAdmin.php");
    }
}
?>
<div class="container" >
    <h3>Edit drink:</h3><br>
    <br><br>
    <form action="updateDrinkMenu.php" method="post" style="display: flex; flex-direction: column">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $drink['name']; ?>"><br>
        <label for="description">Description:</label>
        <textarea name="description"><?php echo $drink['description']; ?></textarea><br>
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $drink['price']; ?>" required><br>
        <label for="drink_category_id">Category:</label>
        <select name="drink_category_id" required>
            <?php
            $categories = $db->getCategories();
            foreach ($categories as $category) {
                $selected = ($category['id'] == $drink['drink_category_id']) ? 'selected="selected"' : '';
                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
            }
            ?>
        </select><br>
        <label for="url">Image link:</label>
        <textarea name="url"><?php echo $drink['img_url']; ?></textarea><br>
        <input type="hidden" name="id" value="<?php echo $drink['id']; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
</div>