<?php
/**
 * Ce fichier est le template affichant les commentaires pour l'article choisi, et permettant d'effectuer des suppressions.
 * Variable: $comments Array : tableau contenant les commentaires
 */

?>

<div class="comments">
    <h2 class="commentsTitle">Vos Commentaires</h2>
<?php
if (empty($comments)) {
    echo '<p class="info">Aucun commentaire pour cet article.</p>';
} else {
    echo '<table class="commentsTable">';
    echo '<tr><th>Pseudo</th><th>Date</th><th>Commentaire</th><th>Action</th></tr>';
    foreach ($comments as $comment) {
        echo '<tr class="tableLine">';
        echo '<td>'. Utils::format($comment->getPseudo()) .'</td>';
        echo '<td>' . Utils::convertDateToFrenchFormat($comment->getDateCreation()) . '</td>';
        echo '<td>' . Utils::format($comment->getContent()) . '</td>';
        echo '<td><a class="submit" href="index.php?action=deleteComment&id=' . $comment->getId() . '"';
        echo Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?");
        echo '>Supprimer</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
</div>
