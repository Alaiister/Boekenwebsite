<?php 
include 'app/templates/header.php';

$boeken_query = "SELECT * FROM boeken";
$boeken_result = mysqli_query($dbc, $boeken_query) or die ('BoekenShop -> Kan boeken niet ophalen');
if($boeken_result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($boeken_result)) {
        $id = $row['id'];
        $title = $row['title'];
        $image = $row['image'];
    }
}
?>

<div class="container my-4">



    <div class="row">
   
   <?php foreach($boeken_result as $boeken): ?>
  <div class="col-md-3 p-3">

    <a href="/boeken/real/book.php?id=<?= $boeken['id'] ?>">
    <img style="height: 300px;" src="<?= ($boeken['image']) ?>">
    <p><?= ($boeken['title']) ?></p>
    </a>
  </div>
   
   <?php endforeach; ?>

</div>
</div>
