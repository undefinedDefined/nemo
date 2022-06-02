$(document).ready(function(){
      /**
   * * Chronomètre pour le timer changement d'eau
   */
  $('button[data-aq-timer="water"]').each(function () {
    let button = this;
    let expires = $(this).data("aq-water");

    // convertisseur Datetime SQL à JS Date
    let dateTimeParts = expires.split(/[- :]/);
    dateTimeParts[1]--;
    let expiresDate = new Date(...dateTimeParts).getTime();

    let chrono = setInterval(function () {
      let today = new Date().getTime();
      let timer = expiresDate - today;

      // timestamps en millisecondes pour 1 jour, heure, minute et seconde
      let ts_jour = 1000 * 60 * 60 * 24;
      let ts_heure = 1000 * 60 * 60;
      let ts_minute = 1000 * 60;
      let ts_seconde = 1000;

      // calcul des jours, heures, minutes et secondes
      let jours = Math.floor(timer / ts_jour);
      let heures = Math.floor((timer % ts_jour) / ts_heure);
      let minutes = Math.floor((timer % ts_heure) / ts_minute);
      let secondes = Math.floor((timer % ts_minute) / ts_seconde);

      if (timer > 2 * ts_jour) {
        $(button).find("p").attr("class", "text-success");
      } else if (timer > 10 * ts_minute && timer < 2 * ts_jour) {
        $(button).find("p").attr("class", "text-warning");
      } else {
        $(button).find("p").attr("class", "text-danger");
      }

      $(button)
        .find("p")
        .html(`${jours}d ${heures}h ${minutes}ms ${secondes}s`);

      if (timer < 1) {
        clearInterval(chrono);
        $(button).find("p").html("Expiré");
      }
    }, 1000);
  });

  /**
   * * Chronomètre pour le timer changement de filtre
   */
  $('button[data-aq-timer="filter"]').each(function () {
    let button = this;
    let expires = $(this).data("aq-water");

    // convertisseur Datetime SQL - JS Date
    let dateTimeParts = expires.split(/[- :]/);
    dateTimeParts[1]--;
    let expiresDate = new Date(...dateTimeParts).getTime();

    let chrono = setInterval(function () {
      let today = new Date().getTime();
      let timer = expiresDate - today;

      // timestamps en millisecondes pour 1 jour, heure, minute et seconde
      let ts_jour = 1000 * 60 * 60 * 24;
      let ts_heure = 1000 * 60 * 60;
      let ts_minute = 1000 * 60;
      let ts_seconde = 1000;

      // calcul des jours, heures, minutes et secondes
      let jours = Math.floor(timer / ts_jour);
      let heures = Math.floor((timer % ts_jour) / ts_heure);
      let minutes = Math.floor((timer % ts_heure) / ts_minute);
      let secondes = Math.floor((timer % ts_minute) / ts_seconde);

      if (timer > 2 * ts_jour) {
        $(button).find("p").attr("class", "text-success");
      } else if (timer > 10 * ts_minute && timer < 2 * ts_jour) {
        $(button).find("p").attr("class", "text-warning");
      } else {
        $(button).find("p").attr("class", "text-danger");
      }

      $(button)
        .find("p")
        .html(`${jours}d ${heures}h ${minutes}ms ${secondes}s`);

      if (timer < 1) {
        clearInterval(chrono);
        $(button).find("p").html("Expiré");
      }
    }, 1000);
  });
})