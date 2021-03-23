<?php

namespace Frdb\Controllers;

use \Lchh\DatabaseTable;

class Category
{
    private $categoriesTable;
    private $questTable;
    private $tagsTable;
    public function __construct(
        DatabaseTable $categoriesTable,
        DatabaseTable $questTable,
        DatabaseTable $tagsTable
    ) {
        $this->categoriesTable = $categoriesTable;
        $this->questTable = $questTable;
        $this->tagsTable = $tagsTable;
    }
    public function list()
    {
        $totalCate = $this->categoriesTable->total();
        $categories = $this->categoriesTable->findAll();
        return [
            'template' => 'categories.html.php',
            'title' => 'Categories page',
            'variables' => [
                'totalCate' => $totalCate,
                'categories' => $categories
            ]
        ];
    }
}
