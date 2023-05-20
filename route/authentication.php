<?php

$router->get('/login', function () {
    authentication::is_not_login();
    authorisation::login_get();
});

$router->get('/signup', function () {
    authentication::is_not_login();
    authorisation::signup_get();
});

$router->post('/signup', function () {
    authentication::is_not_login();
    authorisation::signup_post();
});

$router->post('/login', function () {
    authentication::is_not_login();
    authorisation::login_post();
});

$router->get('/mail_sent',function()
{
    authentication::is_not_login();
    person::mail_sent();
});

$router->get('/forgot_password',function()
{
    authentication::is_not_login();
    person::forgot_pass_get();
});

$router->post('/forgot_password',function()
{
    authentication::is_not_login();
    person::forgot_pass_post();
    
});

$router->post('/forgot_password1',function()
{
    authentication::is_not_login();
    person::forgot_pass1_post();
});

$router->get('/server_error',function()
{
    include 'Views/Error/error.php';
    exit;
});
