<?php

namespace Frdb\Controllers;

use \Lchh\DatabaseTable;

class Register
{
    private $usersTable;
    private $emailTable;
    private $users_emailTable;
    public function __construct(
        DatabaseTable $usersTable,
        DatabaseTable $emailTable,
        DatabaseTable $users_emailTable
    ) {
        $this->usersTable = $usersTable;
        $this->emailTable = $emailTable;
        $this->users_emailTable = $users_emailTable;
    }
    public function registrationForm()
    {
        return [
            'template' => 'register.html.php',
            'title' => 'Register an account'
        ];
    }
    public function success()
    {
        return [
            'template' => 'registersuccess.html.php',
            'title' => 'Registeration Successfully'
        ];
    }
    public function registerUser()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = $_POST['user'];
        foreach ($data as $key => $value) {
            $value = trim($value);
        }
        $email = (array_slice($data, 0, 1));
        $user = (array_slice($data, 1));
        $email['email'] = strtolower($email['email']);
        $valid = true;
        $errors = [];
        if (empty($email['email'])) {
            $valid = false;
            $errors['email'] = 'Email cannot be blank';
        } else if (filter_var($email['email'], FILTER_VALIDATE_EMAIL) == false) {
            $valid = false;
            $errors['email'] = 'Invalid email address';
        }
        if (empty($user['username'])) {
            $valid = false;
            $errors['username'] = 'Username can not be blank';
        }

        if (empty($user['password'])) {
            $valid = false;
            $errors['password'] = 'Password cannot be blank';
        } else if (strlen($user['password']) <= 6) {
            $valid = false;
            $errors['password'] = 'Password cannot be less then 6 characters';
        } else if (preg_match('/^[0-9]+$/', $user['password'])) {
            $valid = false;
            $errors['password'] = 'Password should not contain only digit number';
        }
        if (empty($user['cfPassword'])) {
            $valid = false;
            $errors['cfPassword'] = 'Confirm password cannot be blank';
        } else if ($user['password'] != $user['cfPassword']) {
            $valid = false;
            $errors['cfPassword'] = 'Confirm password did not macth the password you provided';
        }
        echo '<br>';

        if ($valid) {
            unset($user['cfPassword']);
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
            $userEntity = $this->usersTable->save($user);
            $emailEntity = $this->emailTable->save($email);
            $userEntity->addEmail($emailEntity);
            header('location: ' . URLROOT . 'user/success');
        } else {
            return [
                'template' => 'register.html.php',
                'title' => 'Check your  account',
                'variables' => [
                    'errors' => $errors,
                    'user' => $user,
                    'email' => $email
                ]
            ];
        }
    }
}
