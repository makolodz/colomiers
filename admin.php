<?php include __DIR__ . "/php/database.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin US Colomiers</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/backoffice.js"></script>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>
<body>

    <?php include_once __DIR__ . '/php/components/header.php'; ?>

    <main class="admin-container">
        
        <div class="admin-header">
            <h1 class="section-title">Administration du Site</h1>
            <p>Gérez les sponsors, équipes et l'histoire du club.</p>
        </div>

        <section class="admin-section">
            <h2 class="admin-subtitle">Nos Sponsors</h2>
            
            <details class="admin-details">
                <summary>Gérer les Sponsors (Ajout / Modif)</summary>
                <div style="padding: 20px;">
                    
                    <h3>+ Ajouter un nouveau sponsor</h3>
                    <form action="#" method="POST" enctype="multipart/form-data" class="admin-form" style="margin-bottom:30px;">
                        <div class="form-group"><label>Nom du sponsor</label><input type="text" name="nom"></div>
                        <div class="form-group"><label>Logo</label><input type="file" name="logo"></div>
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
                            <tr>
                                <td>(img)</td>
                                <td>sponsor</td>
                                <td>SiteSponsor</td>
                                <td>
                                    <button class="action-btn btn-edit">Modifier</button>
                                    <button class="action-btn btn-delete">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="edit-simulation-area">
                        <p class="simulation-title">Modification du sponsor : NIKE</p>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="12">
                            
                            <div class="form-group">
                                <label>Nom du sponsor :</label>
                                <input type="text" name="nom" value="Nike">
                            </div>
                            <div class="form-group">
                                <label>Lien vers le site :</label>
                                <input type="url" name="lien" value="https://www.sponsorSite.com">
                            </div>
                            <div class="form-group">
                                <label>Changer le Logo :</label>
                                <input type="file" name="logo">
                            </div>
                            <button type="submit" class="btn-admin">Enregistrer les modifications</button>
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
                    <form action="#" method="POST" enctype="multipart/form-data" class="admin-form">
                        <div class="form-group"><label>Nom complet</label><input type="text"></div>
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
                            <tr>
                                <td>(img)</td>
                                <td>Mbappe Kylian</td>
                                <td>Attaquant</td>
                                <td><button class="action-btn btn-edit">Modifier</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="edit-simulation-area">
                        <p class="simulation-title">Modification Joueur : MBAPPE KYLIAN</p>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="7">
                            <div class="form-group">
                                <label>Nom :</label> <input type="text" value="Mbappe">
                            </div>
                            <div class="form-group">
                                <label>Prénom :</label> <input type="text" value="Kylian">
                            </div>
                            <div class="form-group">
                                <label>Poste :</label> 
                                <select name="poste">
                                    <option value="Gardien">Gardien</option>
                                    <option value="Défenseur">Défenseur</option>
                                    <option value="Milieu">Milieu</option>
                                    <option value="Attaquant" selected>Attaquant</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Photo :</label> <input type="file" name="photo">
                            </div>
                            <button type="submit" class="btn-admin">Mettre à jour</button>
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
                            <tr>
                                <td>Zidane Zinedine</td>
                                <td>Entraineur Principal</td>
                                <td>zizou@foot.fr</td>
                                <td><button class="action-btn btn-edit">Modifier</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="edit-simulation-area">
                        <p class="simulation-title">Modification Staff : ZIDANE ZINEDINE</p>
                        <form action="#" method="POST">
                            <input type="hidden" name="id" value="99">
                            <div class="form-group">
                                <label>Nom :</label> <input type="text" value="Zidane">
                            </div>
                            <div class="form-group">
                                <label>Prénom :</label> <input type="text" value="Zinedine">
                            </div>
                            <div class="form-group">
                                <label>Rôle :</label> <input type="text" value="Entraîneur Principal">
                            </div>
                            <div class="form-group">
                                <label>Email :</label> <input type="email" value="zizou@us-colomiers.fr">
                            </div>
                            <button type="submit" class="btn-admin">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </details>
        </section>

        <section class="admin-section">
            <h2 class="admin-subtitle">Histoires du Club</h2>

            <details class="admin-details">
                <summary>Gérer les Histoires / Dates clés</summary>
                <div style="padding: 20px;">
                    
                    <h3>+ Ajouter une date clé</h3>
                    <form action="#" method="POST" class="admin-form">
                        <div class="form-group"><label>Titre</label><input type="text"></div>
                        <button class="btn-admin">Publier</button>
                    </form>

                    <br>

                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Période</th>
                                <th>Titre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1936</td>
                                <td>Fondation du club</td>
                                <td><button class="action-btn btn-edit">Modifier</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="edit-simulation-area">
                        <p class="simulation-title">Modification Histoire : FONDATION DU CLUB</p>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="1">
                            
                            <div class="form-group">
                                <label>Titre de l'événement :</label>
                                <input type="text" name="titre" value="Fondation du club">
                            </div>
                            <div class="form-group">
                                <label>Période / Date (ex: 1990-2000) :</label>
                                <input type="text" name="date" value="1936">
                            </div>  
                            <div class="form-group">
                                <label>Récit complet :</label>
                                <textarea name="texte" rows="6">Tout a commencé en 1936 lorsque...</textarea>
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
                                    <td> <!-- <= insérer un display flex ici-->
                                        <!-- Bouton "Modifier" -->
                                            <button 
                                                type="button" 
                                                class="action-btn btn-edit btn-article-edit"
                                                data-id="<?php echo htmlspecialchars($article->id, ENT_QUOTES) ?>"
                                                data-titre="<?php echo htmlspecialchars($article->titre, ENT_QUOTES) ?>"
                                                data-taxonomie="<?php echo htmlspecialchars($article->categorie, ENT_QUOTES) ?>"
                                                data-texte="<?php echo htmlspecialchars($article->texte, ENT_QUOTES) ?>"
                                            >Modifier</button>  <!-- les data-id.... servent pour que le js puisse écrire dans la section modifier les bonnes valeurs-->
                                        <form method="POST" action="./php/backoffice.php">                        
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
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <label>Titre de l'événement :</label>
                                <input type="text" name="titre" placeholder="Fête du sport">
                            </div>
                            <div class="form-group">
                                <label>Taxonomie :</label>
                                <input type="text" name="taxonomie" placeholder="Vie du club" value="">
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