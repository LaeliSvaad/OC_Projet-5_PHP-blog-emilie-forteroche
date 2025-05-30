<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.
        case 'home':
            $articleController = new ArticleController();
            $articleController->showHome();
            break;

        case 'apropos':
            $articleController = new ArticleController();
            $articleController->showApropos();
            break;
        
        case 'showArticle': 
            $articleController = new ArticleController();
            $articleController->showArticle();
            break;

        case 'addArticle':
            $articleController = new ArticleController();
            $articleController->addArticle();
            break;

        case 'addComment':
            $commentController = new CommentController();
            $commentController->addComment();
            break;

        // Section admin & connexion. 
        case 'admin': 
            $adminController = new AdminController();
            $adminController->showAdmin();
            break;

        case 'connectionForm':
            $adminController = new AdminController();
            $adminController->displayConnectionForm();
            break;

        case 'connectUser': 
            $adminController = new AdminController();
            $adminController->connectUser();
            break;

        case 'disconnectUser':
            $adminController = new AdminController();
            $adminController->disconnectUser();
            break;

        case 'showUpdateArticleForm':
            $editionController = new EditionController();
            $editionController->showUpdateArticleForm();
            break;

        case 'updateArticle': 
            $editionController = new EditionController();
            $editionController->updateArticle();
            break;

        case 'deleteArticle':
            $editionController = new EditionController();
            $editionController->deleteArticle();
            break;

        case 'monitorArticles':
            $monitoringController = new MonitoringController();
            $monitoringController->showMonitoring();
            break;

        case 'manageArticles':
            $editionController = new EditionController();
            $editionController->editArticles();
            break;

        case 'moderateComments':
            $commentController = new CommentController();
            $commentController->showComments();
            break;

        case 'deleteComment':
            $commentController = new CommentController();
            $commentController->deleteComment();
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
