<?php

class Dbh
{
    private function connect()
    {
        try {
            $username = "root";
            $password = "root";
            $dbh = new PDO();
        } catch (PDOException $e) {
            //throw $th;
        }
    }
}