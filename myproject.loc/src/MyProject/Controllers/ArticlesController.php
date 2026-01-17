<?php
/*
В экшне ArticlesController::view() после получения статьи, добавьте ещё один запрос на получение автора этой статьи из таблицы users. 
Выведите nickname автора в шаблоне.
*/
namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
        $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
        ]);
    }

    public function edit(int $articleId): void
    {
        /** @var Article $article */
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();
    }

    public function create()
    {   
        $article = new Article;

        $article->setName('Новоя статья название8000');
        $article->setText('Новая статья hfghfghfgh');
        $article->setAuthorId(2);
        $article->save();
    }
}