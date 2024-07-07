<?php

class logInContr extends logIn
{

    private $uid;
    private $pwd;

    public function __construct($uid, $pwd)
    {

        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function logInUser()
    {
        if (!$this->emptyInput() === false) {
            header('location: ../index.php?error=emptyInput');
            exit();
        }
       
        $this->getUser($this->uid,$this->pwd);
    }
    private function emptyInput()
    {
        $result = false;
        if (empty($this->uid) ||empty($this->pwd)) {
            $result = true;
        }
        return $result;
    }
}