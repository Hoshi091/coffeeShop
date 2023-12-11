<?php require_once "adminMenu.php";
$dailyMenuItems = $db->getDailyMenu();

?>
<div class="container">
    <h3>Daily menu:</h3><br>
<?php
echo "<ol>";
foreach ($dailyMenuItems as $menuItem) {
    echo "<li>".$menuItem['menu_name']." 
    <a href='updateDailyMenu.php?id=".$menuItem['id']."'>Update</a>  
    <a href='deleteDailyMenu.php?id=".$menuItem['id']."' onclick='return confirmDelete()'>Delete</a>
    </li>";
}
echo "</ul>";

echo "<a href='insertDailyMenu.php'>Add new</a>"

?>
</div>
