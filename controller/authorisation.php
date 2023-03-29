<?php
require_once 'Model/pgsql.php';
class authorisation{
    public static function login_get(){
        include('Views/Authentication/login.php');
        exit;
    }
    
    public static function signup_get(){
        include('Views/Authentication/signup.php');
        exit;
    }

    public static function login_post(){
        $obj = json_decode(file_get_contents('php://input'));
        $stat = "select *from person where mail='$obj->mail' and password='$obj->password' and role IN(2,$obj->who)";
        $data = database::query($stat);
        if($data=='failure')
        {
            echo "Something went wrong,please try again after sometime";
            exit;
        }
        if ($data[0]) {
            if ($data[0]['is_verified'] == 1) {
                $_SESSION["is_log"] = true;
                $_SESSION["name"] = strtoupper($data[0]['name']);
                $_SESSION["mail"] = $data[0]['mail'];
                $_SESSION["role"] = $data[0]['role'];
                $_SESSION["id"] = $data[0]['person_id'];
                if ($obj->who == 0)
                    echo "login success";
                else
                    echo "admin login";
            } else {
                echo "Please activate your account first before login";
            }

        } else {
            echo "Account doesn't exist";
        }
    }

    public static function signup_post()
    {
        $obj = json_decode(file_get_contents('php://input'));
    $stat = "select * from person where mail='$obj->mail' or phone='$obj->mobile'";
    $data = database::query($stat);
    if($data=='failure')
    {echo "Something went wrong,please try again after sometime";
        exit;}

    if ($data[0]) {
        if (($data[0]['role'] == $obj->who) || ($data[0]['role'] == 2))
            echo "account already exist";
        else {
            $stat = "update person set role=2 where mail='$obj->mail'";
            database::query($stat);
            echo "Account created successfully";
        }
    } else {
        $token=time();
        $stat = "insert into person(name,mail,phone,password,role,token) values('$obj->name','$obj->mail','$obj->mobile','$obj->password',$obj->who,'$token');";
        database::query($stat);
        if(send_mail("$obj->mail","$obj->name",'Activation of Hammer Account',"click on the following button to activate your account <a href=\"http://localhost:8000/verify_account?token={$token}\">Activate Now</a>"))
        echo "verify_mail";
        else
        echo "something went wrong";
    }
    exit;
    }

    public static function logout()
    {
        session_destroy();
        header('Location: ' . '/');
        exit;
    }

}