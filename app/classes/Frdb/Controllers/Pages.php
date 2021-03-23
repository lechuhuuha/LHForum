<?php

namespace Frdb\Controllers;

use \Lchh\DatabaseTable;

class Pages
{
    private $questTable;
    private $categoriesTable;
    private $tagsTable;
    private $postFromRendaDb;
    public function __construct(
        DatabaseTable $questTable,
        DatabaseTable $categoriesTable,
        DatabaseTable $tagsTable,
        DatabaseTable $postFromRendaDb
    ) {
        $this->questTable = $questTable;
        $this->categoriesTable = $categoriesTable;
        $this->tagsTable = $tagsTable;
        $this->postFromRendaDb = $postFromRendaDb;
    }
    public function home()
    {

        return [
            'template' => 'quests.html.php',
            'title' => 'Ask forum',
            'variables' => [
                'quests' => $this->questTable->findAll(),
                'categories' => $this->categoriesTable->findAll(),
                'tags' => $this->tagsTable->findAll(),
                'posts' => $this->postFromRendaDb->findAllWithLimit(1, 4)
            ]
        ];
    }
    public function sidebar()
    {
        return [
            'template' => 'sidebar.html.php',
            'title' => 'Home page',
            'variables' => [
                'categories' => $this->categoriesTable->findAll(),
                'tags' => $this->tagsTable->findAll(),
                'posts' => $this->postFromRendaDb->findAllWithLimit(1, 4)
            ]
        ];
    }
}
