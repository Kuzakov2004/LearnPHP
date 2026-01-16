<?php
/*
В экшне ArticlesController::view() после получения статьи, добавьте ещё один запрос на получение автора этой статьи из таблицы users. 
Выведите nickname автора в шаблоне.
*/
namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;


    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }

    public function view(int $articleId)
    {
        $result = $this->db->query(
        'SELECT articles.*, users.nickname 
         FROM `articles` 
         LEFT JOIN `users` ON articles.author_id = users.id 
         WHERE articles.id = :id;',
        [':id' => $articleId]
    );

        if ($result === []) {
        $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $nickname = $this->db->query(
        'SELECT nickname FROM `users` WHERE id = :author_id;',
        [':author_id' => $result[0]['author_id']]
        );

        $this->view->renderHtml('articles/view.php', ['article' => $result[0]]);
    }
}