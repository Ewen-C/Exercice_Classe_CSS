<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Classes : Ajout</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="ajoutClasse.js" defer></script>
</head>

<body>

  <header>
    <h1> Ajout d'une classe </h1>
    <h2> <a href="affichageClasses.php">Retour</a> </h2>
  </header>

  <section>

    <?php

    try {
      $bdd = new PDO('mysql:host=localhost; dbname=gestion_classe; charset=utf8', 'root', '');
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }

    ?>

    <h3> Veuillez entrer les informations de la nouvelle classe : </h3>

    <form>

      <div class="formInline">
        <label for="nom_classe"> Nom de la nouvelle classe : </label>
        <input type="text" name="nom_classe" id="nom_classe" maxlength="10" required>
      </div>

      <div> Le nombre d'élèves s'initialise à 0 </div>

      <button type="submit"> Envoyer </button>

    </form>

  </section>

  <footer>
    <p> Pages conçues par Ewen Celibert </p>
    <p> Exercice de développement donné par VLIS </p>
  </footer>

</body>

</html>