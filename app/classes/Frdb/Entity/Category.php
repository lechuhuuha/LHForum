<?php

namespace Frdb\Entity;

use Lchh\DatabaseTable;

class Category
{
    public $id;
    public $name;
    private $questsTable;
    private $category_questionsTable;
    public function __construct(
        DatabaseTable $questsTable,
        DatabaseTable $category_questionsTable
    ) {
        $this->questsTable = $questsTable;
        $this->category_questionsTable = $category_questionsTable;
    }
    public function getQuests()
    {
        $category_questions = $this->category_questionsTable->find('category_id', $this->id);
        $quests = [];
        foreach ($category_questions as $category_question) {
            $quest = $this->questsTable->findById($category_question->questions_id);
            if ($quest) {
                $quests[] = $quest;
            }
        }
        return $quests;
    }
}
