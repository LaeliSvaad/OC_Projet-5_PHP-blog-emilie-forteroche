<?php

/**
 * Classe qui gère les articles.
 */
class ArticleManager extends AbstractEntityManager 
{
    /**
     * Récupère tous les articles.
     * @return array : un tableau d'objets Article.
     */
    public function getAllArticles() : array
    {
        $sort = Utils::request("sort");
        $order = Utils::request("order");

        if($order === "ASC")
            $sql = "SELECT article.*, COUNT(comment.content) AS commentsNumber FROM article LEFT JOIN comment ON article.id = comment.id_article GROUP BY article.id ORDER BY $sort ASC";
        else if($order === "DESC")
            $sql = "SELECT article.*, COUNT(comment.content) AS commentsNumber FROM article LEFT JOIN comment ON article.id = comment.id_article GROUP BY article.id ORDER BY $sort DESC";
        else
            $sql = "SELECT article.*, COUNT(comment.content) AS commentsNumber FROM article LEFT JOIN comment ON article.id = comment.id_article GROUP BY article.id";
        $result = $this->db->query($sql);

        $articles = [];

        while ($article = $result->fetch()) {
            $articles[] = new Article($article);
        }
        return $articles;
    }

    /**
     * Récupère un article par son id.
     * @param int $id : l'id de l'article.
     * @return Article|null : un objet Article ou null si l'article n'existe pas.
     */
    public function getArticleById(int $id) : ?Article
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $article = $result->fetch();
        if ($article) {
            return new Article($article);
        }
        return null;
    }

    /**
     * Ajoute ou modifie un article.
     * On sait si l'article est un nouvel article car son id sera -1.
     * @param Article $article : l'article à ajouter ou modifier.
     * @return void
     */
    public function addOrUpdateArticle(Article $article) : void 
    {
        if ($article->getId() == -1) {
            $this->addArticle($article);
        } else {
            $this->updateArticle($article);
        }
    }

    /**
     * Ajoute un article.
     * @param Article $article : l'article à ajouter.
     * @return void
     */
    public function addArticle(Article $article) : void
    {
        $sql = "INSERT INTO article (id_user, title, content, views_counter, date_creation, date_update) VALUES (:id_user, :title, :content, 0, NOW(), NOW())";
        $this->db->query($sql, [
            'id_user' => $article->getIdUser(),
            'title' => $article->getTitle(),
            'content' => $article->getContent()
        ]);
    }

    /**
     * Modifie un article.
     * @param Article $article : l'article à modifier.
     * @return void
     */
    public function updateArticle(Article $article) : void
    {
        $sql = "UPDATE article SET title = :title, content = :content, date_update = NOW() WHERE id = :id";
        $this->db->query($sql, [
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'id' => $article->getId()
        ]);
    }

    /**
     * Modifie la valeur du compteur de vue d'un article en ajoutant +1 à la valeur existante.
     * @param Article $article  : l'article dont le compteur de vues doit être incrémenté.
     * @return void
     */
    public function updateArticleViewsCounter(Article $article) : void
    {
        $sql = "UPDATE article SET views_counter = views_counter + 1 WHERE id = :id";
        $this->db->query($sql, [
            'id' => $article->getId()
        ]);
    }

    /**
     * Supprime un article.
     * @param int $id : l'id de l'article à supprimer.
     * @return void
     */
    public function deleteArticle(int $id) : void
    {
        $sql = "DELETE FROM article WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }
}