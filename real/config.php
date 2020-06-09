<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'boeken';

$dbc = mysqli_connect($host, $username, $password, $database) or die('BoekenShop -> Kan niet verbinden met de database.');