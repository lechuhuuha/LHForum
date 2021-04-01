<?php

namespace Frdb\Entity;

class Quest
{
    public $id;
    public $title;
    public $summary;
    public $content;
    public $views;
    private $questsTable;
    private $categoriesTable;
    private $tagsTable;
    private $questions_tagsTable;
    private $category_questionsTable;
    public function __construct(
        \Lchh\DatabaseTable $questsTable,
        \Lchh\DatabaseTable $categoriesTable,
        \Lchh\DatabaseTable $tagsTable,
        \Lchh\DatabaseTable $questions_tagsTable,
        \Lchh\DatabaseTable $category_questionsTable

    ) {
        $this->questsTable = $questsTable;
        $this->categoriesTable = $categoriesTable;
        $this->tagsTable = $tagsTable;
        $this->questions_tagsTable = $questions_tagsTable;
        $this->category_questionsTable = $category_questionsTable;
    }
    public function inscView($views)
    {
        $quest = [
            'id' => $this->id,
            'views' => $views
        ];
        $this->questsTable->save($quest);
    }
    public function getCategory()
    {
        $category_questions = $this->category_questionsTable->find('questions_id', $this->id);
        $categories = [];
        foreach ($category_questions as $category_question) {
            $category = $this->categoriesTable->findById($category_question->category_id);
            if ($category) {
                $categories[] = $category;
            }
        }
        return $categories;
    }
    public function getTags()
    {
        $questions_tags = $this->questions_tagsTable->find('questions_id', $this->id);
        $tags = [];
        foreach ($questions_tags as $questions_tag) {
            $tag = $this->tagsTable->findById($questions_tag->tags_id);
            if ($tag) {
                $tags[] = $tag;
            }
        }
        return $tags;
    }
    public function hasCategory($category_id)
    {
        $category_questions = $this->category_questionsTable->find('questions_id', $this->id);
        foreach ($category_questions as $category_question) {
            if ($category_question->category_id == $category_id) {
                return true;
            }
        }
    }
    public function hasTags($tags_id)
    {
        $questions_tags = $this->questions_tagsTable->find('questions_id', $this->id);
        foreach ($questions_tags as $questions_tag) {
            if ($questions_tag->tags_id == $tags_id) {
                return true;
            }
        }
    }
    public function addCategory($category_id)
    {
        $category_question = [
            'category_id' => $category_id,
            'questions_id' => $this->id
        ];
        $this->category_questionsTable->save($category_question);
    }
    public function addTag($tag_id)
    {
        $questions_tag = [
            'questions_id' => $this->id,
            'tags_id' => $tag_id
        ];
        $this->questions_tagsTable->save($questions_tag);
    }
    public function clearCategories()
    {
        $this->category_questionsTable->deleteWhere('questions_id', $this->id);
    }
    public function clearTags()
    {
        $this->questions_tagsTable->deleteWhere('questions_id', $this->id);
    }
}
