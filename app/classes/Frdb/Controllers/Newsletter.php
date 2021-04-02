<?php

namespace Frdb\Controllers;

use \Lchh\DatabaseTable;

class Newsletter
{
    private $newslettersTable;
    public function __construct(DatabaseTable $newslettersTable)
    {
        $this->newslettersTable = $newslettersTable;
    }
    public function list()
    {
        $newsletters = $this->newslettersTable->findAll();
        return [
            'variables' => [
                'newsletters' => $newsletters
            ]
        ];
    }
    public function saveEdit()
    {
        $newsletter = $_POST['news'];
        $newsletter['updated_at'] = new \DateTime();
        $this->newslettersTable->save($newsletter);
        header('location: ' . URLROOT);
    }
    public function edit()
    {
        $title = 'Newsletter';
        return [
            'template' => 'contactus.html.php',
            'title' => $title,
            'variables' => [
                ''
            ]
        ];
    }
}
