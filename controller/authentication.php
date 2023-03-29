<?php
class authentication
{
    public static function is_login()
    {
        if (!array_key_exists('is_log',$_SESSION)) {
            header('location: ' . '/login');
            exit;
        }
    }
    public static function is_not_login()
    {
        if (array_key_exists('is_log',$_SESSION)) {
            header('location: ' . "/");
            exit;
        }
    }
    public static function is_seller()
    {
        if(!$_SESSION['role']==1&&!$_SESSION['role']==2)
        {
            header('location: ' . "/");  
            exit; 
        }
    }
    public static function is_user()
    {
        if(!$_SESSION['role']==0&&!$_SESSION['role']==2)
        {
            header('location: ' . "/admin");     
        }
    }
}