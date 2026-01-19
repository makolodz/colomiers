// VARIABLES GLOBALES

let formlist;

// PAS DU AJAX JUSTE DU DISPLAY : NONE POUR LA MODIFICATION DES MENUS

function setupListeners() {

    let addTeamButton = document.getElementById("create-team");

    addTeamButton.addEventListener("click", addEquipe);

    let validateTeamButton = document.getElementById("validate-team-button");

    validateTeamButton.addEventListener("click", saveEquipe) 

    // adapter ce code à chaque entrées

}

function setupListenersAjax() {

    let editArticleButtons = document.querySelectorAll('.btn-article-edit');
    let editArticleTitle = document.getElementById('titre-article-edit');

    let editHistoireButtons = document.querySelectorAll('.btn-histoire-edit');
    let editHistoireTitle = document.getElementById('titre-histoire-edit');

    let editStaffButtons = document.querySelectorAll('.btn-staff-edit');
    let editStaffTitle = document.getElementById('titre-staff-edit');

    let editJoueurButtons = document.querySelectorAll('.btn-joueur-edit');
    let editJoueurTitle = document.getElementById('titre-joueur-edit');

    let editPartenaireButtons = document.querySelectorAll('.btn-partenaire-edit');
    let editPartenaireTitle = document.getElementById('titre-partenaire-edit');

    let formlist = document.querySelectorAll('.edit-simulation-area');

    editPartenaireButtons.forEach(button => {
        button.addEventListener('click', () => {
    
            let form = document.getElementById('edit-partenaire');
    
            let partenaireId = button.dataset.id;
            let nom = button.dataset.nom;
            let lien = button.dataset.lien;
            let image = button.dataset.image;
    
            formlist.forEach(formItem => {
                formItem.classList.add("hidden");
            });
    
            form.closest('.edit-simulation-area').classList.remove("hidden");
    
            form.querySelector('input[name="id"]').value = partenaireId;
            form.querySelector('input[name="nom"]').value = nom;
            form.querySelector('input[name="lien"]').value = lien;
    
            editPartenaireTitle.innerHTML = nom;
        });
    });

    editStaffButtons.forEach(button => {
        button.addEventListener('click', () => {
    
            let form = document.getElementById('edit-staff');
    
            let staffId = button.dataset.id;
            let nom = button.dataset.nom;
            let fonction = button.dataset.fonction;
            let texte = button.dataset.texte;
            let image = button.dataset.image;
    
            formlist.forEach(formItem => {
                formItem.classList.add("hidden");
            });
    
            form.closest('.edit-simulation-area').classList.remove("hidden");
    
            form.querySelector('input[name="id"]').value = staffId;
            form.querySelector('input[name="nom"]').value = nom;
            form.querySelector('input[name="fonction"]').value = fonction;
            form.querySelector('textarea[name="texte"]').value = texte;
    
            editStaffTitle.innerHTML = nom;
        });
    });

    editJoueurButtons.forEach(button => {
        button.addEventListener('click', () => {
    
            let form = document.getElementById('edit-joueur');
    
            let joueurId = button.dataset.id;
            let nom = button.dataset.nom;
            let poste = button.dataset.poste;
            let texte = button.dataset.texte;
            let image = button.dataset.image;
    
            formlist.forEach(formItem => {
                formItem.classList.add("hidden");
            });
    
            form.closest('.edit-simulation-area').classList.remove("hidden");
    
            form.querySelector('input[name="id"]').value = joueurId;
            form.querySelector('input[name="nom"]').value = nom;
            form.querySelector('input[name="poste"]').value = poste;
            form.querySelector('textarea[name="texte"]').value = texte;
            // form.querySelector('input[name="image"]').value = image;
    
            editJoueurTitle.innerHTML = nom;
        });
    });
    
    editHistoireButtons.forEach(button => {
        button.addEventListener('click', () => {

            let form = document.getElementById('edit-history')

            // Récupère les données de l'article depuis les data-attributes
            let histoireId = button.dataset.id;
            let titre = button.dataset.titre;
            let tranche_de_date = button.dataset.trancheDeDate;
            let texte = button.dataset.texte;
            let image = button.dataset.image;
            
            formlist.forEach(formItem => {
                formItem.classList.add("hidden");
            });
            
            form.closest('.edit-simulation-area').classList.remove("hidden");

            // Remplit les champs du formulaire
            form.querySelector('input[name="id"]').value = histoireId;
            form.querySelector('input[name="titre"]').value = titre;
            form.querySelector('input[name="tranche_de_date"]').value = tranche_de_date;
            form.querySelector('textarea[name="texte"]').value = texte;
            //form.querySelector('input[name="image"]').value = image;
            editHistoireTitle.innerHTML = titre;
        });
    });

    editArticleButtons.forEach(button => {
        button.addEventListener('click', () => {

            let form = document.getElementById('edit-article')

            // Récupère les données de l'article depuis les data-attributes
            let articleId = button.dataset.id;
            let titre = button.dataset.titre;
            let taxonomie = button.dataset.taxonomie;
            let texte = button.dataset.texte;
            let image = button.dataset.image;

            formlist.forEach(formItem => {
                formItem.classList.add("hidden");
            });
            
            form.closest('.edit-simulation-area').classList.remove("hidden");

            // Remplit les champs du formulaire
            form.querySelector('input[name="id"]').value = articleId;
            form.querySelector('input[name="titre"]').value = titre;
            form.querySelector('input[name="taxonomie"]').value = taxonomie;
            form.querySelector('textarea[name="texte"]').value = texte;
            //form.querySelector('input[name="image"]').value = image;
            editArticleTitle.innerHTML = titre;
        });
    });
} // normalement on a plus besoin de la fonction setupListenersAjax après avoir fini de coder en ajax

//AJAX

// AJAX LIEN ENTRE STAFF <-> EQUIPE (plus compliqué que le reste donc pas celui qu'il faut copypaste)

function addStaffEquipe(event) {

    let idStaff = event.target.dataset.staffid;
    let idEquipe = event.target.dataset.teamid;
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "create-link",
            id_staff: idStaff,
            id_equipe: idEquipe
        })
    })
    .then(response => {
        // Vérifie si la requête 
        // HTTP a réussi
        updateStaffEquipe(idEquipe);
        if (!response.ok) {
            throw new Error("Erreur HTTP : " + response.status);
        }

    });

    console.log(idStaff, " ", idEquipe);
}

function removeStaffEquipe(event) {

    let idStaff = event.target.dataset.staffid;
    let idEquipe = event.target.dataset.teamid;
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-link",
            id_staff: idStaff,
            id_equipe: idEquipe
        })
    })
    .then(response => {
        // Vérifie si la requête 
        // HTTP a réussi
        updateStaffEquipe(idEquipe);
        if (!response.ok) {
            throw new Error("Erreur HTTP : " + response.status);
        }

    });
}

function updateStaffEquipe(idEquipe) {

    var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "./php/api/script.php?action=get-link&id_equipe=" + idEquipe, true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// Response
			var response = JSON.parse(this.responseText); 
		
			const templateAssigned = document.getElementById('templateStaff').innerHTML;
            const templateNotAssigned = document.getElementById('templateStaffOption').innerHTML;
            
            // On ajoute idteam à chaque staff pour Mustache
            let staffData = response.staffs.map(staff => ({
                ...staff,
                idteam: response.idteam
            }));

            // On sépare selon l'état pour pouvoir rendre à la fois ceux séléctionnés et ceux pas séléctionnés
            let staffAssigned = staffData.filter(staff => staff.state === true);
            let staffNotAssigned = staffData.filter(staff => staff.state === false);

            const renderedAssigned = Mustache.render(templateAssigned, staffAssigned);
            const renderedNotAssigned = Mustache.render(templateNotAssigned, staffNotAssigned);

			let containerAssigned = document.getElementById('selectedstafflist' + idEquipe);
            let containerNotAssigned = document.getElementById('notselectedstafflist' + idEquipe);

            containerAssigned.innerHTML = renderedAssigned;
            containerNotAssigned.innerHTML = renderedNotAssigned;

            containerAssigned.querySelectorAll('.delete-staff').forEach(btn => btn.addEventListener('click', e => {
                removeStaffEquipe(e);
            }))

            containerNotAssigned.querySelectorAll('.option-staff').forEach(btn => btn.addEventListener('click', e => {
                addStaffEquipe(e);
            }))
		}
	};

	xhttp.send();
}

// AJAX Equipe à recopier pour les autres

function addEquipe() {

    let nom = document.getElementById("create-team-nom").value; // seulement la première valeure (pas besoin de plus dans les formulaires en front)
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "create-team",
            nom: nom // nom fait référence à let  nom = ... 
        })
    }) // changer action: "create-team" par create-... et nom: nom par titre: ... 
    .then(response => {
        updateEquipe(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}

function removeEquipe(event) {

    let idEquipe = event.target.dataset.id;

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-team",
            id_equipe: idEquipe 
        })
    }) // changer action: "delete-team" par delete-... et l'id. (équivalent dans add)
    .then(response => {
        updateEquipe(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}

function saveEquipe() {

    let id = document.getElementById("id-edit-team").value;
    let nom = document.getElementById("nom-edit-team").value;
    let lien_classement = document.getElementById("lien-classement-edit-team").value;
    let lien_calendrier = document.getElementById("lien-calendrier-edit-team").value;

    // récupérer les valeurs modifiées dans le front (formulaire de modification avec display hidden...)

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "edit-team", // changer les valeurs et actions
            nom: nom,
            id_equipe: id,
            lien_classement: lien_classement,
            lien_calendrier: lien_calendrier
        })
    }) // insérer les valeurs
    .then(response => {
        // actualiser le front
        updateEquipe();
    });
}

function updateEquipe() {

    var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "./php/api/script.php?action=get-teams", true); // remplacer ?action=get-teams par l'action codée dans l'api
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        
		if (this.readyState == 4 && this.status == 200) {
			// Response
			var response = JSON.parse(this.responseText); 
			const template = document.getElementById('templateTeam').innerHTML; // remplacer templateTeam par le template mustache
            const render = Mustache.render(template, {teams : response}); // ne pas toucher
			let container = document.getElementById('container-team'); // remplacer team par article, histoire... ce qui correspond dans le front
            container.innerHTML = render; // ne pas toucher
            console.log(response);
            let editTeamButtons = document.querySelectorAll('.btn-team-edit'); //remplacer team pareil + changer nom de variable ici et dans le foreach
            let deleteTeambuttons = document.querySelectorAll('.btn-team-delete'); // remplacer team

            document.querySelectorAll('.lazy-link').forEach(form => {
                updateStaffEquipe(form.dataset.equipe);
            });

            document.querySelectorAll('.lazy-link-remove').forEach(form => {
                updateStaffEquipe(form.dataset.equipe);
            });

            deleteTeambuttons.forEach(button => {
                button.addEventListener("click", (e) => {
                    removeEquipe(e);
                })
            }) // ici on met des listeners sur les boutons de delete donc juste remplacer les noms de variables et les classes en fonction du front

            editTeamButtons.forEach(button => {
                button.addEventListener("click", () => {
                    let form = document.getElementById("edit-team");
                    let editTeamTitle = document.getElementById('titre-equipe-edit');
                    let formlist = document.querySelectorAll('.edit-simulation-area');

                    let id = button.dataset.id;
                    let nom = button.dataset.nom;
                    let lien_calendrier = button.dataset.lienCalendrier;
                    let lien_classement = button.dataset.lienClassement;

                    formlist.forEach(formItem => {
                        formItem.classList.add("hidden");
                    });
            
                    form.closest('.edit-simulation-area').classList.remove("hidden");

                    document.getElementById("id-edit-team").value = id;
                    document.getElementById("nom-edit-team").value = nom;
                    document.getElementById("lien-calendrier-edit-team").value = lien_calendrier;
                    document.getElementById("lien-classement-edit-team").value = lien_classement; 

                    editTeamTitle.innerHTML = nom;

                    // pareil faut mettre les bonnes valeurs
                });
            });
		};
	};
	xhttp.send();
}

// AJAX Sponsor

function addSponsor() {}
function removeSponsor(event) {}
function saveSponsor() {}
function updateSponsor() {}

// AJAX Joueur

function addJoueur() {}
function removeJoueur(event) {}
function saveJoueur() {}
function updateJoueur() {}

// AJAX Staff

function addStaff() {}
function removeStaff(event) {}
function saveStaff() {}
function updateStaff() {}

// AJAX Histoire

function addHistoire() {}
function removeHistoire(event) {}
function saveHistoire() {}
function updateHistoire() {}

// AJAX Article

function addArticle() {}
function removeArticle(event) {}
function saveArticle() {}
function updateArticle() {}

// INIT

function init() {

    setupListeners();
    //setupAjaxListeners(); <= plus besoin si on fini

    document.querySelectorAll('.lazy-link').forEach(form => {
        updateStaffEquipe(form.dataset.equipe);
    });

    document.querySelectorAll('.lazy-link-remove').forEach(form => {
        updateStaffEquipe(form.dasaset.equipe)
    })

    updateEquipe();
    updateArticle();
    updateHistoire();
    updateJoueur();
    updateStaff();
    updateSponsor();

    //ne pas toucher ici

};

document.addEventListener("DOMContentLoaded", init);