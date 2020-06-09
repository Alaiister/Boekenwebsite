<?php
include_once('app/templates/header.php');
$id = mysqli_real_escape_string($dbc, $_GET['id']);
$query = 'SELECT title, image, description, writer, publisher, price FROM boeken WHERE `id` = '.$id.' LIMIT 1';
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$points_query = 'SELECT punten FROM accounts';
$points_result = mysqli_query($dbc, $points_query);
$points = mysqli_fetch_assoc($points_result);
$points_digit = implode("|",$points);
?>

<div class="container">
<a class="btn btn-blue" href="/boeken/real/"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
<h1 class="book-title"><?= $row['title'] ?></h1>
<div class="row my-4">
    <div class="col-md-6">
        <img class="book-page-img" src="<?= $row['image'] ?>">
    </div>
    <div class="col-md-6">
        <div class="card p-4">
        <p><strong>Auteur:</strong> <?= $row['writer'] ?></p>
        <p><strong>Uitgever:</strong> <?= $row['publisher'] ?></p>
        <p><strong>Prijs: </strong> <?= $row['price'] ?> punten (uw saldo: <?= $points_digit ?> punten)</p>
        <a href="#" class="btn btn-blue">Kopen</a>
        </div> 
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card p-4">
            <strong>Beschrijving:</strong>
            <p><?= $row['description'] ?></p>
         
        </div>
    </div>
</div>

</div>