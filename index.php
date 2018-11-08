<?php include('inc/header.php');

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
</div>

<div class="clear"></div>

<a class="more" href="index.php">Plus de film</a>
<br/>




<?php include('inc/footer.php'); ?>
