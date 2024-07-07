<?php

class Dbh
{
    protected function connect()
    {
        try {
            $username = "root";
            $password = "";
            $dbname = "loginsystem";
            $dbh = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);

            return $dbh;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }
}