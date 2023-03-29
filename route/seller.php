<?php

$router->get('/seller', function () {
    authentication::is_login();
    authentication::is_seller();
    Seller::home();
});

$router->post("/add_new_product", function () {
    authentication::is_login();
    authentication::is_seller();
    Seller::add_product();
});


$router->post('/edit_product',function()
{
    authentication::is_login();
    authentication::is_seller();
    Seller::edit_product();
});

$router->post('/delete_seller_products', function () 
{
    authentication::is_login();
    authentication::is_seller();
    Seller::delete_product();
});

$router->get('/seller_orders',function(){
    
    authentication::is_login();
    authentication::is_seller();
    Seller::orders();
});

$router->post('/change_order_status',function()
{
    authentication::is_login();
    authentication::is_seller();
    Seller::change_status();
});
