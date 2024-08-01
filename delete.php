<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM cours WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Cours supprimé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}
?>
