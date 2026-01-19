<?php 
session_start();

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
            <form action="./php/backoffice.php" method="POST" enctype="multipart/form-data" class="admin-form" style="margin-bottom:30px;">
                <input type="hidden" name="action" value="create-sponsor">
                <div class="form-group"><label>Nom du sponsor</label><input type="text" name="nom"></div>
                <div class="form-group"><label>Lien</label><input type="url" name="lien"></div>
                <button class="btn-admin">Ajouter</button>
            </form>

            <hr style="margin: 30px 0; border:0; border-top:1px solid #ddd;">

            <h3>Liste des sponsors actuels</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Nom</th>
                        <th>Lien Site</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(Database::getInstance()->loadPartners() as $sponsor): ?>
                    <tr>
                        <td><?= $sponsor->image ?? '(img)' ?></td>
                        <td><?= htmlspecialchars($sponsor->nom) ?></td>
                        <td><?= htmlspecialchars($sponsor->logo) ?></td>
                        <td>
                            <button 
                                type="button" 
                                class="action-btn btn-edit btn-partenaire-edit"
                                data-id="<?= $sponsor->id ?>"
                                data-nom="<?= htmlspecialchars($sponsor->nom, ENT_QUOTES) ?>"
                                data-lien="<?= htmlspecialchars($sponsor->logo, ENT_QUOTES) ?>"
                            >Modifier</button>
                            <form method="POST" action="./php/backoffice.php" style="display:inline;">
                                <input type="hidden" name="action" value="delete-partenaire">
                                <input type="hidden" name="id" value="<?= $sponsor->id ?>">
                                <button class="action-btn btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="edit-simulation-area hidden">
                <p class="simulation-title">Modification Partenaire : <span id="titre-partenaire-edit"></span></p>
                <form method="POST" action="./php/backoffice.php" id="edit-partenaire">

                    <input type="hidden" name="action" value="edit-partenaire">
                    <input type="hidden" name="id">

                    <div class="form-group">
                        <label>Nom :</label>
                        <input type="text" name="nom" placeholder="Nom du sponsor">
                    </div>

                    <div class="form-group">
                        <label>Lien :</label>
                        <input type="url" name="lien" placeholder="https://example.com">
                    </div>

                    <div class="form-group">
                        <label>Logo :</label>
                        <input type="file" name="image">
                    </div>
                    
                    <button type="submit" class="btn-admin">Sauvegarder le partenaire</button>
                
                </form>
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
                <form action="./php/backoffice.php" method="POST" enctype="multipart/form-data" class="admin-form">
                    <input type="hidden" name="action" value="create-joueur">
                    <div class="form-group"><label>Nom</label><input type="text" name="nom"></div>
                    <div class="form-group"><label>Prénom</label><input type="text" name="prenom"></div>
                    <div class="form-group">
                        <label>Poste</label>
                        <select name="poste">
                            <option value="Gardien">Gardien</option>
                            <option value="Défenseur">Défenseur</option>
                            <option value="Milieu">Milieu</option>
                            <option value="Attaquant">Attaquant</option>
                        </select>
                    </div>
                    <button class="btn-admin">Ajouter</button>
                </form>

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
                    <tbody>
                        <?php foreach(Database::getInstance()->loadJoueurs() as $joueur): ?>
                        <tr>
                            <td><?= $joueur->photo ?? '(img)' ?></td>
                            <td><?= htmlspecialchars($joueur->nom . ' ' . $joueur->prenom) ?></td>
                            <td><?= htmlspecialchars($joueur->poste) ?></td>
                            <td>
                                <button 
                                    type="button" 
                                    class="action-btn btn-edit btn-joueur-edit"
                                    data-id="<?= $joueur->id ?>"
                                    data-nom="<?= htmlspecialchars($joueur->nom, ENT_QUOTES) ?>"
                                    data-prenom="<?= htmlspecialchars($joueur->prenom, ENT_QUOTES) ?>"
                                    data-poste="<?= htmlspecialchars($joueur->poste, ENT_QUOTES) ?>"
                                >Modifier</button>
                                <form method="POST" action="./php/backoffice.php" style="display:inline;">
                                    <input type="hidden" name="action" value="delete-joueur">
                                    <input type="hidden" name="id" value="<?= $joueur->id ?>">
                                    <button class="action-btn btn-delete">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="edit-simulation-area hidden">
        <p class="simulation-title">Modification Joueur : <span id="titre-joueur-edit"></span></p>
        <form method="POST" action="./php/backoffice.php" id="edit-joueur">
            <input type="hidden" name="action" value="edit-joueur">
            <input type="hidden" name="id">

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" placeholder="Nom du joueur">
            </div>

            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="prenom" placeholder="Prénom du joueur">
            </div>

            <div class="form-group">
                <label>Poste :</label>
                <input type="text" name="poste" placeholder="Gardien, Défenseur, Milieu, Attaquant">
            </div>

            <div class="form-group">
                <label>Photo :</label>
                <input type="file" name="image">
            </div>

            <button type="submit" class="btn-admin">Sauvegarder le joueur</button>
        </form>
    </div>
            </div>
        </details>
        </section>

        <section class="admin-section">
    <h2 class="admin-subtitle">Le Staff Technique</h2>
    <details class="admin-details">
        <summary>Gérer le Staff</summary>
        <div style="padding: 20px;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nom Prénom</th>
                        <th>Rôle</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(Database::getInstance()->loadStaffs() as $staff): ?>
                    <tr>
                        <td><?= htmlspecialchars($staff->nom . ' ' . $staff->prenom) ?></td>
                        <td><?= htmlspecialchars($staff->role) ?></td>
                        <td><?= htmlspecialchars($staff->email) ?></td>
                        <td>
                            <button 
                                type="button" 
                                class="action-btn btn-edit btn-staff-edit"
                                data-id="<?= $staff->id ?>"
                                data-nom="<?= htmlspecialchars($staff->nom, ENT_QUOTES) ?>"
                                data-prenom="<?= htmlspecialchars($staff->prenom, ENT_QUOTES) ?>"
                                data-role="<?= htmlspecialchars($staff->role, ENT_QUOTES) ?>"
                                data-email="<?= htmlspecialchars($staff->email, ENT_QUOTES) ?>"
                            >Modifier</button>
                            <form method="POST" action="./php/backoffice.php" style="display:inline;">
                                <input type="hidden" name="action" value="delete-staff">
                                <input type="hidden" name="id" value="<?= $staff->id ?>">
                                <button class="action-btn btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="edit-simulation-area hidden">
                <p class="simulation-title">Modification Staff : <span id="titre-staff-edit"></span></p>
                    <form method="POST" action="./php/backoffice.php" id="edit-staff">
                        <input type="hidden" name="action" value="edit-staff">
                        <input type="hidden" name="id">

                        <div class="form-group">
                            <label>Nom :</label>
                            <input type="text" name="nom" placeholder="Nom du membre du staff">
                        </div>

                        <div class="form-group">
                            <label>Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom du membre du staff">
                        </div>

                        <div class="form-group">
                            <label>Rôle :</label>
                            <input type="text" name="role" placeholder="Entraîneur, Préparateur, etc.">
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" placeholder="email@example.com">
                        </div>

                        <button type="submit" class="btn-admin">Sauvegarder le staff</button>
                    </form>
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
                    <form action="./php/backoffice.php" method="POST" class="admin-form">
                    <input type="hidden" name="action" value="create-histoire">
                    <div class="form-group"><label>Titre</label><input name="history-name" type="text"></div>
                    <button type="submit" class="btn-admin">Publier</button>
                    </form>

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
                        <tbody>
                            <?php foreach(Database::getInstance()->loadHistories() as $history):?>
                                <tr>
                                    <td><?php echo $history->titre ?></td>
                                    <td><?php echo $history->tranche_de_date ?></td>
                                    <td><?php echo $history->texte ?></td>
                                    <td><?php echo $history->image?></td>
                                    <td> <button 
                                                type="button" 
                                                class="action-btn btn-edit btn-histoire-edit"
                                                data-id="<?php echo htmlspecialchars($history->id, ENT_QUOTES) ?>"
                                                data-titre="<?php echo htmlspecialchars($history->titre, ENT_QUOTES) ?>"
                                                data-tranche_de_date="<?php echo htmlspecialchars($history->tranche_de_date, ENT_QUOTES) ?>"
                                                data-texte="<?php echo htmlspecialchars($history->texte, ENT_QUOTES) ?>"
                                                data-image="<?php echo htmlspecialchars($history->image, ENT_QUOTES) ?>"
                                            >Modifier</button>  <form method="POST" action="./php/backoffice.php">                        
                                            <input type="hidden" name="action" value="delete-histoire">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($history->id, ENT_QUOTES) ?>">
                                            <button class="action-btn btn-delete">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="edit-simulation-area hidden">
                        <p class="simulation-title">Modification Histoire : <span id="titre-histoire-edit"></span></p>
                        <form method="POST" action="./php/backoffice.php" id="edit-history">
                            <input type="hidden" name="action" value="edit-histoire">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label>Titre de l'événement :</label>
                                <input type="text" name="titre" placeholder="Fête du sport">
                            </div>
                            <div class="form-group">
                                <label>Tranche de dates :</label>
                                <input type="text" name="tranche_de_date" placeholder="1920-19">
                            </div>  
                            <div class="form-group">
                                <label>Récit complet :</label>
                                <textarea name="texte" rows="6" placeholder="On va boire un coup...."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image d'illustration :</label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn-admin">Sauvegarder l'histoire</button>
                        </form>
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
                    <form action="./php/backoffice.php" method="POST" class="admin-form">
                        <input type="hidden" name="action" value="create-article">
                        <div class="form-group"><label>Titre</label><input name="article-name" type="text"></div>
                        <button type="submit" class="btn-admin">Publier</button>
                    </form>

                    <br>

                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Taxonomie</th>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(Database::getInstance()->loadArticles() as $article):?>
                                <tr>
                                    <td><?php echo $article->categorie ?></td>
                                    <td><?php echo $article->titre ?></td>
                                    <td><?php echo $article->texte ?></td>
                                    <td><?php echo $article->image?></td>
                                    <td> <button 
                                                type="button" 
                                                class="action-btn btn-edit btn-article-edit"
                                                data-id="<?php echo htmlspecialchars( $article->id, ENT_QUOTES) ?>"
                                                data-titre="<?php echo htmlspecialchars($article->titre, ENT_QUOTES) ?>"
                                                data-taxonomie="<?php echo htmlspecialchars($article->categorie, ENT_QUOTES) ?>"
                                                data-texte="<?php echo htmlspecialchars($article->texte, ENT_QUOTES) ?>"
                                                data-image="<?php echo htmlspecialchars($article->image, ENT_QUOTES) ?>"
                                            >Modifier</button>  <form method="POST" action="./php/backoffice.php">                        
                                            <input type="hidden" name="action" value="delete-article">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($article->id, ENT_QUOTES) ?>">
                                            <button class="action-btn btn-delete">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="edit-simulation-area hidden">
                        <p class="simulation-title">Modification Article : <span id="titre-article-edit"></span></p>
                        <form method="POST" action="./php/backoffice.php" id="edit-article">
                            <input type="hidden" name="action" value="edit-article">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label>Titre de l'événement :</label>
                                <input type="text" name="titre" placeholder="Fête du sport">
                            </div>
                            <div class="form-group">
                                <label>Taxonomie :</label>
                                <input type="text" name="taxonomie" placeholder="Vie du club">
                            </div>  
                            <div class="form-group">
                                <label>Récit complet :</label>
                                <textarea name="texte" rows="6" placeholder="On va boire un coup...."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image d'illustration :</label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn-admin">Sauvegarder l'histoire</button>
                        </form>
                    </div>
        </div>
    </details>
    </section>

    </main>

    <?php include_once __DIR__ . '/php/components/footer.php'; ?>
</body>
</html>

<script id="templateStaff" type="text/html">
    <ul>
        {{#.}}
        <li>
            <div class="delete-staff">
                <button  type="button"
                    data-staffid="{{id}}"
                    data-teamid="{{idteam}}">
                    delete
                </button>
                {{nom}} {{prenom}}
            </div>
        </li>
        {{/.}}
    </ul>
</script>

<script id="templateStaffOption" type="text/html">
    <ul>
        {{#.}}
        <li>
            <button type="button" class="option-staff"
                data-staffid="{{id}}"
                data-teamid="{{idteam}}">
                {{nom}} {{prenom}}
            </button>
        </li>
        {{/.}}
    </ul>
</script>

<!-- template Mustache -->
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
                data-id="{{ id }}"
                >Supprimer
            </button>
        </td>
    </tr>
    {{/teams}}
</script>