<?php

namespace Frdb;

class FrdbRoutes implements \Lchh\Routes
{
    private $questsTable;
    private $categoriesTable;
    private $tagsTable;
    private $postFromRendaDb;
    private $category_questionsTable;
    private $questions_tagsTable;
    private $newslettersTable;
    private $CountOnl;
    public function __construct()
    {
        include __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->questsTable = new \Lchh\DatabaseTable($pdo, 'questions', 'id', '\Frdb\Entity\Quest', [&$this->questsTable, &$this->categoriesTable, &$this->tagsTable, &$this->questions_tagsTable, &$this->category_questionsTable]);
        $this->categoriesTable = new \Lchh\DatabaseTable($pdo, 'category', 'id', '\Frdb\Entity\Category', [&$this->questsTable, &$this->category_questionsTable]);
        $this->tagsTable = new \Lchh\DatabaseTable($pdo, 'tags', 'id', '\Frdb\Entity\Tag', [&$this->questsTable, &$this->questions_tagsTable]);
        $this->questions_tagsTable = new \Lchh\DatabaseTable($pdo, 'questions_tags', 'tags_id');
        $this->category_questionsTable = new \Lchh\DatabaseTable($pdo, 'category_questions', 'category_id');
        $this->postFromRendaDb = new \Lchh\DatabaseTable($secondPdo, 'posts', 'id');
        $this->newslettersTable = new \Lchh\DatabaseTable($pdo, 'newsletter', 'id');
        $this->CountOnl = new \Lchh\CountOnl('username', new \Lchh\RemoteAddress());
    }
    public function getRoutes(): array
    {
        $questController = new \Frdb\Controllers\Quest(
            $this->questsTable,
            $this->categoriesTable,
            $this->tagsTable,
            $this->category_questionsTable,
            $this->CountOnl
        );
        $pageControllers = new \Frdb\Controllers\Pages(
            $this->questsTable,
            $this->categoriesTable,
            $this->tagsTable,
            $this->postFromRendaDb

        );
        $categoryController = new \Frdb\Controllers\Category(
            $this->categoriesTable,
            $this->questsTable,
            $this->tagsTable
        );
        $tagController = new \Frdb\Controllers\Tag(
            $this->tagsTable,
            $this->questsTable,
            $this->questions_tagsTable
        );
        $newsletterController = new \Frdb\Controllers\Newsletter($this->newslettersTable);
        $routes = [
            // Page controller
            '' => [
                'GET' => [
                    'controller' => $pageControllers,
                    'action' => 'home'
                ]
            ],
            'home' => [
                'GET' => [
                    'controller' => $pageControllers,
                    'action' => 'home'
                ]
            ],
            'sidebar' => [
                'GET' => [
                    'controller' => $pageControllers,
                    'action' => 'sidebar'
                ]
            ],
            // newsletter controller
            'newsletter' => [
                'GET' => [
                    'controller' => $newsletterController,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $newsletterController,
                    'action' => 'saveEdit'
                ]
            ],
            // quest controller
            'quest/list' => [
                'GET' => [
                    'controller' => $questController,
                    'action' => 'list'
                ]
            ],
            'quest/edit' => [
                'GET' => [
                    'controller' => $questController,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $questController,
                    'action' => 'saveEdit'
                ]
            ],
            'quest/delete' => [
                'POST' => [
                    'controller' => $questController,
                    'action' => 'delete'
                ]
            ],
            'quest/detail' => [
                'GET' => [
                    'controller' => $questController,
                    'action' => 'detail'
                ]
            ],
            // category controller
            'category/list' => [
                'GET' => [
                    'controller' => $categoryController,
                    'action' => 'list'
                ]
            ],
            'category/edit' => [
                'GET' => [
                    'controller' => $categoryController,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $categoryController,
                    'action' => 'saveEdit'
                ]
            ],
            'category/delete' => [
                'POST' => [
                    'controller' => $categoryController,
                    'action' => 'delete'
                ]
            ],
            // tag controller
            'tag/list' => [
                'GET' => [
                    'controller' => $tagController,
                    'action' => 'list'
                ]
            ],
            'tag/edit' => [
                'GET' => [
                    'controller' => $tagController,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $tagController,
                    'action' => 'saveEdit'
                ]
            ],
            'tag/delete' => [
                'POST' => [
                    'controller' => $tagController,
                    'action' => 'delete'
                ]
            ]
        ];
        return $routes;
    }
    // public function getAuthentication(): \Lchh\Authentication
    // {
    //     return $this->authentication;
    // }
    // public function checkPermission($permission): bool
    // {
    //     $user = $this->authentication->getUser();
    //     if ($user && $user->hasPermission($permission)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

}
