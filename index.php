<?php
include ('inc/header.php');
include ('inc/fonction.php');

  $sql = "SELECT genres FROM movies_full";
  $query = $pdo->prepare($sql);
  $query->execute();
  $genres = $query->fetchAll();

  $tableau = array();

  echo '<form class="categorie-genre" action="index.php" method="post">';
  foreach ($genres as $genre) {

  $g = $genre['genres'];
  $explodes = explode(',',$g);

  foreach ($explodes as $explode) {

    $ex = trim($explode);

    if(!in_array($ex,$tableau)) {

      if(!empty($ex)) {

        $tableau[] = $ex;
        echo '<input id="cbx" type="checkbox" name="'.$ex.'" value="'.$ex.'">'.$ex.'<br/>';
      }
    }
  }
}
?>

<select class="categorie-date" name="date">
  <option <?php if (!empty($_POST['date']) && $_POST['date'] == "nodate"){echo "selected";} ?> value="nodate">- Par date -</option>
  <option <?php if (!empty($_POST['date']) && $_POST['date'] == "antique"){echo "selected";} ?> value="antique">Avant 1920</option>
  <option <?php if (!empty($_POST['date']) && $_POST['date'] == "vieux"){echo "selected";} ?> value="vieux">1920 - 1950</option>
  <option <?php if (!empty($_POST['date']) && $_POST['date'] == "ancien"){echo "selected";} ?> value="ancien">1950 - 1990</option>
  <option <?php if (!empty($_POST['date']) && $_POST['date'] == "moderne"){echo "selected";} ?> value="moderne">Après 1990</option>
</select>

<input type="submit" name="tri" value="">
</form>
<br/>

<div class="clear"></div>

<?php


$sql="SELECT * FROM movies_full WHERE 1=1";

  if(!empty($_POST['tri'])){
    foreach ($tableau as $tab) {

      if (!empty($_POST[$tab])){

      $sql .= " AND genres LIKE '%$tab%'";

      }
    }
}

if (!empty($_POST['date'])){
    switch ($_POST['date']) {

      case "antique":
        $sql .= " AND year < 1920";
      break;
  
      case "vieux":
        $sql .= " AND year < 1920";
      break;
  
      case "ancien":
        $sql .= " AND year BETWEEN 1950 AND 1990";
      break;
          
      case "moderne":
        $sql .= " AND year > 1990";
      break;
    }
}

echo '<a class="myButton more" href="index.php">Plus de film</a>';

  $sql .= " ORDER BY RAND() LIMIT 8;";
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

<br/>

</div>


<?php include('inc/footer.php'); ?>
