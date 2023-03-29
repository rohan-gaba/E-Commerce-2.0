<?php
class Person{
public static function details()
{
    $stat = "select * from person where person_id={$_SESSION['id']}";
    $data = database::query($stat);
    if($data=='failure')
    {echo "failure";
    exit;}
    echo json_encode($data);
    exit;
}
public static function is_login()
{
    if (array_key_exists('is_log', $_SESSION)) {
        echo "yes";
        exit;
    }
    echo "no";    
    exit;
}
public static function mail_sent()
{
    $block="mail_sent";
    include 'Views/Authentication/mail_sent.php';
    exit;
}
public static function forgot_pass_get()
{
    include 'Views/Authentication/forgot_password.php';
    exit;
}
public static function forgot_pass_post()
{
    $req_data=json_decode(file_get_contents('php://input'));
    $stat = "select * from person where mail='{$req_data->mail}'";
    $data=database::query($stat);
    if($data=='failure')
    echo "something went wrong";
    else
    {
        if(count($data)-1)
        {
            if(send_mail("{$data[0]['mail']}","{$data[0]['name']}", "Forgot password link", "click on the following button for change your Hammer password <a href='http://localhost:8000/forgot_password1?token={$data[0]['token']}'>Change Password</a>"))
                echo "Mail has been sent to the below Mail-Id";
            else
                echo "something went wrong";
        }
        else
        {
        echo "No account linked with such mail";
        }
    }
    exit;
}
public static function forgot_pass1_post()
{
    $req_data=json_decode(file_get_contents('php://input'));
    $stat="update person set password='{$req_data->password}' where token='{$_SESSION['token']}'";
    $response=database::query($stat);
    if($response=='failure')
    echo "Something went wrong";
    else
    echo "Password change successfully";
    exit;
}
public static function home()
{
    $stat = "select * from products order by product_id offset 0 rows fetch next 5 row only";
    $data = database::query($stat);
    if($data=='failure')
    include 'Views/Error/error.php';
    else
    include('Views/Buyer/home.php');
    exit;    
}

}

?>