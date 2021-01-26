<?php

  // Connexion
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_classe;charset=utf8', 'root', '');
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

  $optclasses[] = "";
  $reponse = $bdd->query("SELECT * FROM `classe`");
  for($i = 0; $donnees = $reponse->fetch(); $i++) {
    $optclasses[$i] = $donnees["nom_classe"];
  }

  // Rquête SQL
  $reponse = $bdd->query('SELECT * FROM `eleve` WHERE `nom` = "' . $_GET['nom'] . '" AND `prenom` = "' . $_GET['prenom'] . '" AND `classe` = "' . $_GET['classe'] . '"');

  echo ("<h3> Informations de l'élève : </h3> ");

  // Informations de l'élève choisi
  $donnees = $reponse->fetch();


  // Affichage du formulaire pré-rempli
  echo('
    <form id="formModif">

      <div class="formInline">
        <label for="nom"> Nom : </label>
        <input type="text" name="nom" id="nom" maxlength="20" value="' . $donnees['nom'] .'" required>
      </div>

      <div class="formInline">
        <label for="prenom"> Prenom : </label>
        <input type="text" name="prenom" id="prenom" maxlength="20" value="' . $donnees['prenom'] . '" required>
      </div>

      <div class="formInline">
        <label for="classe"> Classe : </label>
        <select name="classe" id="choixClasse"> '); 

    for($i = 0; $i < count($optclasses); $i++) {

      if($optclasses[$i] == $donnees['classe']) {
        echo("<option selected> ");
      } else {
        echo("<option> ");
      }

      echo($optclasses[$i]);
      echo(" </option>"); // Affichage des classes sans la méthode __toString() de PHP
    }
        
    echo(' </select>
      </div>

      <div class="formInline">
        <label for="age"> Âge : </label>
        <input type="number" name="age" id="age" min="0" max="99" value="' . $donnees['age'] .'"  required>
      </div>

      <div class="formInline">
        <label for="genre"> Genre : </label>
        <select name="genre" id="genre" value="' . $donnees['genre'] .'"  required>
          <option value="M"> M </option>
          <option value="F"> F </option>
        </select>
      </div>

      <div class="formInline">
        <label for="adresse"> Adresse : </label>
        <input type="text" name="adresse" id="adresse" maxlength="50" value="' . $donnees['adresse'] . '"  required>
      </div>

      <div class="formInline">
        <button type="submit" onclick="javascript:sendInfosEleve(event)"> Modifier </button>
        <button type="submit" onclick="javascript:supprimerEleve(event)"> Supprimer l\'élève </button>
      </div>
    </form>');


  $reponse->closeCursor();
