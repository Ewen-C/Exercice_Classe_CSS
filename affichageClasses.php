<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Classes : Affichage</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <header>
    <h1> Affichage des classes </h1>
    <h2> <a href="affichageEleves.php">Affichage des élèves</a> </h2>
  </header>

  <aside>
    <button onclick="location.href = 'ajoutClasse.php'">Ajout d'une classe</button>
    <button onclick="location.href = 'modifClasse.php'">Modifier le nom d'une classe</button>
  </aside>

  <section>

    <?php

    // Connexion aux tables 'eleve' et 'classe' de la BDD
    try {
      $bdd = new PDO('mysql:host=localhost; dbname=gestion_classe; charset=utf8', 'root', '');
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }


    echo ("<h3> Résumé des classes : </h3>");

    $reponse = $bdd->query('SELECT * FROM `classe`');
    echo ('<div id="divClasses"> <table id="tableClasses">');

    echo ('<tr> ');
    echo (' <th> Nom de la classe </th>');
    echo (" <th> Nombre d'élèves </th>");
    echo (' </tr>');

    while ($donnees = $reponse->fetch()) {
      echo ('<tr> ');
      echo (' <td> ' . $donnees['nom_classe'] . '</td>');
      echo (' <td> ' . $donnees['nb_eleves'] . '</td>');
      echo (' </tr>');
    }

    $reponse->closeCursor();
    echo ('</table> </div>');

    ?>

  </section>

  <footer>
    <p> Pages conçues par Ewen Celibert </p>
    <p> Exercice de développement donné par VLIS </p>
  </footer>

</body>

</html>