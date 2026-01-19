<?php
require_once __DIR__ . '/database.php';

$database = Database::getInstance()->getConnection();

// récupération catégorie envoyée par AJAX
$categorie = $_GET['categorie'] ?? '';

$sql = "SELECT * FROM article";
$params = [];

/* ===== ICI LE WHERE ===== */
if ($categorie !== '') {
    $sql .= " WHERE categorie = :categorie";
    $params[':categorie'] = $categorie;
}
/* ======================= */

$sql .= " ORDER BY date_publication DESC";

$stmt = $database->prepare($sql);
$stmt->execute($params);

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$articles) {
    echo "<p>Aucune actualité trouvée.</p>";
    exit;
}

foreach ($articles as $article) {
    echo "
    <div class='actualites-item' data-categorie='{$article['categorie']}'>
        <div class='actualites-image'>
            <img src='{$article['image']}' alt='Image article'>
        </div>
        <p>{$article['titre']}</p>
    </div>
    ";
}
