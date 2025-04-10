<?php

class MonitoringController{

    /**
     * Affiche la page de monitoring
     * @return void
     */

    public function showMonitoring() : void
    {
        // On vérifie que l'utilisateur est connecté.
       /* $this->checkIfUserIsConnected();*/
        $sort = Utils::request('sort', '');

        $order = Utils::request('order', '');

        // On récupère les articles.
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticles($sort, $order);

        // On affiche la page de monitoring.
        $view = new View("Monitoring");
        $view->render("monitoring", [
            'articles' => $articles
        ]);
    }
}