// Sélectionne tous les boutons "Modifier"

function setupListeners() {

    let editArticleButtons = document.querySelectorAll('.btn-article-edit');
    let editArticleTitle = document.getElementById('titre-article-edit');

    let editHistoireButtons = document.querySelectorAll('.btn-histoire-edit');
    let editHistoireTitle = document.getElementById('titre-histoire-edit');

    let editStaffButtons = document.querySelectorAll('.btn-staff-edit');
    let editStaffTitle = document.getElementById('titre-staff-edit');

    let editJoueurButtons = document.querySelectorAll('.btn-joueur-edit');
    let editJoueurTitle = document.getElementById('titre-joueur-edit');

    let editPartenaireButtons = document.querySelectorAll('.btn-partenaire-edit');
    let editPartenarieTitle = document.getElementById('titre-partenaire-edit');

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
    
            editPartenarieTitle.innerHTML = nom;
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
}

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

    console.log(idStaff, " ", idEquipe);
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

            containerAssigned.querySelectorAll('.staff-delete-btn').forEach(btn => btn.addEventListener('click', e => {
                removeStaffEquipe(e);
            }))

            containerNotAssigned.querySelectorAll('.option-staff').forEach(btn => btn.addEventListener('click', e => {
                addStaffEquipe(e);
            }))

            console.log(response);
		}
	};

	xhttp.send();
}

function setupAjaxListeners() {
    document.querySelectorAll(".option-staff").forEach(option => {
        option.addEventListener("click", (event) => {
            addStaffEquipe(event);
        });
    });
}

function init() {
    setupListeners();
    setupAjaxListeners();


    document.querySelectorAll('.lazy-link').forEach(form => {
        updateStaffEquipe(form.dataset.equipe);
    });

    document.querySelectorAll('.lazy-link-remove').forEach(form => {
        updateStaffEquipe(form.dasaset.equipe)
    })
};

document.addEventListener("DOMContentLoaded", init);