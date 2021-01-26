<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Élèves : Affichage</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="choixClasse.js" defer></script>
</head>

<body>

  <header>
    <h1> Affichage des élèves </h1>
    <h2> <a href="affichageClasses.php">Affichage des classes</a> </h2>
  </header>

  <aside>
    <button onclick="location.href = 'ajoutEleve.php'">Ajout d'un élève</button>
    <button onclick="location.href = 'modifEleve.php'">Modification / Suppression d'un élève</button>
  </aside>

  <section>

    <?php

    // Connexion aux tables 'eleve' et 'classe' de la BDD
    try {
      $bdd = new PDO('mysql:host=localhost; dbname=gestion_classe; charset=utf8', 'root', '');
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }

    // Choix de la classe

    echo ("<h3> Choix de la classe : </h3>");

    echo ('<form>');
    echo ('<select id="choixClasse">');

    $reponse = $bdd->query('SELECT * FROM `classe`');
    while ($donnees = $reponse->fetch()) {
      echo ('<option> ' . $donnees['nom_classe'] . ' (' . $donnees['nb_eleves'] . ' élève' . (($donnees['nb_eleves'] > 1) ? "s" : "") . ') </option>');
    }

    echo ('</select>');
    echo ('</form>');

    $reponse->closeCursor(); // Termine le traitement de la requête

    // Affichage des élèves

    echo ("<h3> Liste des élèves de : " . " <u> <span id='selectedClass'> 6ème </span> </u> </h3>"); // Récupérer la valeur du dessus

    $reponse = $bdd->query('SELECT * FROM `eleve` WHERE `classe` = "6ème"');
    echo ('<div id="divEleves"> <table id="tableEleves">');

    echo ('<tr> ');
    echo (' <th> Nom </th>');
    echo (' <th> Prenom </th>');
    echo (' <th> Âge </th>');
    echo (' <th> Genre </th>');
    echo (' <th> Adresse </th>');
    echo (' </tr>');

    while ($donnees = $reponse->fetch()) {
      echo ('<tr> ');
      echo (' <td> ' . $donnees['nom'] . '</td>');
      echo (' <td> ' . $donnees['prenom'] . '</td>');
      echo (' <td> ' . $donnees['age'] . '</td>');
      echo (' <td> ' . $donnees['genre'] . '</td>');
      echo (' <td> ' . $donnees['adresse'] . '</td>');
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