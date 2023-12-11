<?php require_once "adminMenu.php";
$drinks = $db->getDrinks();
?>
<div class="container">
    <h3>Edit popular drinks (select 3):</h3><br>
    <form action="updatePopularItems.php" id="popularItemsForm" method="post">
    <?php
    foreach ($drinks as $drink){
        $isChecked = $db->isPopularItem($drink['id']);
        echo '<input type="checkbox" name="selectedItems[]" value="' . $drink['id'] . '" ' . ($isChecked ? 'checked' : '') . ' style="display: inline-block;">';
        echo '<p style="display: inline-block">' . $drink['name'] . '</p>';
        echo '<br>';

    }
    ?>
    <input type="submit" name="submit" value="Update the popular items">
    </form>
</div>
<script>
    document.getElementById('popularItemsForm').addEventListener('submit', function (event) {
        var checkboxes = document.querySelectorAll('input[name="selectedItems[]"]:checked');

        if (checkboxes.length != 3) {
            alert('Please select 3 items');
            event.preventDefault();
        }
    });
</script>