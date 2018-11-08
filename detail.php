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
echo $movie;

include ('inc/footer.php');
