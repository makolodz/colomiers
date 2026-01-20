// VARIABLES GLOBALES

let formlist;

// PAS DU AJAX JUSTE DU DISPLAY : NONE POUR LA MODIFICATION DES MENUS

function setupListeners() {

    let addTeamButton = document.getElementById("create-team");

    addTeamButton.addEventListener("click", addEquipe);

    let validateTeamButton = document.getElementById("validate-team-button");

    validateTeamButton.addEventListener("click", saveEquipe);

    // adapter ce code à chaque entrées

    let addSponsorButton = document.getElementById("create-sponsor");

    addSponsorButton.addEventListener("click", addSponsor);

    let validateSponsorButton = document.getElementById("validate-sponsor-button");

    validateSponsorButton.addEventListener("click", saveSponsor);

    // joueur

    let addJoueurButton = document.getElementById("create-joueur");

    addJoueurButton.addEventListener("click", addJoueur);

    let validateJoueurButton = document.getElementById("validate-joueur-button");

    validateJoueurButton.addEventListener("click", saveJoueur); 


    // staff

    let addStaffButton = document.getElementById("create-staff");

    addStaffButton.addEventListener("click", addStaff);

    let validateStaffButton = document.getElementById("validate-staff-button");

    validateStaffButton.addEventListener("click", saveStaff); 

    
    // histoire

    let addHistoireButton = document.getElementById("create-histoire");

    addHistoireButton.addEventListener("click", addHistoire);

    let validateHistoireButton = document.getElementById("validate-histoire-button");

    validateHistoireButton.addEventListener("click", saveHistoire); 

    
    // article

    let addArticleButton = document.getElementById("create-article");

    addArticleButton.addEventListener("click", addArticle);

    let validateArticleButton = document.getElementById("validate-article-button");

    validateArticleButton.addEventListener("click", saveArticle); 

}

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

}

function removeStaffEquipe(event) {

    let idStaff = event.target.dataset.staffid;
    let idEquipe = event.target.dataset.teamid;
    
    console.log(idStaff, "help" ,idEquipe)

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
		
			const templateAssigned = document.getElementById('templateStaffRela').innerHTML;
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

            containerAssigned.querySelectorAll('.staff-delete-btn').forEach(btn => btn.addEventListener('click', e => {
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

    let id = event.target.dataset.id;

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-team",
            id_team: id,
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
            id: id,
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
                    let editTeamTitle = document.getElementById('titre-team-edit');
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

function addSponsor() {
    let nom = document.getElementById("create-sponsor-nom").value; // seulement la première valeure (pas besoin de plus dans les formulaires en front)
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "create-partenaire",
            nom: nom // nom fait référence à let  nom = ... 
        })
    }) // changer action: "create-team" par create-... et nom: nom par titre: ... 
    .then(response => {
        updateSponsor(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });

    
}
function removeSponsor(event) {
    let id = event.target.dataset.id;
    console.log(id);
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-partenaire",
            id: id,
        })
    }) // changer action: "delete-team" par delete-... et l'id. (équivalent dans add)
    .then(response => {
        updateSponsor(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function saveSponsor() {

    let id = document.getElementById("id-edit-sponsor").value;
    let nom = document.getElementById("nom-edit-sponsor").value;
    let image = document.getElementById("image-edit-sponsor").files[0];

    let formData = new FormData();
    formData.append("action", "edit-partenaire");
    formData.append("id", id);
    formData.append("nom", nom);

    if (image) {
        formData.append("image", image);
    }

    fetch("./php/api/script.php", {
        method: "POST",
        body: formData // PAS de Content-Type ici !
    })
    .then(response => response.json())
    .then(data => {
        updateSponsor();
    })
}
function updateSponsor() {
    var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "./php/api/script.php?action=get-partenaires", true); // remplacer ?action=get-teams par l'action codée dans l'api
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        
		if (this.readyState == 4 && this.status == 200) {
			// Response
			var response = JSON.parse(this.responseText); 
			const template = document.getElementById('templatePartenaire').innerHTML; // remplacer templateTeam par le template mustache
            const render = Mustache.render(template, {sponsors : response}); // ne pas toucher
			let container = document.getElementById('container-sponsor'); // remplacer team par article, histoire... ce qui correspond dans le front
            container.innerHTML = render; // ne pas toucher
            let editTeamButtons = document.querySelectorAll('.btn-sponsor-edit'); //remplacer team pareil + changer nom de variable ici et dans le foreach
            let deleteTeambuttons = document.querySelectorAll('.btn-sponsor-delete'); // remplacer team

            deleteTeambuttons.forEach(button => {
                button.addEventListener("click", (e) => {
                    removeSponsor(e);
                })
            }) // ici on met des listeners sur les boutons de delete donc juste remplacer les noms de variables et les classes en fonction du front

            editTeamButtons.forEach(button => {
                button.addEventListener("click", () => {
                    let form = document.getElementById("edit-sponsor");
                    let editSponsorTitle = document.getElementById('titre-sponsor-edit');
                    let formlist = document.querySelectorAll('.edit-simulation-area');

                    let id = button.dataset.id;
                    let nom = button.dataset.nom;
                    let image = button.dataset.image;

                    formlist.forEach(formItem => {
                        formItem.classList.add("hidden");
                    });

                    form.closest('.edit-simulation-area').classList.remove("hidden");

                    document.getElementById("id-edit-sponsor").value = id;
                    document.getElementById("nom-edit-sponsor").value = nom;
                    document.getElementById("image-edit-sponsor").files[0] = image;

                    editSponsorTitle.innerHTML = nom;

                    // pareil faut mettre les bonnes valeurs
                });
            });
		};
	};
	xhttp.send();
}

// AJAX Joueur

function addJoueur() {
    let nom = document.getElementById("create-joueur-nom").value; // seulement la première valeure (pas besoin de plus dans les formulaires en front)
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "create-joueur",
            nom: nom // nom fait référence à let  nom = ... 
        })
    }) // changer action: "create-team" par create-... et nom: nom par titre: ... 
    .then(response => {
        updateJoueur(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function removeJoueur(event) {
    let idJoueur = event.target.dataset.id;

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-joueur",
            id_joueur: idJoueur 
        })
    }) // changer action: "delete-team" par delete-... et l'id. (équivalent dans add)
    .then(response => {
        updateJoueur(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function saveJoueur() {

    let id = document.getElementById("id-edit-joueur").value;
    let nom = document.getElementById("nom-edit-joueur").value;
    let prenom = document.getElementById("prenom-edit-joueur").value;
    let poste = document.getElementById("poste-edit-joueur").value;
    let image = document.getElementById("image-edit-joueur").files[0];


    let formData = new FormData();
    formData.append("action", "edit-joueur");
    formData.append("id", id);
    formData.append("nom", nom);
    formData.append("prenom", prenom);
    formData.append("poste", poste);

    if (image) {
        formData.append("image", image);
    }

    fetch("./php/api/script.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        updateJoueur();
    })
}
function updateJoueur() {
    
    var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "./php/api/script.php?action=get-joueurs", true); // remplacer ?action=get-teams par l'action codée dans l'api
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        
		if (this.readyState == 4 && this.status == 200) {
			// Response
			var response = JSON.parse(this.responseText); 
			const template = document.getElementById('templateJoueur').innerHTML; // remplacer templateTeam par le template mustache
            const render = Mustache.render(template, {joueurs : response}); // ne pas toucher
			let container = document.getElementById('container-joueur'); // remplacer team par article, histoire... ce qui correspond dans le front
            container.innerHTML = render; // ne pas toucher
            let editButtons = document.querySelectorAll('.btn-joueur-edit'); //remplacer team pareil + changer nom de variable ici et dans le foreach
            let deletebuttons = document.querySelectorAll('.btn-joueur-delete'); // remplacer team

            deletebuttons.forEach(button => {
                button.addEventListener("click", (e) => {
                    removeJoueur(e);
                })
            }) // ici on met des listeners sur les boutons de delete donc juste remplacer les noms de variables et les classes en fonction du front

            editButtons.forEach(button => {
                button.addEventListener("click", () => {
                    let form = document.getElementById("edit-joueur");
                    let editTitle = document.getElementById('titre-joueur-edit');
                    let formlist = document.querySelectorAll('.edit-simulation-area');

                    let id = button.dataset.id;
                    let nom = button.dataset.nom;
                    let prenom = button.dataset.prenom;
                    let poste = button.dataset.poste;

                    formlist.forEach(formItem => {
                        formItem.classList.add("hidden");
                    });
            
                    form.closest('.edit-simulation-area').classList.remove("hidden");

                    document.getElementById("id-edit-joueur").value = id;
                    document.getElementById("nom-edit-joueur").value = nom;
                    document.getElementById("prenom-edit-joueur").value = prenom;
                    document.getElementById("poste-edit-joueur").value = poste;

                    editTitle.innerHTML = nom;

                    // pareil faut mettre les bonnes valeurs
                });
            });
		};
	};
	xhttp.send();
}

// AJAX Staff

function addStaff() {
    let nom = document.getElementById("create-staff-nom").value; // seulement la première valeure (pas besoin de plus dans les formulaires en front)
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "create-staff",
            nom: nom // nom fait référence à let  nom = ... 
        })
    }) // changer action: "create-team" par create-... et nom: nom par titre: ... 
    .then(response => {
        updateStaff(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function removeStaff(event) {
    let id = event.target.dataset.id;

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-staff",
            id_staff: id // j'ai arrété de nommer l'id ça fait 1 de moins a remplacer 
        })
    })
    .then(response => {
        updateStaff(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function saveStaff() {
    let id = document.getElementById("id-edit-staff").value;
    let nom = document.getElementById("nom-edit-staff").value;
    let prenom = document.getElementById("prenom-edit-staff").value;
    let role = document.getElementById("role-edit-staff").value;
    let email = document.getElementById("email-edit-staff").value;

    

    // récupérer les valeurs modifiées dans le front (formulaire de modification avec display hidden...)

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "edit-staff", // changer les valeurs et actions
            nom: nom,
            id: id,
            prenom: prenom,
            role: role,
            email: email,
        })
    }) // insérer les valeurs
    .then(response => {
        // actualiser le front
        updateStaff();
    });
}
function updateStaff() {

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./php/api/script.php?action=get-staffs", true); // remplacer ?action=get-teams par l'action codée dans l'api
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        
		if (this.readyState == 4 && this.status == 200) {
			// Response
			var response = JSON.parse(this.responseText); 
			const template = document.getElementById('templateStaff').innerHTML; // remplacer templateTeam par le template mustache
            const render = Mustache.render(template, {staffs : response}); // ne pas toucher
			let container = document.getElementById('container-staff'); // remplacer team par article, histoire... ce qui correspond dans le front
            container.innerHTML = render; // ne pas toucher
            let editButtons = document.querySelectorAll('.btn-staff-edit'); //remplacer team pareil + changer nom de variable ici et dans le foreach
            let deletebuttons = document.querySelectorAll('.btn-staff-delete'); // remplacer team

            deletebuttons.forEach(button => {
                button.addEventListener("click", (e) => {
                    removeStaff(e);
                })
            }) // ici on met des listeners sur les boutons de delete donc juste remplacer les noms de variables et les classes en fonction du front

            editButtons.forEach(button => {
                button.addEventListener("click", () => {
                    let form = document.getElementById("edit-staff");
                    let editTitle = document.getElementById('titre-staff-edit');
                    let formlist = document.querySelectorAll('.edit-simulation-area');

                    let id = button.dataset.id;
                    let nom = button.dataset.nom;
                    let prenom = button.dataset.prenom;
                    let role = button.dataset.role;
                    let email = button.dataset.email;

                    formlist.forEach(formItem => {
                        formItem.classList.add("hidden");
                    });
            
                    form.closest('.edit-simulation-area').classList.remove("hidden");

                    document.getElementById("id-edit-staff").value = id;
                    document.getElementById("nom-edit-staff").value = nom;
                    document.getElementById("prenom-edit-staff").value = prenom;
                    document.getElementById("role-edit-staff").value = role;
                    document.getElementById("email-edit-staff").value = email;

                    editTitle.innerHTML = nom;

                    // pareil faut mettre les bonnes valeurs
                });
            });
		};
	};
	xhttp.send();
}

// AJAX Histoire

function addHistoire() {

    console.log("exec")
    let titre = document.getElementById("create-histoire-titre").value; // seulement la première valeure (pas besoin de plus dans les formulaires en front)
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "create-histoire",
            titre: titre // nom fait référence à let  nom = ... 
        })
    }) // changer action: "create-team" par create-... et nom: nom par titre: ... 
    .then(response => {
        updateHistoire(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function removeHistoire(event) {
    let id = event.target.dataset.id;

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-histoire",
            id: id // j'ai arrété de nommer l'id ça fait 1 de moins a remplacer 
        })
    })
    .then(response => {
        updateHistoire(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function saveHistoire() {
    let id = document.getElementById("id-edit-histoire").value;
    let titre = document.getElementById("titre-edit-histoire").value;
    let image = document.getElementById("image-edit-histoire").files[0];
    let contenu = document.getElementById("contenu-edit-histoire").value;
    let date = document.getElementById("date-edit-histoire").value;
    
    let formData = new FormData();
    formData.append("action", "edit-histoire");
    formData.append("id", id);
    formData.append("titre", titre);
    formData.append("contenu", contenu);
    formData.append("date", date);

    if (image) {
        formData.append("image", image);
    }

    fetch("./php/api/script.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        updateHistoire();
    });
}
function updateHistoire() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./php/api/script.php?action=get-histoires", true); // remplacer ?action=get-teams par l'action codée dans l'api
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        
		if (this.readyState == 4 && this.status == 200) {
			// Response
			var response = JSON.parse(this.responseText); 
			const template = document.getElementById('templateHistoire').innerHTML; // remplacer templateTeam par le template mustache
            const render = Mustache.render(template, {histoires : response}); // ne pas toucher
			let container = document.getElementById('container-histoire'); // remplacer team par article, histoire... ce qui correspond dans le front
            container.innerHTML = render; // ne pas toucher
            let editButtons = document.querySelectorAll('.btn-histoire-edit'); //remplacer team pareil + changer nom de variable ici et dans le foreach
            let deletebuttons = document.querySelectorAll('.btn-histoire-delete'); // remplacer team

            deletebuttons.forEach(button => {
                button.addEventListener("click", (e) => {
                    removeHistoire(e);
                })
            }) // ici on met des listeners sur les boutons de delete donc juste remplacer les noms de variables et les classes en fonction du front

            editButtons.forEach(button => {
                button.addEventListener("click", () => {
                    let form = document.getElementById("edit-histoire");
                    let editTitle = document.getElementById('titre-histoire-edit');
                    let formlist = document.querySelectorAll('.edit-simulation-area');

                    let id = button.dataset.id;
                    let titre = button.dataset.titre;
                    let contenu = button.dataset.contenu;
                    let date = button.dataset.date;

                    formlist.forEach(formItem => {
                        formItem.classList.add("hidden");
                    });
            
                    form.closest('.edit-simulation-area').classList.remove("hidden");

                    document.getElementById("id-edit-histoire").value = id;
                    document.getElementById("titre-edit-histoire").value = titre;
                    document.getElementById("contenu-edit-histoire").value = contenu;
                    document.getElementById("date-edit-histoire").value = date;

                    editTitle.innerHTML = titre;

                    // pareil faut mettre les bonnes valeurs
                });
            });
		};
	};
	xhttp.send();
}

// AJAX Article

function addArticle() {
    let titre = document.getElementById("create-article-titre").value; // seulement la première valeure (pas besoin de plus dans les formulaires en front)
    
    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "create-article",
            titre: titre // nom fait référence à let  nom = ... 
        })
    }) // changer action: "create-team" par create-... et nom: nom par titre: ... 
    .then(response => {
        updateArticle(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function removeArticle(event) {
    let id = event.target.dataset.id;

    fetch("./php/api/script.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            action: "delete-article",
            id_article: id // j'ai arrété de nommer l'id ça fait 1 de moins a remplacer 
        })
    })
    .then(response => {
        updateArticle(); //update le front sur les données une fois qu'on a ajouté updateArticle() ....
    });
}
function saveArticle() {
    let id = document.getElementById("id-edit-article").value;
    let titre = document.getElementById("titre-edit-article").value;
    let image = document.getElementById("image-edit-article").files[0];
    let contenu = document.getElementById("contenu-edit-article").value;
    let categorie = document.getElementById("categorie-edit-article").value;

    let formData = new FormData();
    formData.append("action", "edit-article");
    formData.append("id", id);
    formData.append("titre", titre);
    formData.append("categorie", categorie);
    formData.append("contenu", contenu);

    if (image) {
        formData.append("image", image);
    }

    fetch("./php/api/script.php", {
        method: "POST",
        body: formData // PAS de Content-Type ici !
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // debug
        updateArticle();
    })
}
function updateArticle() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./php/api/script.php?action=get-articles", true); // remplacer ?action=get-teams par l'action codée dans l'api
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        
		if (this.readyState == 4 && this.status == 200) {
			// Response
			var response = JSON.parse(this.responseText); 
			const template = document.getElementById('templateArticle').innerHTML; // remplacer templateTeam par le template mustache
            const render = Mustache.render(template, {articles : response}); // ne pas toucher
			let container = document.getElementById('container-article'); // remplacer team par article, histoire... ce qui correspond dans le front
            container.innerHTML = render; // ne pas toucher
            let editButtons = document.querySelectorAll('.btn-article-edit'); //remplacer team pareil + changer nom de variable ici et dans le foreach
            let deletebuttons = document.querySelectorAll('.btn-article-delete'); // remplacer team

            deletebuttons.forEach(button => {
                button.addEventListener("click", (e) => {
                    removeArticle(e);
                })
            }) // ici on met des listeners sur les boutons de delete donc juste remplacer les noms de variables et les classes en fonction du front

            editButtons.forEach(button => {
                button.addEventListener("click", () => {
                    let form = document.getElementById("edit-article");
                    let editTitle = document.getElementById('titre-article-edit');
                    let formlist = document.querySelectorAll('.edit-simulation-area');

                    let id = button.dataset.id;
                    let titre = button.dataset.titre;
                    let contenu = button.dataset.contenu;
                    let category = button.dataset.category;

                    formlist.forEach(formItem => {
                        formItem.classList.add("hidden");
                    });
            
                    form.closest('.edit-simulation-area').classList.remove("hidden");

                    document.getElementById("id-edit-article").value = id;
                    document.getElementById("titre-edit-article").value = titre;
                    document.getElementById("contenu-edit-article").value = contenu;
                    document.getElementById("categorie-edit-article").value = category;
 
                    editTitle.innerHTML = titre;

                    // pareil faut mettre les bonnes valeurs
                });
            });
		};
	};
	xhttp.send();
}

// INIT

function init() {

    setupListeners();
    //setupAjaxListeners(); <= plus besoin si on fini

    document.querySelectorAll('.lazy-link').forEach(form => {
        updateStaffEquipe(form.dataset.equipe);
    });

    document.querySelectorAll('.lazy-link-remove').forEach(form => {
        updateStaffEquipe(form.dataset.equipe)
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