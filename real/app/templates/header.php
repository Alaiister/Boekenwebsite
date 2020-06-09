<?php
session_start();
include('config.php')

?>
<!doctype html>
<html lang="nl">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/62064d28a2.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="app/style/style.css">
<title>Pagina - BoekenShop</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <a class="p-0" href="/boeken/real/">
                    <h1 class="logo">BoekenShop</h1>
                </a>
                
                </div>
                <div class="col-md-6">
                
                <div class="navigation text-right">
                    <a href="#">Alle boeken</a>

                    <?php 
                    if (!empty($_SESSION['name'])):?>
                    <!-- Als je ingelogd bent -->
                    <a href="#">Mijn boeken</a>
                    <a href="#">Mijn account</a>
                    <a href="/boeken/real/logout.php">Uitloggen</a>
                    <?php else: ?>
                    <a href="/boeken/real/login.php">Inloggen</a>
                    <a href="/boeken/real/register.php">Registreren</a>
                <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
