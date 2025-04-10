<?php
/**
 * Affichage de la partie monitoring : liste des articles que l'on peut trier par nombre de vues,
 * nombre de commentaires, et date de publication.
 */
?>

<h2>Monitoring des articles</h2>

<div class="adminArticle">
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine">
            <div class="title"><?= $article->getTitle() ?></div>
            <div class="views"><?= $article->getViews() ?> vues</div>
            <div class="commentsNumber"><?= $article->getCommentsNumber() ?> commentaires</div>
            <div class="creationDate">Publié le <?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?> </div>
        </div>
    <?php } ?>
</div>
