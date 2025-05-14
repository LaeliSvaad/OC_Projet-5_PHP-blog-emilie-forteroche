<?php

class MonitoringController{

    /**
     * Affiche la page de monitoring
     * @return void
     */

    public function showMonitoring() : void
    {
        $sort = Utils::request('sort', 'date_creation');
        $order = Utils::request('order', 'DESC');

        // On récupère les articles.
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticles($sort, $order);

        // On affiche la page de monitoring.
        $view = new View("Monitoring");
        $view->render("monitoring", [
            'articles' => $articles,
            'order' => $order,
            'sort' => $sort
        ]);
    }
}