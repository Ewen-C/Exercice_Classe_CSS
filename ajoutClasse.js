// Ajax POST en jQuery :

$(document).ready(function () {
  $("form").submit(function (e) {
    e.preventDefault();
    var infosForm = $(this).serialize();

    if ($("#nom_classe").val() != "") {

      $.ajax({
        url: 'ajoutClasseBDD.php',
        method: 'POST',
        data: infosForm,
        dataType: 'html',

        success: function (echo, statut) {
          alert("Réponse du serveur :  " + echo);
          console.log(echo);
          $("form").trigger("reset");
        },
      });

    } else {
      alert("Les champs ne sont tous pas remplis.");
    }
  });
});