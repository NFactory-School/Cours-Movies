<?php include('inc/header.php');

  $sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 100";
  $query = $pdo->prepare($sql);
  $query->execute();
  $movies = $query->fetchAll();

foreach ($movies as $movie) { ?>

<div class="wrap">

  <div class="film">
    <br/>
    <h2><?php echo $movie['title']; ?></h2>
      <a href="detail.php?id=<?php echo $movie['id']; ?>">
        <img src="posters/<?php echo $movie['id'].".jpg" ?>" alt="<?php echo $movie['title'] ?> ">
      </a>
  </div>
<?php } ?>

</div>


<?php include('inc/footer.php'); ?>