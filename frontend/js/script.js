async function load() {

    for (let i = 1; i < 7; i++) {
        let formData = new FormData();
        formData.append("id", i);

        await fetch("http://localhost/cinema/" + "backend/prenotation/get_film.php", { method: 'POST', body: formData })
            .then(response => response.json())
            .then(result => {
                if (result.success) {

                    let body = document.getElementById("index-body");

                    let section = document.createElement('section');
                    section.id = result.msg["id"];
                    section.className = 'card';
                    section.innerHTML = '<div class="container"> <img src="' + result.msg["img"] + '" class="img"><p class="title">' + result.msg["titolo"] + '</p></div>';

                    section.setAttribute('onclick', 'toPrenotation("' + result.msg["id"] + '")');

                    body.appendChild(section);
                }
            })
            .catch(error => console.log('error', error));
    }
}
function toPrenotation(film) {
    let formData = new FormData();
    formData.append("film", film);

    fetch("http://localhost/cinema/" + "backend/prenotation/toPrenotation.php", { method: 'POST', body: formData })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                window.location.href = "prenotation.html";
            }
            else {
                window.alert("error");
            }
        })
        .catch(error => console.log('error', error));
}
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
function loadPrenotation() {

    fetch("http://localhost/cinema/" + "backend/prenotation/loadPrenotation.php")
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                let body = document.getElementById("index-body");

                let section = document.createElement('section');
                section.id = "film";
                section.className = 'card';
                section.innerHTML = '<div class="container-3"> <img src="' + result.msg["img"] + '" class="img"><p class="title">' + result.msg["titolo"] + '</p><p class="descrizione">' + result.msg["descrizione"] + '</p><p class="durata">' + result.msg["durata"] + '</p><p class="direttore">' + result.msg["direttore"] + '</p></div>';

                body.appendChild(section);
            }
        })
        .catch(error => console.log('error', error));
}
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
async function prenotation() {

    let formData = new FormData(document.getElementById("form-prenotation"));
    formData.append("film", document.getElementById("film"));
    formData.append("data", "15/12/2022");

    await fetch("http://localhost/cinema/" + "backend/prenotation/prenotation.php", { method: 'POST', body: formData })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                window.alert("posto prenotato");
            }
            else {
                window.alert("error");
            }
        })
        .catch(error => console.log('error', error));
}
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
function login() {

    let form = document.getElementById("form_login");
    var formData = new FormData(form);

    fetch("http://localhost/cinema/" + "backend/login/login_handler.php", { method: 'POST', body: formData })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                window.location.href = "index.html";
                //window.alert("Login Succesful");
            }
            else {
                window.alert("error");
            }
        })
        .catch(error => console.log('error', error));
}
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
function registration() {

    let form = document.getElementById("form_registration");
    var formData = new FormData(form);

    fetch("http://localhost/cinema/" + "backend/login/registration_handler.php", { method: 'POST', body: formData })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                window.location.href = "index.html";
            }
            else {
                window.alert("error");
            }
        })
        .catch(error => console.log('error', error));
}
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------