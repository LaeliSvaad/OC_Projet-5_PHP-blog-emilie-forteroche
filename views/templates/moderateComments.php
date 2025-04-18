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
        echo '<td><a class="submit" href="index.php?action=deleteComment&id=' . $comment->getId() . '"> Supprimer</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
</div>
