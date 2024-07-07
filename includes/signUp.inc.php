<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];
    
    
    //instantiating the signUP class
    include '../classes/dbh.classes.php';
    include '../classes/signUp.classes.php';
    include '../classes/signUp.controller.classes.php';
    $signUp = new signUpContr($name, $uid, $email, $pwd, $pwdRepeat);

    $signUp->signUpUser();

    header('location: ../index.php?error=none');


}

