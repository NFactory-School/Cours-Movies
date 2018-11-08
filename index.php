<?php include('inc/header.php');
?>

<div class="wrap">

<?php

  $sql = "SELECT genres FROM movies_full";
  $query = $pdo->prepare($sql);
  $query->execute();
  $genres = $query->fetchall(); 

  $tableau = array();

  foreach ($genres as $genre) {

    $g = $genre['genres'];
    $explodes = explode(',',$g);

    foreach ($explodes as $explode) {

      $ex = trim($explode);

      if(!in_array($ex,$tableau)) {

        if(!empty($ex)) {
          $tableau[] = $ex;
        }
      }
    }
  }

  /*

  $sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 8";
  $query = $pdo->prepare($sql);
  $query->execute();
  $movies = $query->fetchAll();

  foreach ($movies as $movie) {
  echo $movie["genres"];
  echo '<br/>';
  }

  foreach ($movies as $movie) {

  echo '<div class="film">'; 
  echo '<br/>';
    echo '<h2>'.$movie["title"].'</h2>';
      echo '<a href="detail.php?slug='.$movie["slug"].'">';
        echo '<img src="posters/'.$movie["id"].".jpg".'" alt="'.$movie["title"].'">';
      echo '</a>';
  echo '</div>';
}

echo '</div>';

echo '<br/>';
echo '<a class="more" href="index.php">Plus de film</a>';
*/
include('inc/footer.php');