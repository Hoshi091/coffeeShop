<div class="col-lg-12 tm-popular-items-container">
<?php
$popularItems = $db->getPopularItems();
foreach ($popularItems as $item) {
    ?>
    <div class="tm-popular-item">
        <img src=<?php echo ($item['img']) ?> alt="Popular" class="tm-popular-item-img">
        <div class="tm-popular-item-description">
            <h3 class="tm-handwriting-font tm-popular-item-title"><?php echo ($item['name']) ?></h3><hr class="tm-popular-item-hr">
            <p><?php echo ($item['description']) ?></p>

        </div>
        <div class="order-now-container">
            <a href="#" class="order-now-link tm-handwriting-font">Order Now</a>
        </div>
    </div>


    <?php
}
?>
</div>