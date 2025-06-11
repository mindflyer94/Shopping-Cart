<?php
session_start();

class Cart
{
    protected $cartKey = 'shopping_cart';

    public function __construct()
    {
        if (!isset($_SESSION[$this->cartKey])) {
            $_SESSION[$this->cartKey] = [];
        }
    }

    public function addItem($id, $name, $price, $quantity = 1)
    {
        $id = htmlspecialchars(trim($id));
        $name = htmlspecialchars(trim($name));
        $price = filter_var($price, FILTER_VALIDATE_FLOAT);
        $quantity = filter_var($quantity, FILTER_VALIDATE_INT);

        if ($price === false || $price < 0 || $quantity === false || $quantity <= 0) {
            return "Please enter a valid price or quantity";
        }

        if (isset($_SESSION[$this->cartKey][$id])) {
            $_SESSION[$this->cartKey][$id]['quantity'] += $quantity;
        } else {
            $_SESSION[$this->cartKey][$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
            ];
        }

        return $name;
    }

    public function getItems()
    {
        return $_SESSION[$this->cartKey];
    }


    public function clearCart()
    {
        $_SESSION[$this->cartKey] = [];
        return true;
    }

    public function calculateTotal()
    {
        $total = 0.00;
        foreach ($_SESSION[$this->cartKey] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return number_format($total, 2, '.', '');
    }


    public function updateQuantity($id, $quantity)
    {
        $quantity = filter_var($quantity, FILTER_VALIDATE_INT);
        if (!isset($_SESSION[$this->cartKey][$id])) {
            return "Item not found in the cart";
        }

        if ($quantity === false || $quantity <= 0) {
            unset($_SESSION[$this->cartKey][$id]);
            return "Item removed due to zero or negative quantity";
        }
        $_SESSION[$this->cartKey][$id]['quantity'] = $quantity;
        return $_SESSION[$this->cartKey][$id]['name'] . " quantity Updated";
    }

    public function removeItem($id)
    {
        if (!isset($_SESSION[$this->cartKey][$id])) {
            return "Item not found in cart";
        }
        $itemName = $_SESSION[$this->cartKey][$id]['name'];
        unset($_SESSION[$this->cartKey][$id]);
        return  $itemName .  " is removed from your cart";
    }
}
