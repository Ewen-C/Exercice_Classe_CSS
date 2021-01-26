<?php

  // Connexion
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_classe;charset=utf8', 'root', '');
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

  echo ("<h3> Informations de la classe : </h3> ");

  // Affichage du formulaire pré-rempli
  
  echo('
    <form id="formModif">

      <div class="formInline">
        <label for="nom_classe"> Nom : </label>
        <input type="text" name="nom_classe" id="nom_classe" maxlength="10" value="' . $_GET['classe'] .'" required>
      </div>

      <button type="submit" onclick="javascript:sendInfosClasse(event)"> Modifier </button>
    </form>');

?>