$(document).ready(function () {

  $("#choixClasse").change(function () {

    if ($('#choixClasse').val() == "-- Choisir une classe --") {
      $('#divModif').html('');
    } else {
      let classe = $("#choixClasse").val();

      $.ajax({
        url: 'infosClasseBDD.php',
        method: 'GET',
        data: "classe=" + classe,
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

function sendInfosClasse(e) {
  e.preventDefault();
  var infosForm = $('#formModif').serialize();

  if ($("#nom_classe").val() != "") {

    infosForm += "&nom_classe_Debut=" + $("#choixClasse").val();

    $.ajax({
      url: 'modifClasseBDD.php',
      method: 'POST',
      data: infosForm,
      dataType: 'html',

      success: function (echo, statut) {
        alert("Réponse du serveur :  " + echo);

        $('#choixClasse').prop('selectedIndex',0);

        // Rechargement de la page
        location.reload();
      },
    });

  } else {
    alert("Les champs ne sont tous pas remplis.");
  }
};