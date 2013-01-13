<?php
/* Shopping cart page
 * 
 * Created:     1/12/13
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
protect_page();
?>

<!DOCTYPE html>
<html>
    <?php include 'includes/head.php'; ?>
    <body> 
        <div id="loginContent">
            <?php
            include 'includes/header.php';
            include 'includes/naviBar.php';
            ?>
            <br />
            <div>
                <div id="cartItem">
                    <?php cart(); ?>
                </div>           
            </div>
    </body>
</html>

<?php
// Add item to cart.php
if (isset($_GET['add'])) {
    // Not letting customers order more than actual quantity
    $inventory = $_GET['add'];
    $quantity = mysql_query("SELECT `inventoryno`, `quantity` FROM `inventory` NATURAL JOIN `dvd` WHERE `inventoryno` = '$inventory'");
    while ($quantity_row = mysql_fetch_assoc($quantity)) {
        if ($quantity_row['quantity'] != $_SESSION['cart_' . $_GET['add']]) {
            $_SESSION['cart_' . $_GET['add']]++;
        }
    }
    header('Location: cart.php');
}

// Remove item from cart.php
if (isset($_GET['remove'])) {
    $_SESSION['cart_' . $_GET['remove']]--;
    header('Location: cart.php');
}

// Delete item from cart.php
if (isset($_GET['delete'])) {
    $_SESSION['cart_' . $_GET['delete']] = '0';
    header('Location: cart.php');
}

function cart() {
    foreach ($_SESSION as $name => $value) {
        if ($value > 0) {
            if (substr($name, 0, 5) == 'cart_') {
                $id = substr($name, 5, (strlen($name) - 5));
                $get = mysql_query("SELECT `inventoryno`, `name`, `unitprice` FROM `inventory` NATURAL JOIN `dvd` WHERE `inventoryno` = '$id'");
                while ($get_row = mysql_fetch_assoc($get)) {
                    $subTotal = number_format($get_row['unitprice'] * $value, 2);
                    ?>
                    <style>
                        fieldset p {
                            text-align: right;
                            float: left;
                            padding-left: 45px;
                            padding-right: 45px;                          
                        }
                        
                        a:link {
                            text-decoration: none;
                        }

                        #total {
                            
                            text-align: center;
                            font-size: 20px;
                            margin-top: 20px;
                            background-color: #ADD9ED;
                            box-shadow: 1px 1px 7px black;
                            float:right;
                            padding: 30px;
                        }
                        
                        #paypal {
                            padding-top: 10px;
                        }
                    </style>
                    <fieldset>
                        <p>Item: <input id="item" type="text" name="item" value="<?php echo $get_row['name'] ?>"></p>
                        <p>Price: $<input id="subTotal" type="text" name="price" value="<?php echo number_format($get_row['unitprice'], 2) ?>"></p>
                        <p>Qty: <input id="qty" type="text" name="qty" value="<?php echo $value ?>"><?php echo '<a href="cart.php?remove=' . $id . '"> <img src="img/minus.png"> </a>' ?><?php echo '<a href="cart.php?add=' . $id . '"> <img src="img/plus.png"> </a>' ?><?php echo '<a href="cart.php?delete=' . $id . '"> <img src="img/remove.png"> </a> <br />' ?></p>                     
                        <p>Subtotal: $<input id="subTotal" type="text" name="subTotal" value="<?php echo $subTotal ?>"></p>
                    </fieldset>
                    <?php
                }
            }
            $total += $subTotal;
        }
    }
    if ($total == 0) {
        echo "Your cart is empty.";
    } else {
        ?>
        <div id="total">
            <div>
                <?php echo "Total amount: $" . number_format($total, 2); ?>
            </div>
            <div id="paypal">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="image_url" value="https://dl.dropbox.com/u/24897325/pflogo2.png">
                    <input type="hidden" name="business" value="wayne_fields@primalflix.com">
                    <?php paypal_items(); ?>
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="amount" value="<?php echo $total; ?>">
                    <input type="image" src="img/paypal.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
                </form> 
            </div>
        </div>
        <?php
    }
}

function paypal_items() {
    $num = 0;
    foreach ($_SESSION as $name => $value) {
        if ($value != 0) {
            if (substr($name, 0, 5) == 'cart_') {
                $id = substr($name, 5, (strlen($name) - 5));
                $get = mysql_query("SELECT `inventoryno`, `name`, `unitprice` FROM `inventory` NATURAL JOIN `dvd` WHERE `inventoryno` = '$id'");
                while ($get_row = mysql_fetch_assoc($get)) {
                    $num++;
                    echo '<input type="hidden" name="item_number_' . $num . '" value="' . $id . '">';
                    echo '<input type="hidden" name="item_name_' . $num . '" value="' . $get_row['name'] . '">';
                    echo '<input type="hidden" name="amount_' . $num . '" value="' . $get_row['unitprice'] . '">';
                    echo '<input type="hidden" name="quantity_' . $num . '" value="' . $value . '">';
                }
            }
        }
    }
}
?>

