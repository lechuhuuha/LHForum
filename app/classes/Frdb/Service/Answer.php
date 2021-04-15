<?php

namespace Frdb\Service;

class Answer
{
    private $answersTable;
    private $user_answer_questTable;
    private $authentication;
    public function __construct(
        \Lchh\DatabaseTable $answersTable,
        \Lchh\DatabaseTable $user_answer_questTable,
        \Lchh\Authentication $authentication
    ) {
        $this->answersTable = $answersTable;
        $this->user_answer_questTable = $user_answer_questTable;
        $this->authentication = $authentication;
    }
    public function list($id)
    {
        $allAnswers = [];
        $user_answer_quests = $this->user_answer_questTable->find('questions_id', $id);
        $count = 0;
        foreach ($user_answer_quests as $user_answer_quest) {
            $answer = $this->answersTable->findById($user_answer_quest->answer_id);
            $allAnswers[] = $answer;
        }
        $html = ($this->showAnswers($allAnswers));
        return $html;
    }
    protected function showAnswers($answers, $parentId = -1)
    {
        $html = '';
        if ($parentId != -1) {
            usort($answers, function ($a, $b) {
                return strcmp($a->created_at, $b->created_at);
            });
        }
        foreach ($answers as $answer) {
            if ($answer->parent_id == $parentId) {
                $html .= '
            <div class="comment">
                <div>
                    <h3 class="name"><a href="#">Lorena Rojero</a>
                    </h3>
                    <span class="date">' . $this->renderTime($answer) . '</span>
                </div>
                <p class="content">' . nl2br(htmlspecialchars($answer->content, ENT_QUOTES, 'utf-8')) . '</p>
                <a class="reply_answer_btn"   data-answer-id="' . $answer->id . '">Reply</a>
                ' . $this->repCmtForm($answer->id) . '
                <div class="replies">
                ' . $this->showAnswers($answers, $answer->id) . '
                </div>
            </div>
            ';
            }
        }
        return $html;
    }

    public function saveEdit()
    {

        $answer = [
            'parent_id' => $_POST['quest']['parent_id'],
            'content' => $_POST['quest']['content']
        ];

        $user_answer_quest = [
            'user_id' => 1,
            'answer_id' => 1,
            'questions_id' => $_POST['quest']['id']
        ];
        $answerEntity = $this->answersTable->save($answer);
        $user_answer_quest['answer_id'] = $answerEntity->id;
        $user_answer_quest['user_id'] = $this->authentication->getUser()->id;
        $this->user_answer_questTable->save($user_answer_quest);
        $phpSelf = "http://" .  $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
        header('location:' . $phpSelf);
    }

    protected function renderTime($data)
    {
        if ($data->updated_at != 0) {
            $date = new \DateTime($data->updated_at);
            $dateUp = $date->format('jS F Y');
            $renderHtml = '<a href="#">
            <i class="fa fa-calendar-plus-o" aria-hidden="true">
            ' . $dateUp . '</i></a>';
        } else {
            $date = new \DateTime($data->created_at);
            $dateDown = $date->format('jS F Y');
            $renderHtml = ' <a href="#">
            <i class="fa fa-calendar-minus-o" aria-hidden="true">' .
                $dateDown . '</i></a>';
        }
        return $renderHtml;
    }
    protected function repCmtForm($parentId = -1)
    {
        $html =
            '<div class="write_comment component" data-comment-id="' . $parentId . '">
            <form method="POST" action="' . URLROOT . 'quest/answer' . '">
                <input name="quest[id]" type="hidden" value="' . $_GET['id'] . '">
                <input name="quest[parent_id]" type="hidden" value="' . $parentId . '">
                <input name="quest[username]" type="text" placeholder="Your Name" required>
                <textarea name="quest[content]" placeholder="Write your comment here..." required></textarea>
                <button type="submit">Submit Comment</button>
            </form>
        </div>
        ';
        return $html;
    }
}
