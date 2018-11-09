<?php 
include ('inc/pdo.php');
include ('inc/fonction.php');
include ('inc/header.php');



// Recuperer l'ID du Film
$id = $_GET['slug'];
$sql = "SELECT * FROM movies_full WHERE slug = :id";
$query = $pdo -> prepare($sql);
$query -> bindValue(':id', $id, PDO::PARAM_STR);
$query -> execute();
$movie = $query -> fetch();

 // Afficher les détails du film en question
?>

<div class="centre">

  <ul>
    <div class="detail-texte">
      <li><span>Titre : </span><?php echo $movie['title']; ?></li>
      <li><span>Année de parution : </span><?php echo $movie['year']; ?></li>
      <li><span>genre : </span><?php echo $movie['genres']; ?></li>
      <li><span>synopsis : </span><?php echo $movie['plot']; ?></li>
      <li><span>réalisateur : </span><?php echo $movie['directors']; ?></li>
      <li><span>casting : </span><?php echo $movie['cast']; ?></li>
      <li><span>scénaristes : </span><?php echo $movie['writers']; ?></li>
      <li><span>durée : </span><?php echo $movie['runtime']; ?></li>
      <li><span>Notation MPAA : </span><?php echo $movie['mpaa']; ?></li>
      <li><span>Note : </span><?php echo $movie['rating']; ?></li>
      <li><span>Popularité : </span><?php echo $movie['popularity']; ?></li>
    </div>
      <li> <img class="detail-img" src="posters/<?php echo $movie['id'].".jpg" ?>" alt="<?php echo $movie['title'] ?> "><br/> </li>
  </ul>
</div>

<div class="clear"></div>


<?php include ('inc/footer.php'); ?>
