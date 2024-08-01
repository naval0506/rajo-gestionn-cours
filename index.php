<?php
include 'db.php';

$sql = "SELECT cours.id, cours.titre, classes.nom as classe, cours.date_creation, cours.contenu_video 
        FROM cours 
        JOIN classes ON cours.classe_id = classes.id";
$result = $conn->query($sql);
?>

<h2>Liste des Cours</h2>
<a href="create.php">Ajouter un nouveau cours</a>
<table border="1">
    <tr>
        <th>Titre</th>
        <th>Classe</th>
        <th>Date de Création</th>
        <th>Contenu Video</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['titre']; ?></td>
        <td><?php echo $row['classe']; ?></td>
        <td><?php echo $row['date_creation']; ?></td>
        <td><a href="<?php echo $row['contenu_video']; ?>">Voir la vidéo</a></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Modifier</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>">Supprimer</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
