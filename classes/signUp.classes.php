<?php

class Signup extends Dbh
{
    protected function setUsers($name, $uid, $email, $pwd)
    {
        //prepared statement
        $stmt = $this->connect()->prepare('INSERT INTO users(users_name, users_uid, users_email, users_pwd) VALUES(?,?,?,?)');

        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $uid, $email, $hashedpwd))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();

        }
        $stmt = null;

    }
    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_id = ? OR users_email = ?');

        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();

        }

        $resultCheck = true;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }

        return $resultCheck;
    }
}