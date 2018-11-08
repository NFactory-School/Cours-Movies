<?php include('inc/header.php');

  $sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 20";
  $query = $pdo->prepare($sql);
  $query->execute();
  $movies = $query->fetchAll();?>

<div class="wrap">

<form>
  <input type="checkbox" name="all" selected value="">Action<br>
  <input type="checkbox" name="vehicle3" value="Boat"> Biographie<br>
  <input type="checkbox" name="vehicle2" value="Car"> Crime<br>
  <input type="checkbox" name="vehicle3" value="Boat"> Drama<br>
</form>

<?php 
  $sql = "SELECT DISTINCT genres FROM movies_full ORDER BY genres DESC";
  $query = $pdo->prepare($sql);
  $query->execute();
  $genre = $query->fetchAll(); 

  foreach ($movies as $movie) {
  echo $movie["genres"];
  echo '<br/>';
  }
?>

<?php foreach ($movies as $movie) {

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

include('inc/footer.php');