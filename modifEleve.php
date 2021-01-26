<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Eleves : Édition</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="modifEleve.js" defer></script>
</head>

<body>

  <header>
    <h1>Modification / Suppression d'un élève</h1>
    <h2> <a href="affichageEleves.php">Retour</a> </h2>
  </header>

  <section>

    <?php

    try {
      $bdd = new PDO('mysql:host=localhost; dbname=gestion_classe; charset=utf8', 'root', '');
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }

    echo("<h3> Choix de l'élève : </h3>");

    echo ('<select id="choixEleve">');
      echo ('<option selected> -- Choisir un élève -- </option>');

      $reponse = $bdd->query('SELECT * FROM `eleve`');
      while ($donnees = $reponse->fetch()) {
        echo ('<option> ' . $donnees['nom'] . ' ' . $donnees['prenom'] . ' (' . $donnees['classe'] . ') </option>');
      }

    echo ('</select>');

    
    echo('<div id="divModif"> 
    </div>');
    ?>

  </section>

  <footer>
    <p> Pages conçues par Ewen Celibert </p>
    <p> Exercice de développement donné par VLIS </p>
  </footer>

</body>

</html>