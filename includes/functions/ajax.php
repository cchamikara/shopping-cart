<?php
/**
 * Created by PhpStorm.
 * User: Chamal
 * Date: 1/13/16
 * Time: 10:23 PM
 */
session_start();

$_id = $_GET['id'];
$_qty = $_GET['qty'];


if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if(isset($_SESSION['cart'][$_id])) {
    $_SESSION['cart'][$_id] += $_qty;
    echo 'product quantity updated successfully';
} else {
    $_SESSION['cart'][$_id] = $_qty;
    echo 'new product added to the cart successfully';
}

