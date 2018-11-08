<?php include ('inc/pdo.php'); ?>
<?php include ('inc/fonction.php'); ?>
<?php include ('inc/header.php'); ?>

<?php
$id = $_GET['id'];
 // Recuperer l'ID du Film
$sql = "SELECT * FROM movies_full WHERE id = :id";
$query = $pdo -> prepare($sql);
$query -> bindValue(':id', $id, PDO::PARAM_STR);
$query -> execute();
$movie = $query -> fetch();

 // Afficher les détails du film en question
?>
<ul>
  <li><?php echo $movie['title']; ?></li>
  <li><?php echo $movie['year']; ?></li>
  <li><?php echo $movie['genres']; ?></li>
  <li><?php echo $movie['plot']; ?></li>
  <li><?php echo $movie['directors']; ?></li>
  <li><?php echo $movie['cast']; ?></li>
  <li><?php echo $movie['writers']; ?></li>
  <li><?php echo $movie['runtime']; ?></li>
  <li><?php echo $movie['mpaa']; ?></li>
  <li><?php echo $movie['rating']; ?></li>
  <li><?php echo $movie['popularity']; ?></li>
</ul>


<?php include ('inc/footer.php'); ?>
