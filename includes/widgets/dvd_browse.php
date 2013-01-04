<div>
    <?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'PrimalFlix';

    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $dbh->exec('SET NAMES "utf8"');

    $sql = "SELECT name, description, rating, image, inventoryno, unitprice FROM dvd NATURAL JOIN inventory";
    $data = $dbh->query($sql);
    foreach ($data as $row) {
        ?>
        <form action ="cart.php" method="GET">
            <div id="left">
                <ul>
                    <li><img src="<?php echo $row['image'] ?>"</li>    
                    <li><?php echo $row['name'] ?></li>
                    <li><?php echo $row['description'] ?></li>
                    <li>Rating: <?php echo $row['rating'] ?></li>
                </ul>
            </div>
            <div id="right">
                <ul>                    
                    <li>$<?php echo $row['unitprice'] ?></li>
                    <li><input type="image" value="submit" src="img/addcart.jpg"></li>
                    <li><input type="hidden" name="inventoryno" value="<?php echo $row['inventoryno'] ?>"></li>
                </ul>
            </div>
        </form>
    <?php } ?>
</div>
