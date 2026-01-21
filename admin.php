<?php 
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
// est ce que l'administrateur est connecté

if (!isset($_SESSION['admin_id'])) {
    // si non on le dirige vers login
    header("Location: login.php");
    exit(); // et on ne charge pas la page si pas connecté
}
?>

<?php include __DIR__ . "/php/database.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin US Colomiers</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/mustache.min.js" defer></script> 
    <script src="./js/backoffice.js" defer></script> 
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>


<body>

    <?php include_once __DIR__ . '/php/components/header.php'; ?>

    <main class="container admin-container">
        
        <div class="admin-header">
            <h1 class="section-title">Administration du Site</h1>
            <a href="logout.php" class="btn-main">Déconnexion</a></br>
            <p>Gérez les sponsors, équipes et l'histoire du club.</p>
        </div>

    <section class="admin-section">
    <h2 class="admin-subtitle">Nos équipes</h2>
    <details class="admin-details">
        <summary>Gérer les équipes (Ajout / Modif)</summary>
        <div style="padding: 20px;">
            <h3>+ Ajouter une nouvelle équipe</h3>

            <div class="form-group">
                <label>Nom de l'équipe</label>
                <input type="text" id="create-team-nom" name="create-team-nom">
            </div>
            <button type="button" id="create-team" class="btn-admin">Ajouter</button>

            <hr style="margin: 30px 0; border:0; border-top:1px solid #ddd;">

            <h3>Liste des équipes actuelles</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Staff</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="container-team">
                </tbody>
            </table>

                        

                <div class="edit-simulation-area hidden">
                    <p class="simulation-title">Modification Équipe : <span id="titre-team-edit"></span></p>
                    <div id="edit-team" enctype="multipart/form-data">
                        <input type="hidden" id="id-edit-team">
                        <div class="form-group">
                            <label>Nom :</label>
                            <input type="text" id="nom-edit-team" placeholder="Nom de l'équipe">
                        </div>
                        <div class="form-group">
                            <label>Lien classement :</label>
                            <input type="text" id="lien-classement-edit-team" placeholder="Classement">
                        </div>
                        <div class="form-group">
                            <label>Lien calendrier :</label>
                            <input type="text" id="lien-calendrier-edit-team" placeholder="Calendrier">
                        </div>
                        <button id="validate-team-button" type="button" class="btn-admin">Sauvegarder l'équipe</button>
                    </div>
                </div>
            </div>
        </details>
    </section>

    <section class="admin-section">
        <h2 class="admin-subtitle">Nos Sponsors</h2>
        <details class="admin-details">
            <summary>Gérer les Sponsors (Ajout / Modif)</summary>
            <div style="padding: 20px;">
                <h3>+ Ajouter un nouveau sponsor</h3>

                <div class="form-group">
                    <label>Nom du sponsor</label>
                    <input type="text" id="create-sponsor-nom" name="create-sponsor-nom">
                </div>
                <button type="button" id="create-sponsor" class="btn-admin">Ajouter</button>

                <hr style="margin: 30px 0; border:0; border-top:1px solid #ddd;">

                <h3>Liste des sponsors actuels</h3>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Logo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody id="container-sponsor">
                    </tbody>
                </table>
                <div class="edit-simulation-area hidden">
                    <p class="simulation-title">Modification Sponsor : <span id="titre-sponsor-edit"></span></p>
                    <div id="edit-sponsor">
                        <input type="hidden" id="id-edit-sponsor">
                            <div class="form-group">
                                <label>Nom :</label>
                                <input type="text" id="nom-edit-sponsor" placeholder="Nom du Sponsor">
                            </div>
                            <div class="form-group">
                                <label>Logo :</label>
                                <input type="file" name="image" id="image-edit-sponsor">
                            </div>
                        <button id="validate-sponsor-button" type="button" class="btn-admin">Sauvegarder le sponsor</button>
                    </div>
                </div>
                </div>
        </details>
    </section>

    <section class="admin-section">
    <h2 class="admin-subtitle">Les Joueurs</h2>
    <details class="admin-details">
        <summary>Gérer l'effectif Joueurs</summary>
        <div style="padding: 20px;">
            <h3>+ Ajouter un joueur</h3>

            <div class="form-group">
                <label>Nom du Joueur</label>
                <input type="text" id="create-joueur-nom" name="create-joueur-nom">
            </div>
            <button type="button" id="create-joueur" class="btn-admin">Ajouter</button>

            <br>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Identité</th>
                        <th>Poste</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="container-joueur">
                
                </tbody>
            </table>
            <div class="edit-simulation-area hidden">
                <p class="simulation-title">Modification Joueur : <span id="titre-joueur-edit"></span></p>
                <div id="edit-joueur">
                    <input type="hidden" id="id-edit-joueur">
                    <div class="form-group">
                        <label>Nom :</label>
                        <input type="text" id="nom-edit-joueur" placeholder="Nom du joueur">
                    </div>
                    <div class="form-group">
                        <label>Prenom :</label>
                        <input type="text" id="prenom-edit-joueur" placeholder="Prénom du joueur">
                    </div>
                    <div class="form-group">
                        <label>Poste :</label>
                        <input type="text" id="poste-edit-joueur" placeholder="Poste du joueur">
                    </div>
                    <div class="form-group">
                        <label>Photo :</label>
                        <input type="file" name="image" id="image-edit-joueur">
                    </div>
                    <button id="validate-joueur-button" type="button" class="btn-admin">Sauvegarder le joueur</button>
                </div>
            </div>
        </div>
    </details>
    </section>

    <section class="admin-section">
<h2 class="admin-subtitle">Le Staff Technique</h2>
<details class="admin-details">
    <summary>Gérer le Staff</summary>
    <div style="padding: 20px;">
    <h3>+ Ajouter un staff</h3>

<div class="form-group">
    <label>Nom du Staff</label>
    <input type="text" id="create-staff-nom" name="create-staff-nom">
</div>
<button type="button" id="create-staff" class="btn-admin">Ajouter</button>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nom Prénom</th>
                    <th>Rôle</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="container-staff">
            </tbody>
        </table>
        <div class="edit-simulation-area hidden">
            <p class="simulation-title">Modification Staff : <span id="titre-staff-edit"></span></p>
                <div id="edit-staff">
                    <input type="hidden" id="id-edit-staff">
                    <div class="form-group">
                        <label>Nom :</label>
                        <input type="text" id="nom-edit-staff" placeholder="Nom du staff">
                    </div>
                    <div class="form-group">
                        <label>Prenom :</label>
                        <input type="text" id="prenom-edit-staff" placeholder="Prénom du staff">
                    </div>
                    <div class="form-group">
                        <label>Rôle :</label>
                        <input type="text" id="role-edit-staff" placeholder="Rôle du staff">
                    </div>
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" id="email-edit-staff" placeholder="Email du staff">
                    </div>
                    <button id="validate-staff-button" type="button" class="btn-admin">Sauvegarder le staff</button>
                </div>
            </div>
            </div>
        </details>
    </section>

    <section class="admin-section">
        <h2 class="admin-subtitle">Histoire du club</h2>

        <details class="admin-details">
            <summary>Gérer les sections d'histoire du club</summary>
            <div style="padding: 20px;">
                
                <h3>+ Ajouter une histoire</h3>
                <div class="form-group">
                    <label>Titre de l'histoire</label>
                    <input type="text" id="create-histoire-titre" name="create-histoire-titre">
                </div>
                <button type="button" id="create-histoire" class="btn-admin">Ajouter</button>

                <br>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Tranche de dates</th>
                            <th>texte</th>
                            <th>image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="container-histoire">
                        
                    </tbody>
                </table>

                <div class="edit-simulation-area hidden">
                    <p class="simulation-title">Modification Histoire : <span id="titre-histoire-edit"></span></p>
                    <div id="edit-histoire">
                    <input type="hidden" id="id-edit-histoire">
                    <div class="form-group">
                        <label>Titre :</label>
                        <input type="text" id="titre-edit-histoire" placeholder="Titre de l'histoire">
                    </div>
                    <div class="form-group">
                        <label>Dates :</label>
                        <input type="text" id="date-edit-histoire" placeholder="Dates">
                    </div>
                    <div class="form-group">
                        <label>Contenu :</label>
                        <textarea id="contenu-edit-histoire" placeholder="Contenu"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image :</label>
                        <input type="file" id="image-edit-histoire" placeholder="Image de l'histoire">
                    </div>
                    <button id="validate-histoire-button" type="button" class="btn-admin">Sauvegarder l'histoire</button>

                    </div>
                </div>
            </div>
        </details>
    </section>

    <section class="admin-section">
            <h2 class="admin-subtitle">Articles de blogs</h2>

            <details class="admin-details">
                <summary>Gérer les articles de blogs du club</summary>
                <div style="padding: 20px;">
                    
                    <h3>+ Ajouter un article</h3>
                    <div class="form-group">
    <label>Nom de l'article</label>
    <input type="text" id="create-article-titre" name="create-article-titre">
</div>
<button type="button" id="create-article" class="btn-admin">Ajouter</button>


                    <br>

                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Taxonomie</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="container-article">
                        </tbody>
                    </table>

                    <div class="edit-simulation-area hidden">
                        <p class="simulation-title">Modification Article : <span id="titre-article-edit"></span></p>
                        <div id="edit-article">
                            <input type="hidden" id="id-edit-article">
                            <div class="form-group">
                                <label>Titre :</label>
                                <input type="text" id="titre-edit-article" placeholder="Titre de l'article">
                            </div>
                            <div class="form-group">
                                <label>Categorie :</label>
                                <input type="text" id="categorie-edit-article" placeholder="Categorie de l'article">
                            </div>
                            <div class="form-group">
                                <label>Contenu :</label>
                                <textarea type="textarea" id="contenu-edit-article" placeholder="Contenu de l'article"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image :</label>
                                <input type="file" id="image-edit-article" name="image">
                            </div>
                            <button id="validate-article-button" type="button" class="btn-admin">Sauvegarder l'article</button>
                        </div>
                    </div>
                </div>
            </details>
        </section>
    </main>

    <?php include_once __DIR__ . '/php/components/footer.php'; ?>
</body>
</html>

<script id="templateStaffRela" type="text/html">
    <div class="staff-chips-container">
        {{#.}}
            <div class="staff-chip">
                <div class="staff-name">
                    {{nom}} {{prenom}}
                </div>
                <button class="staff-delete-btn" type="button"
                        data-staffid="{{id}}"
                        data-teamid="{{idteam}}">
                        X
                    </button>
            </div>
        {{/.}}
    </div>
</script>

<script id="templateStaffOption" type="text/html">
    <div class="staff-chips-container">    
        {{#.}}
            <button type="button" class="option-staff"
                data-staffid="{{id}}"
                data-teamid="{{idteam}}">
                + {{nom}} {{prenom}}
            </button>
        {{/.}}
    </div>
</script>

<script id="templateTeam" type="text/html">

    {{#teams}}
    <tr>
        <td> {{ nom }} </td>
        <td>
            <form class="lazy-link" data-equipe="{{id}}">
                
                <!-- Ici sont générés les staffs qui ont été séléctionnés -->
            
            </form>

            <div id="selectedstafflist{{id}}">

            </div>

            <div id="notselectedstafflist{{id}}">

            </div> 
        </td>
        <td>
            <button 
                type="button" 
                class="action-btn btn-edit btn-team-edit"
                data-id="{{ id }}"
                data-nom="{{ nom }}"
                data-lien-classement="{{ lien_classement }}"
                data-lien-calendrier="{{ lien_calendrier }}"
                >Modifier
            </button>
            <button
                type="button"
                class="action-btn btn-delete btn-team-delete"
                data-id="{{id}}"
                >Supprimer
            </button>
        </td>
    </tr>
    {{/teams}}
</script>



<script id="templatePartenaire" type="text/html">

    {{#sponsors}}
    <tr>
        <td> {{ nom }} </td>
        <td><img src="./php/api/images/sponsors/{{logo}}" height="50"></td>
        <td>
            <button 
                type="button" 
                class="action-btn btn-edit btn-sponsor-edit"
                data-id="{{ id }}"
                data-nom="{{ nom }}"
                data-image="{{ logo }}"
                >Modifier
            </button>
            <button
                type="button"
                class="action-btn btn-delete btn-sponsor-delete"
                data-id="{{ id }}"
                >Supprimer
            </button>
        </td>
    </tr>
    {{/sponsors}}
</script>

<script id="templateJoueur" type="text/html">

    {{#joueurs}}
    <tr>
        <td> <img src="./php/api/images/joueur/{{photo}}" class="admin-img-preview"> </td>
        <td> {{ nom }} {{ prenom }} </td>
        <td> {{ poste }} </td>
        
        <td>
            <button 
                type="button" 
                class="action-btn btn-edit btn-joueur-edit"
                data-id="{{ id }}"
                data-nom="{{ nom }}"
                data-prenom="{{ prenom }}"
                data-poste="{{ poste }}"
                data-image="{{ photo }}"
                >Modifier
            </button>
            <button
                type="button"
                class="action-btn btn-delete btn-joueur-delete"
                data-id="{{ id }}"
                >Supprimer
            </button>
        </td>
    </tr>
    {{/joueurs}}
</script>

<script id="templateStaff" type="text/html">

    {{#staffs}}
    <tr>
        <td> {{ nom }} {{ prenom }} </td>
        <td> {{ role }} </td>
        <td> {{ email }} </td>
        <td>
            <button 
                type="button" 
                class="action-btn btn-edit btn-staff-edit"
                data-id="{{ id }}"
                data-nom="{{ nom }}"
                data-prenom="{{ prenom }}"
                data-role="{{ role }}"
                data-email="{{ email }}"
                >Modifier
            </button>
            <button
                type="button"
                class="action-btn btn-delete btn-staff-delete"
                data-id="{{ id }}"
                >Supprimer
            </button>
        </td>
    </tr>
    {{/staffs}}
</script>

<script id="templateHistoire" type="text/html">

    {{#histoires}}
    <tr>
        <td> {{ titre }} </td>
        <td>{{ tranche_date }}</td>
        <td> {{ texte }} </td>
        <td>  <img src="./php/api/images/histoire/{{image}}"height="50"> </td>
        <td>
            <button 
                type="button" 
                class="action-btn btn-edit btn-histoire-edit"
                data-id="{{ id }}"
                data-titre="{{ titre }}"
                data-contenu="{{ texte }}"
                data-date="{{ tranche_date }}"
                data-image="{{ image }}"
                >Modifier
            </button>
            <button
                type="button"
                class="action-btn btn-delete btn-histoire-delete"
                data-id="{{ id }}"
                >Supprimer
            </button>
        </td>
    </tr>
    {{/histoires}}
</script>

<script id="templateArticle" type="text/html">

    {{#articles}}
    <tr>
        <td> {{ titre }} </td>
        <td> {{ texte }} </td>
        <td> {{ categorie }} </td>
        <td> <img src="./php/api/images/article/{{image}}" height="50"> </td>
        <td>
            <button 
                type="button" 
                class="action-btn btn-edit btn-article-edit"
                data-id="{{ id }}"
                data-titre="{{ titre }}"
                data-texte="{{ texte }}"
                data-category="{{ categorie }}"
                data-image="{{ image }}"
                >Modifier
            </button>
            <button
                type="button"
                class="action-btn btn-delete btn-article-delete"
                data-id="{{ id }}"
                >Supprimer
            </button>
        </td>
    </tr>
    {{/articles}}
</script>

<!-- il faut recopier templateTeam et la remplacer dans le front -->

<!-- il faut changer le html dans le front pour que ça prenne les bons id / classes -->