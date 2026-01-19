

function init() {
    // requete AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/api/classement.php", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Response
            var response = JSON.parse(this.responseText); 
        
            const template = document.getElementById('templateClassement').innerHTML;
            const rendered = Mustache.render(template, response);
            document.getElementById('classement').innerHTML = rendered;
        }
    };
    xhttp.send();
}

document.addEventListener("DOMContentLoaded", init)