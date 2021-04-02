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
    public function edit()
    {
        $title = 'Add category';
        if (isset($_GET['id'])) {
            $category = $this->categoriesTable->findById($_GET['id']);
            $title = 'Edit category';
        }
        return [
            'template' => 'editcate.html.php',
            'title' => $title,
            'variables' => [
                'category' => $category ?? null
            ]
        ];
    }
    public function saveEdit()
    {
        $category = $_POST['cate'];
        $category['updated_at'] = new \DateTime();
        $this->categoriesTable->save($category);
        header('location: ' . URLROOT . 'category/list');
    }
    public function delete()
    {
        $categoryEntity =  $this->categoriesTable->delete($_POST['id']);
        $categoryEntity->clearQuest();
        header('location: ' . URLROOT . 'category/list');
    }
}
