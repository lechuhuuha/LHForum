<?php

namespace Frdb\Controllers;

use \Lchh\DatabaseTable;

class Tag
{
    private $tagsTable;
    private $questTable;
    private $questions_tagsTable;
    public function __construct(
        DatabaseTable $tagsTable,
        DatabaseTable $questTable,
        DatabaseTable $questions_tagsTable
    ) {
        $this->tagsTable = $tagsTable;
        $this->questTable = $questTable;
        $this->questions_tagsTable = $questions_tagsTable;
    }
    public function list()
    {
        $tags = $this->tagsTable->findAll();
        $quests = $this->questTable->findAll();
        return [
            'template' => 'tags.html.php',
            'title' => 'Question Tags',
            'variables' => [
                'quests' => $quests,
                'tags' => $tags
            ]
        ];
    }
    public function edit()
    {
        $title = 'Add tags';
        if (isset($_GET['id'])) {
            $tag = $this->tagsTable->findById($_GET['id']);
            $title = 'Edit tag';
        }
        return [
            'template' => 'edittag.html.php',
            'title' => $title,
            'variables' => [
                'tag' => $tag ?? null,
                'title' => $title
            ]
        ];
    }
    public function saveEdit()
    {
        $tag = $_POST['tag'];
        $tag['updated_at'] = new \DateTime();
        $this->tagsTable->save($tag);
        header('location:' . URLROOT . 'tag/list');
    }
    public function delete()
    {
        $tagEntity = $this->tagsTable->delete($_POST['id']);
        $tagEntity->clearQuest();
        header('location:' . URLROOT . 'tag/list');
    }
}
