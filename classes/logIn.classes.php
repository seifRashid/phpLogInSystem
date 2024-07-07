<?php

class LogIn extends Dbh
{
    protected function getUser($uid, $pwd)
    {
        //prepared statement
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?');


        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();

        }

        //after the $stmt has passed we check how many rows it has returned, this shows us that the data which has been returned
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../index.php?error=userNotFound');
            exit();
        }


        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);

        //this will show that the passwords did not match
        if ($checkpwd == false) {
            $stmt = null;
            header('location: ../index.php?error=userNotFound');
            exit();
        } elseif ($checkpwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid =? AND users_pwd = ?'); //this will select the user that has been logged in
            if (!$stmt->execute(array($uid, $pwd))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailed');
                exit();
            }

            
            if ($stmt->rowCount() === 0) {
                $stmt = null;
                header('location: ../index.php?error=userNotFound');
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $user[0]['users_id'];
            $_SESSION['useruid'] = $user[0]['users_uid'];

            $stmt = null;
        }
        $stmt = null;



    }
}