<?php
$router->post('/load_more_products', function () {
    Buyer::load_more();
});

$router->post('/product_info', function () {
    Buyer::product_info();
});

$router->get('/islog_in', function () 
{
    Person::is_login();
});

$router->get('/get_user_details', function ()
 {
    authentication::is_login();
    Person::details();
});

$router->get('/changepass', function () {
    authentication::is_login();
    Buyer::change_password_get();
});

$router->post('/changepassword', function () {
    authentication::is_login();
    Buyer::change_password_post();
});

$router->get('/logout', function () {
    authentication::is_login();
    authorisation::logout();
});

$router->get('/', function () {
    if (array_key_exists('is_log',$_SESSION))
    {
        if($_SESSION['role']==1)
        {Seller::home();
        exit;
        }
    }
    person::home();
});
