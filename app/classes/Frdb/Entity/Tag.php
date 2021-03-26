<?php

namespace Frdb\Entity;

class Tag
{
    public $id;
    public $name;
    private $questTable;
    private $questions_tagsTable;
    public function __construct(
        \Lchh\DatabaseTable $questTable,
        \Lchh\DatabaseTable $questions_tagsTable
    ) {
        $this->questTable = $questTable;
        $this->questions_tagsTable = $questions_tagsTable;
    }
    public function getQuests()
    {
        $questions_tags = $this->questions_tagsTable->find('tags_id', $this->id);
        $quests = [];
        $totalQuestInTag = 0;
        foreach ($questions_tags as $questions_tag) {
            $quest = $this->questTable->findById($questions_tag->questions_id);
            if ($quest) {
                $quests[] = $quest;
                $totalQuestInTag++;
            }
        }
        return [
            'quests' => $quests,
            'totalQuestInTag' => $totalQuestInTag
        ];
    }
    public function clearQuest()
    {

        $this->questions_tagsTable->deleteWhere('tags_id', $this->id);
    }
}
