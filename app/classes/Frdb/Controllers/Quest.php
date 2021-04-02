<?php

namespace Frdb\Controllers;

use \Lchh\DatabaseTable;
use \Lchh\Authentication;
use \Lchh\CountOnl;

class Quest
{
    private $questTable;
    private $categoriesTable;
    private $tagsTable;
    private $category_questionsTable;
    private $CountOnl;

    public function __construct(
        DatabaseTable $questTable,
        DatabaseTable $categoriesTable,
        DatabaseTable $tagsTable,
        DatabaseTable $category_questionsTable,
        CountOnl $CountOnl


    ) {
        $this->questTable = $questTable;
        $this->categoriesTable = $categoriesTable;
        $this->tagsTable = $tagsTable;
        $this->category_questionsTable = $category_questionsTable;
        $this->CountOnl = $CountOnl;
    }
    public function list()
    {
        if (isset($_GET['category'])) {
            $category = $this->categoriesTable->findById($_GET['category']);
            $quests = $category->getQuests()['quests'];
        } elseif (isset($_GET['tag'])) {
            $tag = $this->tagsTable->findById($_GET['tag']);
            $quests = $tag->getQuests()['quests'];
        } else {
            $quests = $this->questTable->findAll();
        }
        $totalQuests = $this->questTable->total();
        return [
            'template' => 'quests.html.php',
            'title' => 'Ask forum',
            'variables' => [
                'totalQuests' => $totalQuests,
                'quests' => $quests,
                'categories' => $this->categoriesTable->findAll() ?? null
            ]
        ];
    }
    public function edit()
    {
        $categories = $this->categoriesTable->findAll();
        $tags = $this->tagsTable->findAll();
        $title = 'Ask quest';
        if (isset($_GET['id'])) {
            $quest = $this->questTable->findById($_GET['id']);
            $title = 'Edit quest';
        }
        return [
            'template' => 'editquest.html.php',
            'title' => $title,
            'variables' => [
                'quest' => $quest ?? null,
                'categories' => $categories ?? null,
                'tags' => $tags ?? null
            ]
        ];
    }
    public function detail()
    {

        $title = 'Quest detail';

        if (isset($_GET['id'])) {
            $quest = $this->questTable->findById($_GET['id']);
            $uvon = $this->CountOnl->getRemoteAddr();

            $inactive = 120;
            if (!isset($_SESSION['expire'])) $_SESSION['expire'] = time() + $inactive;
            if ($this->CountOnl->isBotDetected()) {
                return;
            } else if (isset($quest->views) && intval($quest->views) == 0) {
                $quest->inscView(intval($quest->views) + 1);
            } elseif (isset($uvon) && time() > $_SESSION['expire']) {
                $quest->inscView(intval($quest->views) + 1);
                unset($_SESSION['expire']);
            }
        }
        return [
            'template'  => 'questdetail.html.php',
            'title' => $title,
            'variables' => [
                'quest' => $quest ?? null,

            ]
        ];
    }
    public function saveEdit()
    {
        // if (isset($_GET['id'])) {
        //     $quest = $this->questTable->findById($_GET['id']);
        // }
        $quest = $_POST['quest'];
        $quest['updated_at'] = new \DateTime();

        $questEntity =  $this->questTable->save($quest);
        $questEntity->clearCategories();
        foreach ($_POST['category'] as $category) {
            $questEntity->addCategory($category);
        }
        $questEntity->clearTags();
        foreach ($_POST['tag'] as $tag) {
            $questEntity->addTag($tag);
        }
        header('location: ' . URLROOT . 'quest/list');
    }
    public function delete()
    {
        $this->questTable->delete($_POST['id']);
        header('location: ' . URLROOT . 'quest/list');
    }
}
