<nav>
<<<<<<< HEAD
  <?php
                  if (!empty($_SESSION['user']))
                  {
                  ?>
                <ul>
                  <li><a href="profil.php">Bienvenue <? echo $_SESSION['pseudo'];?></a></li>
                  <li><a href="deconnection.php">Deconnexion</a></li>
                </ul>
                  <?php
                      }
                      else
                      {
                  ?>
                <ul>
                  <li id="services"><a href="incription.php">Inscription</a></li>
                  <li id="services"><a href="connection.php">Connexion</a></li>
                </ul>
                  <?php
                  }
                  ?>
=======
  <ul>
    <li> <a href="incription.php">Inscription</a> </li>
    <li> <a href="connection.php">Connexion</a> </li>
  </ul>
  <div class="clear"></div>
>>>>>>> ca4ceea7bb6478c5998d048559e0e314f337183b
</nav>
