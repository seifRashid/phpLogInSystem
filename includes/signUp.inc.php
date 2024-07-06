<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];

    //instantiating the signUP class
    include '../classes/signUp.classes.php';
    include '../classes/signUp.controller.classes.php.classes.php';


}