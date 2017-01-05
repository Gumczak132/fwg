<?php

namespace Gumunia\Diary\Model;

class Login extends \Gumunia\Diary\Engine\Model
{
    public function login($data)
    {
        $account = $this->select(
                'accounts', '*', array(
            'user' => $data['user']
                )
        );

        if (!$data['user'] OR !$data['password']) {

            return 'All fields must be filled!';
        } elseif (!$account) {

            return "user doesn't exist";
        }

        if ($account['password'] != base64_encode($data['password'])) {

            return "Password incorrect";
        } else {

            return 'true';
        }
    }

}
