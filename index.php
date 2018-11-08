<?php
include ('inc/header.php');
include ('inc/fonction.php');

  $sql = "SELECT genres FROM movies_full";
  $query = $pdo->prepare($sql);
  $query->execute();
  $genres = $query->fetchAll();

  $tableau = array();

  echo '<form class="categorie" action="index.php" method="post">';
  foreach ($genres as $genre) {

  $g = $genre['genres'];
  $explodes = explode(',',$g);

  foreach ($explodes as $explode) {

    $ex = trim($explode);

    if(!in_array($ex,$tableau)) {

      if(!empty($ex)) {

        $tableau[] = $ex;
        echo '<input class="check" type="checkbox" name="'.$ex.'" value="'.$ex.'">'.$ex.'<br>';
      }
    }
  }
}?>
<input type="submit" name="tri" value="">
<?php
  ?>
<div class="clear"></div>
<?php
echo '</form>';

$sql="SELECT * FROM movies_full WHERE 1=1";
  if(!empty('tri')){
    foreach ($tableau as $tab) {

      if (!empty($_POST[$tab])){

      $sql .= " OR genres LIKE '%$tab%'";

      }
    }
    $sql .= " ORDER BY RAND() LIMIT 8";
    echo $sql;
}

  $query = $pdo->prepare($sql);
  $query->execute();
  $movies = $query->fetchAll();

foreach ($movies as $movie) { ?>

<div class="wrap">
  <div class="film">
      <br/>
    <div class="poster">
      <a href="detail.php?slug=<?php echo $movie['slug']; ?>">
        <?php
        $poster = $movie['id'].".jpg";
          $chemin = "posters/".$poster;
          if (file_exists($chemin)){
            ?>
            <img src="posters/<?php echo $poster ?>" alt="<?php echo $movie['title'] ?> ">
            <?php
          }
          else {
            ?>
            <img src="img/notfound.jpg" alt="picture not found">
            <?php
          }
        ?>
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
