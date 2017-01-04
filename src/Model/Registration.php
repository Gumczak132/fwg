<?php

namespace Gumunia\Diary\Model;

class Registration extends \Gumunia\Diary\Engine\Model
{
    /*
     * register form input
     * array_assoc @data 
     */

    private $data;

    public function createUser($data)
    {
        if (!$data) {
            header('Location: /fwg/');
            die();
        }
        $this->data = $data;
        if ($this->check() === true) {
            $this->insert(
                    'accounts', array(
                'user' => $data['user'],
                'password' => base64_encode($data['password']),
                'admin' => '0',
                'created_date' => date("Y-m-j-H-i")
                    )
            );

            return 'true';
        } else {

            return $this->check();
        }
    }

    private function check()
    {
        if (!($this->data['password'] === $this->data['confirm_password'])) {

            return "Password and Confirm Password values must be the same!";
        } elseif ($this->select('accounts', 'user', array('user' => $this->data['user']))) {

            return "User already exists";
        } elseif (!($this->data['user'] && $this->data['password'])) {

            return 'All fields must be filled!';
        } else {

            return true;
        }
    }

}
