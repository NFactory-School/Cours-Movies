<?php include('inc/header.php');

  $sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 20";
  $query = $pdo->prepare($sql);
  $query->execute();
  $movies = $query->fetchAll();?>

<div class="wrap">

<?php foreach ($movies as $movie) {

  echo '<div class="film">'; 
  echo '<br/>';
    echo '<h2>'.$movie["title"].'</h2>';
      echo '<a href="detail.php?slug='.$movie["slug"].'">';
        echo '<img src="posters/'.$movie["id"].".jpg".'" alt="'.$movie["title"].'">';
      echo '</a>';
  echo '</div>';
} ?>

</div>

<a class="more" href="index.php">Plus de film</a>

<?php include('inc/footer.php'); ?>