<?php include('fonction.php');

//compte les films
$sql = "SELECT COUNT(films) FROM movies_full";
$query = $pdo->prepare($sql);
$query->execute();
$count_films = $query->fetch();
//compte les users
$sql = "SELECT COUNT(users) FROM movies_full";
$query = $pdo->prepare($sql);
$query->execute();
$count_users = $query->fetch();
//prend les 30 meilleurs films
$sql = "SELECT nb_add FROM movies_full ORDER BY nb_add DESC LIMIT 30";
$query = $pdo->prepare($sql);
$query->execute();
$best_films = $query->fetchAll();


include('header.php'); ?>
<!-- Affiche les stats à l'Admin -->
<p class="stats"><h2>Le nombre de films dans votre site est de :<?php echo $count_films ?></h2><br/>
<h2>Le nombre d'utilisateurs dans votre site est de :<?php echo $count_users ?></h2><br/>
<h2>Les 30 meilleurs films sont :<?php echo $best_films ?></h2></p>

<a href="#"></a>

<?php include('inc/footer.php'); ?>
