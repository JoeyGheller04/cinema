async function load() {

    id = 2;
    var formData = new FormData();
    formData.append("id", 2);

    await fetch("http://localhost/cinema/" + "backend/prenotation/get_film.php", { method: 'POST', body: formData })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                window.alert(result.msg["titolo"]);
            }
        })
        .catch(error => console.log('error', error));
}
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
async function login() {

    let form = document.getElementById("form_login");
    var formData = new FormData(form);

    await fetch("http://localhost/cinema/" + "backend/login/login_handler.php", { method: 'POST', body: formData })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                window.location.href="index.html";
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
async function registration() {

    let form = document.getElementById("form_registration");
    var formData = new FormData(form);

    await fetch("http://localhost/cinema/" + "backend/login/registration_handler.php", { method: 'POST', body: formData })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                window.location.href="index.html";
                //window.alert("Registration Succesful");
            }
            else {
                window.alert("error");
            }
        })
        .catch(error => console.log('error', error));
}
