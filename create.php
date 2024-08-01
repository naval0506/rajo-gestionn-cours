<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $classe_id = $_POST['classe_id'];
    $date_creation = $_POST['date_creation'];
    $contenu_video = $_POST['contenu_video'];

    $sql = "INSERT INTO cours (titre, classe_id, date_creation, contenu_video) 
            VALUES ('$titre', $classe_id, '$date_creation', '$contenu_video')";
    if ($conn->query($sql) === TRUE) {
        echo "Nouveau cours ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$classes_result = $conn->query("SELECT * FROM classes");
?>

<h2>Ajouter un nouveau cours</h2>
<form method="post" action="">
    <label>Titre du cours:</label>
    <input type="text" name="titre" required><br>
    <label>Classe:</label>
    <select name="classe_id" required>
        <?php while ($classe = $classes_result->fetch_assoc()): ?>
            <option value="<?php echo $classe['id']; ?>"><?php echo $classe['nom']; ?></option>
        <?php endwhile; ?>
    </select><br>
    <label>Date de création:</label>
    <input type="date" name="date_creation" required><br>
    <label>Contenu Vidéo (lien):</label>
    <input type="text" name="contenu_video" required><br>
    <button type="submit">Ajouter</button>
</form>
