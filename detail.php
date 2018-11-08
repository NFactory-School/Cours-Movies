<?php 
include ('inc/pdo.php');
include ('inc/header.php');
include ('fonction.php');


// Recuperer l'ID du Film
$id = $_GET['slug'];
$sql = "SELECT * FROM movies_full WHERE slug = :id";
$query = $pdo -> prepare($sql);
$query -> bindValue(':id', $id, PDO::PARAM_STR);
$query -> execute();
$movie = $query -> fetch();

 // Afficher les détails du film en question
?>
<div class="wrap">
  <ul>
    <li class ="film"> <img src="posters/<?php echo $movie['id'].".jpg" ?>" alt="<?php echo $movie['title'] ?> "><br/> </li>
    <li class="title"><span>Titre : </span><?php echo $movie['title']; ?></li>
    <li class="year" ><span>Année de parution : </span><?php echo $movie['year']; ?></li>
    <li class="genre"><span>genre : </span><?php echo $movie['genres']; ?></li>
    <li class="plot"><span>synopsis : </span><?php echo $movie['plot']; ?></li>
    <li class="directors"><span>réalisateur : </span><?php echo $movie['directors']; ?></li>
    <li class="cast"><span>casting : </span><?php echo $movie['cast']; ?></li>
    <li class ="writers"><span>scénaristes : </span><?php echo $movie['writers']; ?></li>
    <li class="runtime"><span>durée : </span><?php echo $movie['runtime']; ?></li>
    <li class="mpaa"><span>Notation MPAA : </span><?php echo $movie['mpaa']; ?></li>
    <li class="rating"><span>Note : </span><?php echo $movie['rating']; ?></li>
    <li class="popularity"><span>Popularité : </span><?php echo $movie['popularity']; ?></li>
  </ul>
</div>
<div class="clear"></div>


<?php include ('inc/footer.php'); ?>
