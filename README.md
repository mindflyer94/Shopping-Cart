
# Simple PHP Shopping Cart

This is a basic PHP shopping cart implementation using native sessions — no database required.


# Project Structure

e-cart/
├── Cart.php        
└── index.php  

###### -----------------How to Run -----------------  ######

1. Make sure you have a local PHP server running (e.g., XAMPP, MAMP, WAMP, or Apache).
2. Place the `e-cart/` folder in your server’s web root:
   - For XAMPP: `C:\xampp\htdocs\e-cart`
   - For MAMP: `/Applications/MAMP/htdocs/e-cart`
3. Start the server and open the following URL in your browser:


http://localhost:8888/e-cart/

> Replace `8888` with your actual port if different.

# Features

- Add items to the cart
- Update quantity of items
- Remove items from the cart
- Calculate total price of the cart
- Input validation (only positive numbers allowed)
- Graceful error handling for edge cases


# Testing

- `index.php` includes test cases for:
  - Adding items
  - Updating quantities
  - Removing items
  - Invalid values
  - Empty cart and total

You can edit `index.php` to add more test scenarios as needed.

# Notes
- No external dependencies
- Tested on PHP 7.4+ and 8.x
