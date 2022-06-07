<?php
$conn = mysqli_connect('localhost' 'root', '', 'shopping-cart');

if(!$conn) {
    die ("koneksi gagal. " . mysqli_connect_error()); //close koneksi
}