<?php
if(isset($_SERVER['PATH_INFO']))
{
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['PATH_INFO']== '/forgot_password1') {
    authentication::is_not_login();
    $stat="select * from person where token='{$_GET['token']}'";
    $data=database::query($stat);
    if($data=='failure')
    {
        $block="token";
        include 'Views/Authentication/mail_sent.php';
        exit;
    }
    if(count($data)-1)
    {
        $_SESSION['token']=$_GET['token'];
        include'Views/Authentication/password_change_forgot.php';
    }
    else
    {
    $block="token";
    include 'Views/Authentication/mail_sent.php';
    }
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['PATH_INFO']== '/verify_account') {
    authentication::is_not_login();
    $stat="select * from person where token='{$_GET['token']}'";
    $data=database::query($stat);
    if(!(count($data)-1))
    {
        print_r($data);
        header('location: ' . '/wrong_token');
        exit;
    }
    $stat="update person set is_verified=1 ";
    $data=database::query($stat);
    if($data=='failure')
    {
        header('location: ' . '/ijjjjkjkk');
        exit;
    }
    header('location: ' . '/login');
    exit;
}
}
