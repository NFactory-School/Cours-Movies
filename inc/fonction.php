<?php
function br(){
  echo '<br>';
}

function debug(array $table){
  echo '<pre>';
  print_r($table);
  echo '</pre>';
}

// function affiche($movies){
//
// foreach ($movies as $movie) {
//     $id=$movie['id'];
//     $titre=$movie['title'];
//     $href='http://www.weblitzer.fr/formation/posters/'.$id.'.jpg';
//     echo '<div class="affichage>"';
//     echo '<img src="'.$href.'" alt="'.$titre.'"  width="220px" height="320px">';
//     echo '<div class="titre">'.$titre.'</div><br>';
//     echo '</div>';
//   }
// }
function affiches($movie){

        echo '<img src="http://www.weblitzer.fr/formation/posters/'. $movie['id'].'.jpg" alt="'.$movie['title'].'">';
}
?>
