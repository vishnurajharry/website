<?php
session_start();
foreach($_SESSION['food'] as $product){ 
$id = $_GET["id"];
echo '$_SESSION['food'][$id]';
}
?>
