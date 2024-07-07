<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    echo var_dump($pwd);
    echo var_dump($uid);

    
    
    //instantiating the signUP class
    include '../classes/dbh.classes.php';
    include '../classes/logIn.classes.php';
    include '../classes/logIn.controller.classes.php';
    
    $logIn = new logInContr($uid, $pwd);

    $logIn->logInUser();

    header('location: ../index.php?error=none');


}