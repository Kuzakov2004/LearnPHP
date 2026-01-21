<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;

class MainController extends AbstractController
{
    public function main()
    {
        $articles = Article::findAll();
        $isUserAdmin = false;
        if ($this->user !== null) {
            if($this->user->isAdmin()) {
                $isUserAdmin = true;
            }
        }
        
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'isUserAdmin' => $isUserAdmin,
        ]);
    }
}
