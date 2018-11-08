<?php include('inc/header.php');

  $sql = "SELECT genres FROM movies_full";
  $query = $pdo->prepare($sql);
  $query->execute();
  $genres = $query->fetchAll();

  $tableau = array();
  
  echo '<form class="categorie" action="index.php">';
  foreach ($genres as $genre) {
  
  $g = $genre['genres'];
  $explodes = explode(',',$g);
  
  foreach ($explodes as $explode) {
  
    $ex = trim($explode);
  
    if(!in_array($ex,$tableau)) {
  
      if(!empty($ex)) {
  
        $tableau[] = $ex;
        echo '<input type="checkbox" name="'.$ex.'" value="'.$ex.'">'.$ex.'<br>';
      }
    }
  }
}

echo '</form>';

  $sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 8";
  $query = $pdo->prepare($sql);
  $query->execute();
  $movies = $query->fetchAll();

foreach ($movies as $movie) { ?>

<div class="wrap">
  <div class="film">
      <br/>
    <div class="poster">
      <a href="detail.php?slug=<?php echo $movie['slug']; ?>">
        <img src="posters/<?php echo $movie['id'].".jpg" ?>" alt="<?php echo $movie['title'] ?> ">
      </a>
    </div>
    <div class="titre">
      <h2><?php echo $movie['title']; ?></h2>
      <h2><?php echo $movie['year']; ?></h2>
    </div>
  </div>
<?php } ?>


<div class="clear"></div>

<a class="myButton" href="index.php">Plus de film</a>
<br/>

</div>


<?php include('inc/footer.php'); ?>
