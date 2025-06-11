<?php
require_once 'Cart.php';

$cart = new Cart();

// Add items to cart

echo   $cart->addItem('101', 'T-shirt', 299.99, 2) . " - added successfully"; 
echo "<br>";
echo  $cart->addItem('102', 'Shoes', 499.00, 1) .  " - added successfully";
echo "<br>";
echo  $cart->addItem('104', 'Trouser', 478.53, 4) .  " - added successfully";
echo "<br>";



// Update quantity
echo $cart->updateQuantity('101', 3);
echo "<br>";


// Trying to  remove item
echo $cart->removeItem('102');
echo "<br>";

echo $cart->removeItem('1023');
echo "<br>";



// Update to 0 (removes item)
echo $cart->updateQuantity('101', 0);
echo "<br>";


// (negative price)
echo $cart->addItem('103', 'Cap', -100, 2);
echo "<br>";

// view cart
print_r($cart->getItems());
echo "<br>";

// Show total
echo "Total Amount : ₹" . $cart->calculateTotal();
