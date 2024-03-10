let btn_aereoporti = document.getElementById("btn-aeroporti");
let btn_aerei = document.getElementById("btn-aerei");
let btn_voli = document.getElementById("btn-voli");
let btn_home = document.getElementById("btn-home");
let btn_cerca = document.getElementById("btn-cerca");
let search_form = document.getElementById('flight-search-form');

document.addEventListener("DOMContentLoaded", function() {
    if (btn_aereoporti) {
        btn_aereoporti.addEventListener("click", () => {
            window.location.href = "aeroporti.php";
        });
    }
    if (btn_aerei) {
        btn_aerei.addEventListener("click", () => {
            window.location.href = "aerei.php";
        });
    }
    if (btn_voli) {
        btn_voli.addEventListener("click", () => {
            window.location.href = "voli.php";
        });
    }
    if (btn_home) {
        btn_home.addEventListener("click", () => {
            window.location.href = "index.php";
        });
    }
    if (btn_cerca) {
        btn_cerca.addEventListener("click", () => {
            window.location.href = "cerca-voli.php";
        });
    }
    if (search_form) {
        search_form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evita il comportamento predefinito del modulo

            // Recupera i valori inseriti dall'utente
            let departureAirport = document.getElementById('departure-airport').value;
            let arrivalAirport = document.getElementById('arrival-airport').value;
            let travelDate = document.getElementById('travel-date').value;

            // Invia una richiesta AJAX al server per ottenere i voli disponibili
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'search-handler.php?departure=' + departureAirport + '&arrival=' + arrivalAirport + '&date=' + travelDate, true);
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    // Mostra i risultati della ricerca nella pagina
                    document.getElementById('search-results').innerHTML = xhr.responseText;
                } else {
                    // Gestione degli errori
                    console.error('Si è verificato un errore durante la ricerca dei voli.');
                }
            }
            xhr.send();
        });
    }
});
