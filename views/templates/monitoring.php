<?php
/**
 * Affichage de la partie monitoring : liste des articles que l'on peut trier par titre, nombre de vues,
 * nombre de commentaires, et date de publication.
 */
?>

<h2>Monitoring des articles</h2>
<table class="monitoring">
    <tr>
        <th>
            Titre
            <a href="index.php?action=monitorArticles&sort=title&order=ASC">
                <i class="fa-solid fa-sort-up"></i>
            </a>
            <a href="index.php?action=monitorArticles&sort=title&order=DESC">
                <i class="fa-solid fa-sort-down"></i>
            </a>
        </th>
        <th>
            Vues
            <a href="index.php?action=monitorArticles&sort=views&order=ASC">
                <i class="fa-solid fa-sort-up"></i>
            </a>
            <a href="index.php?action=monitorArticles&sort=views&order=DESC">
                <i class="fa-solid fa-sort-down"></i>
            </a>
        </th>
        <th>
            Commentaires
            <a href="index.php?action=monitorArticles&sort=commentsNumber&order=ASC">
                <i class="fa-solid fa-sort-up"></i>
            </a>
            <a href="index.php?action=monitorArticles&sort=commentsNumber&order=DESC">
                <i class="fa-solid fa-sort-down"></i>
            </a>
        </th>
        <th>
            Date de publication
            <a href="index.php?action=monitorArticles&sort=date_creation&order=ASC">
                <i class="fa-solid fa-sort-up"></i>
            </a>
            <a href="index.php?action=monitorArticles&sort=date_creation&order=DESC">
                <i class="fa-solid fa-sort-down"></i>
            </a>
        </th>
    </tr>
    <?php foreach ($articles as $article) { ?>
        <tr class="monitoringLine">
            <td><?= $article->getTitle() ?></td>
            <td><?= $article->getViews() ?> vues</td>
            <td><?= $article->getCommentsNumber() ?> commentaires</td>
            <td>Publié le <?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
        </tr>
    <?php } ?>
</table>
