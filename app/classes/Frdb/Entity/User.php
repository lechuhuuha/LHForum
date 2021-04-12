<?php

namespace Frdb\Entity;

class User
{

    public $id;
    public $username;
    public $password;
    private $users_emailTable;
    public function __construct(
        \Lchh\DatabaseTable $users_emailTable
    ) {
        $this->users_emailTable = $users_emailTable;
    }
    public function addEmail($email)
    {
        $user_email = [
            'user_id' => $this->id,
            'email_id' => $email->id
        ];
        $this->users_emailTable->save($user_email);
    }
}
