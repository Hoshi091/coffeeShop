<?php require_once "adminMenu.php";
$drinks = $db->getDrinks();

?>
<div class="container">
    <h3>Drinks:</h3><br>
    <?php
    echo "<ol>";
    foreach ($drinks as $drink) {
        echo "<li>".$drink['name'];
        echo "[$" . $drink['price'] . "]" . "
    <a href='updateDrinkMenu.php?id=".$drink['id']."'>Update</a>  
    <a href='deleteDrinkMenu.php?id=".$drink['id']."' onclick='return confirmDelete()'>Delete</a>
    </li>";
    }
    echo "</ul>";

    echo "<a href='insertDrinkMenu.php'>Add new</a>"

    ?>
</div>
