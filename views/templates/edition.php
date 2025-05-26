<?php
/**
 * Affichage de la partie admin : liste des articles avec un bouton "modifier"  / "suprrimer" pour chacun.
 * Et un formulaire pour ajouter un article.
 */
?>
<h2>Edition des articles</h2>

<table class="adminArticle">
    <?php foreach ($articles as $article) { ?>
        <tr class="tableLine">
            <td class="title"><?= $article->getTitle() ?></td>
            <td class="content"><?= $article->getContent(200) ?></td>
            <td><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></td>
            <td><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a></td>
            <td class="commentsModerationCell"><a class="submit" href="index.php?action=moderateComments&id=<?= $article->getId() ?>" >Modérer les commentaires</a></td>
        </tr>
    <?php } ?>
</table>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>

