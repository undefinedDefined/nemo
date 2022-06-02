$(document).ready(function () {
  /**
   * * Ajax pour afficher les informations dans le modal
   */
  $('button[data-aq-action="show"]').click(function () {
    let id = $(this).data("aq-id");
    let url = "aquarium.show.php";

    $.ajax({
      url: url,
      type: "post",
      data: { aqId: id },
      success: function (res) {
        $("#modal .modal-title").html(`Détails aquarium ${id}`);
        $("#modal .modal-body").html(res);
      },
    });
  });

  /**
   * * Ajax pour afficher le formulaire de modification dans le modal
   */
  $('button[data-aq-action="edit"]').click(function () {
    let id = $(this).data("aq-id");
    let url = "aquarium.edit.php";

    $.ajax({
      url: url,
      type: "post",
      data: { aqId: id },
      success: function (res) {
        $("#modal .modal-title").html(`Modification aquarium ${id}`);
        $("#modal .modal-body").html(res);

        initEditAjax();
      },
    });
  });

  /**
   * * Ajax pour afficher le formulaire de création dans le modal
   */
  $('button[data-aq-action="create"]').click(function () {
    let url = "aquarium.create.php";

    $.ajax({
      url: url,
      type: "post",
      success: function (res) {
        $("#modal .modal-title").html(`Ajouter un aquarium`);
        $("#modal .modal-body").html(res);

        initCreateAjax();
      },
    });
  });

  /**
   * * Ajax pour afficher la confirmation de suppression
   */
   $('button[data-aq-action="delete"]').click(function(){
     let id = $(this).data('aq-id');
    let url = "aquarium.delete.php";

    $.ajax({
      url: url,
      type: "post",
      data: {id: id},
      success: function (res) {
        $("#modal .modal-title").html(`Supprimer un aquarium`);
        $("#modal .modal-body").html(res);

        initDeleteAjax();
      },
    });
   })

});

/**
 * * Fonction appelée lorsque le formulaire de modification est récupéré via ajax
 */
function initEditAjax() {
  $("form").submit(function (e) {
    e.preventDefault();
    e.stopPropagation();

    let url = $(this).attr("action");
    let formData = new FormData(this);

    $.ajax({
      url: url,
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        alert(res);
      },
    });
  });
}

function initCreateAjax(){
  $('form').submit(function(e){
    e.preventDefault();
    e.stopPropagation();

    let url = $(this).attr("action");
    let formData = new FormData(this);

    $.ajax({
      url: url,
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        alert(res);
      },
    });

  })
}

function initDeleteAjax(){
  $('form').submit(function(e){
    e.preventDefault();
    e.stopPropagation();

    let url = $(this).attr("action");

    $.ajax({
      url: url,
      type: "post",
      data: $(this).serialize(),
      success: function (res) {
        alert(res);
        location.reload();
      },
    });
  })
}
