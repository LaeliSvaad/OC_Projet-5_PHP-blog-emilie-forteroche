<?php
/**
 * Affichage de la partie monitoring : liste des articles que l'on peut trier par titre, nombre de vues,
 * nombre de commentaires, et date de publication.
 * Icônes gratuites utilisées dans ce template: Ui icônes créées par Ehtisham Abid - Flaticon
 */
?>

<h2>Monitoring des articles</h2>
<table class="monitoring">
    <tr>
        <th>
            <div class="theadContent">
                <span>Titre</span>
                <?php if($sort != "title"){
                    echo'<a href="index.php?action=monitorArticles&sort=title&order=ASC" title="Tri croissant par titre">';
                    echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                    echo'</a>';
                    echo'<a href="index.php?action=monitorArticles&sort=title&order=DESC" title="Tri décroissant par titre">';
                    echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                    echo'</a>';
                }
                else{
                    if($order == "ASC"){
                        echo'<a href="index.php?action=monitorArticles&sort=title&order=ASC" title="Tri croissant par titre">';
                        echo'<img class="sortIcon" src="icones/sort-ASC-clicked.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=title&order=DESC" title="Tri décroissant par titre">';
                        echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                    else if($order == "DESC"){
                        echo'<a href="index.php?action=monitorArticles&sort=title&order=ASC" title="Tri croissant par titre">';
                        echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=title&order=DESC" title="Tri décroissant par titre">';
                        echo'<img class="sortIcon" src="icones/sort-DESC-clicked.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                } ?>
            </div
        </th>
        <th>
            <div class="theadContent">
                <span>Vues</span>
                <?php if($sort != "views"){
                    echo'<a href="index.php?action=monitorArticles&sort=views&order=ASC" title="Tri croissant par vues">';
                    echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                    echo'</a>';
                    echo'<a href="index.php?action=monitorArticles&sort=views&order=DESC" title="Tri décroissant par vues">';
                    echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                    echo'</a>';
                }
                else{
                    if($order == "ASC"){
                        echo'<a href="index.php?action=monitorArticles&sort=views&order=ASC" title="Tri croissant par vues">';
                        echo'<img class="sortIcon" src="icones/sort-ASC-clicked.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=views&order=DESC" title="Tri décroissant par vues">';
                        echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                    else if($order == "DESC"){
                        echo'<a href="index.php?action=monitorArticles&sort=views&order=ASC" title="Tri croissant par vues">';
                        echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=views&order=DESC" title="Tri décroissant par vues">';
                        echo'<img class="sortIcon" src="icones/sort-DESC-clicked.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                } ?>
            </div>
        <th>
            <div class="theadContent">
                <span>Commentaires</span>
                <?php if($sort != "commentsNumber"){
                    echo'<a href="index.php?action=monitorArticles&sort=commentsNumber&order=ASC" title="Tri croissant par nombre de commentaires">';
                    echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                    echo'</a>';
                    echo'<a href="index.php?action=monitorArticles&sort=commentsNumber&order=DESC" title="Tri décroissant par nombre de commentaires">';
                    echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                    echo'</a>';
                }
                else{
                    if($order == "ASC"){
                        echo'<a href="index.php?action=monitorArticles&sort=commentsNumber&order=ASC" title="Tri croissant par nombre de commentaires">';
                        echo'<img class="sortIcon" src="icones/sort-ASC-clicked.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=commentsNumber&order=DESC" title="Tri décroissant par nombre de commentaires">';
                        echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                    else if($order == "DESC"){
                        echo'<a href="index.php?action=monitorArticles&sort=commentsNumber&order=ASC" title="Tri croissant par nombre de commentaires">';
                        echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=commentsNumber&order=DESC" title="Tri décroissant par nombre de commentaires">';
                        echo'<img class="sortIcon" src="icones/sort-DESC-clicked.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                } ?>
            </div>
        </th>
        <th>
            <div class="theadContent">
                <span>Publication</span>
                <?php if($sort != "date_creation"){
                    echo'<a href="index.php?action=monitorArticles&sort=date_creation&order=ASC" title="Tri croissant par date de publication">';
                    echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                    echo'</a>';
                    echo'<a href="index.php?action=monitorArticles&sort=date_creation&order=DESC" title="Tri décroissant par date de publication">';
                    echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                    echo'</a>';
                }
                else{
                    if($order == "ASC"){
                        echo'<a href="index.php?action=monitorArticles&sort=date_creation&order=ASC" title="Tri croissant par date de publication">';
                        echo'<img class="sortIcon" src="icones/sort-ASC-clicked.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=date_creation&order=DESC" title="Tri décroissant par date de publication">';
                        echo'<img class="sortIcon" src="icones/sort-DESC.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                    else if($order == "DESC"){
                        echo'<a href="index.php?action=monitorArticles&sort=date_creation&order=ASC" title="Tri croissant par date de publication">';
                        echo'<img class="sortIcon" src="icones/sort-ASC.png" alt="trier-par-ordre-croissant"/>';
                        echo'</a>';
                        echo'<a href="index.php?action=monitorArticles&sort=date_creation&order=DESC" title="Tri décroissant par date de publication">';
                        echo'<img class="sortIcon" src="icones/sort-DESC-clicked.png" alt="trier-par-ordre-decroissant"/>';
                        echo'</a>';
                    }
                } ?>
            </div>
        </th>
    </tr>
    <?php foreach ($articles as $article) { ?>
        <tr class="tableLine">
            <td><?= $article->getTitle() ?></td>
            <td><?= $article->getViews() ?> vues</td>
            <td><?= $article->getCommentsNumber() ?> commentaires</td>
            <td>Publié le <?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
        </tr>
    <?php } ?>
</table>
