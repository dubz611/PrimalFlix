<div>
    <?php

    $sql = "SELECT `name`, `description`, `rating`, `image`, `inventoryno`, `unitprice`, `sku` FROM `dvd` NATURAL JOIN `inventory` ORDER BY `name`";
    $data = $dbh->query($sql);
    foreach ($data as $row) {
        ?>
        <form action ="cart.php" method="POST">
            <div id="browseLeft">
                <ul>
                    <li><img src="<?php echo $row['image'] ?>"</li>    
                    <li id="title"><?php echo $row['name'] ?></li>
                    <li><?php echo $row['description'] ?></li>
                    <li>Rating: <?php echo $row['rating'] ?></li>
                </ul>
            </div>
            <div id="browseRight">
                <ul>
                    <li id="unitprice">$<?php echo $row['unitprice'] ?></li>
                    <li>SKU: <?php echo $row['sku'] ?></li>
                    <li><input type="image" value="submit" src="img/addcart.jpg"></li>
                    <li><input type="hidden" name="inventoryno" value="<?php echo $row['inventoryno'] ?>"></li>
                </ul>
            </div> 
        </form>
    <?php } ?>
</div>
