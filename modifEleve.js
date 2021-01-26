$(document).ready(function () {

  $("#choixEleve").change(function () {

    if ($('#choixEleve').val() == "-- Choisir un élève --") {
      $('#divModif').html('');
    } else {
      let eleve = $("#choixEleve").val().split(" "); // 'Celibert Ewen (6ème)' -> [Celibert] [Ewen] [(6ème)]

      let nom = eleve[0]; // 'Celibert'
      let prenom = eleve[1]; // 'Ewen'
      let classe = eleve[2].replace('(', '').replace(')', ''); // '(6ème)' -> '6ème'

      $.ajax({
        url: 'infosEleveBDD.php',
        method: 'GET',
        data: "nom=" + nom + "&prenom=" + prenom + "&classe=" + classe,
        dataType: 'html',

        success: function (echo, statut) {
          $('#divModif').html(echo);
        }

      });
    }

  });
});


// Fonction séparée car le formulaire se charge avec le code PHP et pas au chargement de la page
// Donc le formulaire ne peut pas recevoir l'évènement au moment de $(document).ready()
// Le formulaire est ciblé avec '#formModif', 'this' ne fonctionne pas

function sendInfosEleve(e) {

  e.preventDefault();
  let infosForm = $('#formModif').serialize();

  if ($("#nom").val() != "" && $("#prenom").val() != "" && $("#age").val() != "" &&
    $("#genre").val() != "" && $("#choixClasse").val() != "" && $("#adresse").val() != "") {

    let eleve = $("#choixEleve").val().split(" "); // 'Celibert Ewen (6ème)' -> [Celibert] [Ewen] [(6ème)]
    infosForm += "&nomDebut=" + eleve[0] + "&prenomDebut=" + eleve[1] + "&classeDebut=" + eleve[2].replace('(', '').replace(')', '');

    $.ajax({
      url: 'modifEleveBDD.php',
      method: 'POST',
      data: infosForm,
      dataType: 'html',

      success: function (echo, statut) {
        alert("Réponse du serveur :  " + echo);

        /*
        // Mise à jour manuelle du menu déroulant
    
        let str = $("#nom").val() + " " + $("#prenom").val() + " (" + $("#choixClasse").val() + ")";
        console.log('$("#choixEleve").val() = str  :  ' + $("#choixEleve").val() + "=" + str)
        $("#choixEleve").val() = str ;
    
        // Uncaught ReferenceError: cannot assign to function call
        */

        // À la place, rechargement de la page

        $("#choixEleve").prop('selectedIndex',0); // Reset du Select
        location.reload();
      },
    });

  } else {
    alert("Les champs ne sont tous pas remplis.");
  }
};


function supprimerEleve(e) {

  e.preventDefault();
  if (confirm('Voulez-vous confirmer le retrait de cet élève ?')) {

    // Le formulaire n'est pas nécessaire
    let eleve = $("#choixEleve").val().split(" "); // 'Celibert Ewen (6ème)' -> [Celibert] [Ewen] [(6ème)]
    let infosForm = "nom=" + eleve[0] + "&prenom=" + eleve[1] + "&classe=" + eleve[2].replace('(', '').replace(')', '');

    $.ajax({
      url: 'supprimerEleveBDD.php',
      method: 'POST',
      data: infosForm,
      dataType: 'html',

      success: function (echo, statut) {
        alert("Réponse du serveur :  " + echo);

        // Rechargement de la page
        $("#choixEleve").prop('selectedIndex',0);
        location.reload();
      },
    });

  } else {
    alert("Opération annulée.");
  }
};