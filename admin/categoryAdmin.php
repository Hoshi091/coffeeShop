<?php require_once "adminMenu.php";
$categories = $db->getCategories();
?><div class="container">
    <h3>Categories:</h3><br>
<?php
echo "<ul>";
foreach ($categories as $category) {
    echo "<li>".$category['name']." 
    <a href='updateCategory.php?id=".$category['id']."'>Update</a>  
    <a href='deleteCategory.php?id=".$category['id']."' onclick='return confirmDelete()'>Delete</a>
    </li>";
}
echo "</ul>";

echo "<a href='insertCategory.php'>Add new</a>"
?>
</div>
