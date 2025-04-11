<div class="comments">
    <h2 class="commentsTitle">Vos Commentaires</h2>
<?php
if (empty($comments)) {
    echo '<p class="info">Aucun commentaire pour cet article.</p>';
} else {
    echo '<ul>';
    foreach ($comments as $comment) {
        echo '<li>';
        echo '  <div class="detailComment">';
        echo '      <h3 class="info">Le ' . Utils::convertDateToFrenchFormat($comment->getDateCreation()) . ", " . Utils::format($comment->getPseudo()) . ' a écrit :</h3>';
        echo '      <p class="content">' . Utils::format($comment->getContent()) . '</p>';
        echo '  </div>';
        echo '  <p><a class="submit" href="index.php?action=deleteComment&id=' . $comment->getId() . '"> Supprimer</a></p>';
        echo '</li>';
    }
    echo '</ul>';
}
?>
</div>
