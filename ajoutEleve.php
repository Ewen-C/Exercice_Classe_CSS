<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Élèves : Ajout</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="ajoutEleve.js" defer></script>
</head>

<body>

  <header>
    <h1> Ajout d'un élève </h1>
    <h2> <a href="affichageEleves.php">Retour</a> </h2>
  </header>

  <section>

    <?php

    try {
      $bdd = new PDO('mysql:host=localhost; dbname=gestion_classe; charset=utf8', 'root', '');
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }

    ?>

    <h3> Veuillez entrer les informations du nouvel élève : </h3>

    <form>

      <div class="formInline">
        <label for="nom"> Nom : </label>
        <input type="text" name="nom" id="nom" maxlength="20" required>
      </div>

      <div class="formInline">
        <label for="prenom"> Prenom : </label>
        <input type="text" name="prenom" id="prenom" maxlength="20" required>
      </div>

      <div class="formInline">
        <label for="age"> Âge : </label>
        <input type="number" name="age" id="age" min="0" max="99" required>
      </div>

      <div class="formInline">
        <label for="genre"> Genre : </label>
        <select name="genre" id="genre" required>
          <option value="M"> M </option>
          <option value="F"> F </option>
        </select>
      </div>

      <div class="formInline">
        <label for="classe"> Classe : </label>
        <select name="classe" id="classe" required>

          <?php
          $reponse = $bdd->query('SELECT * FROM `classe`');
          while ($donnees = $reponse->fetch()) {
            echo ('<option> ' . $donnees['nom_classe'] . ' </option>');
          }
          ?>

        </select>
      </div>

      <div class="formInline">
        <label for="adresse"> Adresse : </label>
        <input type="text" name="adresse" id="adresse" maxlength="50" required>
      </div>

      <button type="submit"> Envoyer </button>

    </form>

  </section>

  <footer>
    <p> Pages conçues par Ewen Celibert </p>
    <p> Exercice de développement donné par VLIS </p>
  </footer>

</body>

</html>