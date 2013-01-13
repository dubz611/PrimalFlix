<?php
/* Shopping cart page
 * 
 * Created:     1/12/13
 * Author:      Wayne Fields
 * 
 */

include 'core/init.php';
protect_page();

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

function paypal_items() {
   $num = 0;
   foreach($_SESSION as $name => $value) {
       if ($value != 0) {
           if (substr($name, 0 , 5) == 'cart_') {
               $id = substr($name, 5, (strlen($name) - 5));
               $get = mysql_query("SELECT `inventoryno`, `name`, `unitprice` FROM `inventory` NATURAL JOIN `dvd` WHERE `inventoryno` = '$id'");
               while ($get_row = mysql_fetch_assoc($get)) {
                   $num++;
                   echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'">';
                   echo '<input type="hidden" name="item_name_'.$num.'" value="'.$get_row['name'].'">';
                   echo '<input type="hidden" name="amount_'.$num.'" value="'.$get_row['unitprice'].'">';
                   echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
               }
           }
       }
   }
}

function cart() {
    foreach ($_SESSION as $name => $value) {
        if ($value > 0) {
            if (substr($name, 0, 5) == 'cart_') {
                $id = substr($name, 5, (strlen($name) - 5));
                $get = mysql_query("SELECT `inventoryno`, `name`, `unitprice` FROM `inventory` NATURAL JOIN `dvd` WHERE `inventoryno` = '$id'");
                while ($get_row = mysql_fetch_assoc($get)) {
                    $subTotal = number_format($get_row['unitprice'] * $value, 2);
                    echo $get_row['name'] . ' x ' . $value . ' @ ' . number_format($get_row['unitprice'], 2) . ' = ' . $subTotal .
                    ' <a href="cart.php?remove=' . $id . '">[-]</a> <a href="cart.php?add=' . $id . '">[+]</a> <a href="cart.php?delete=' . $id . '">[Delete]</a> <br />';
                }
            }
            $total += $subTotal;
        }
    }
    if ($total == 0) {
        echo "Your cart is empty.";
    } else {
        echo "Total amount: $" . number_format($total, 2) . "<br />";
        ?>
        <p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="image_url" value="https://dl.dropbox.com/u/24897325/pflogo2.png">
            <input type="hidden" name="business" value="wayne_fields@primalflix.com">
            <?php paypal_items();?>
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">
            <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but03.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
        </form> 
        </p>
        <?php
    }
}

cart();
?>
