<?php
// setcookie('Hammer','rohan gaba');
// echo $_COOKIE['PHPSESSID'];
// echo "<pre>";
// print_r($_COOKIE);
// echo "</pre>";
// foreach($_COOKIE as $key=>$val)
// {
//     echo var_dump($val);
// }
// exit;
$incpath = dirname(__FILE__) . '/';
$ctrlpah = $incpath.'controller/';
$viewspath = $incpath.'Views/';
$routepath = $incpath.'route/';
// echo $viewspath;
// die();
require_once $routepath.'Request.php';
require_once $routepath.'Router.php';
include_once 'controller/mail.php';
include_once 'Model/pgsql.php';
include_once 'controller/authentication.php';
include_once 'controller/authorisation.php';
include_once 'controller/buyer.php';
include_once 'controller/seller.php';
include_once 'controller/person.php';
session_start();
include_once 'route/query_routes.php';
$router = new Router(new Request);
include_once 'route/seller.php';
include_once 'route/buyer.php';
include_once 'route/person.php';
include_once 'route/authentication.php';
$router->get('/payment',function(){
    include 'Views/Buyer/payment.php';
});

