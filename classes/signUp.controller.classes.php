<?php

class signUpConstr
{

    private $name;
    private $uid;
    private $email;
    private $pwd;
    private $pwdRepeat;

    public function __construct($name, $uid, $email, $pwd, $pwdRepeat)
    {

        $this->name = $name;
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    private function invalidUid()
    {
        $result = true;
        if (!preg_match('/^[a-zA-Z0-9]*$/', $this->uid)) {
            $result = false;
        }
        return $result;
    }
    private function emptyInput()
    {
        $result = false;
        if (empty($this->name) || empty($this->uid) || empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat)) {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = true;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }

        return $result;
    }

    private function pwdMatch()
    {
        $result = true;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        }
        return $result;
    }
}