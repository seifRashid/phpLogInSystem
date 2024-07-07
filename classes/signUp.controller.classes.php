<?php

class signUpContr extends Signup
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

    public function signUpUser()
    {
        //input validations
        if ($this->emptyInput() === false) {
            header('location: ../index.php?error=emptyInput');
            exit();
        }
        if ($this->invalidUid() === false) {
            header('location: ../index.php?error=invalidUid');
            exit();
        }
        if ($this->invalidEmail() === false) {
            header('location: ../index.php?error=invalidEmail');
            exit();
        }
        if ($this->pwdMatch() === false) {
            header('location: ../index.php?error=pwdMatch');
            exit();
        }
        if ($this->uidTaken() === false) {
            header('location: ../index.php?error=uidTaken');
            exit();
        }
        $this->setUsers($this->name, $this->uid, $this->email, $this->pwd);
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
        if (!empty($this->name) || !empty($this->uid) || !empty($this->email) || !empty($this->pwd) || !empty($this->pwdRepeat)) {
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

    private function uidTaken()
    {
        $result = true;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        }
        return $result;
    }
}