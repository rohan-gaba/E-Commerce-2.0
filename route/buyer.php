<?php

$router->get('/display_cart', function () 
{
    authentication::is_login();
    authentication::is_user();
    Buyer::display_cart();
});

$router->post('/add_to_cart', function ()
 {
    authentication::is_login();
    authentication::is_user();
    Buyer::add_to_cart();
});


$router->post('/remove_from_cart', function ()
 {
    authentication::is_login();
    authentication::is_user();
    Buyer::remove_from_cart();
});


$router->post('/change_quantity', function () 
{
    authentication::is_login();
    authentication::is_user();
    Buyer::change_quantity();

});


$router->post('/delete_from_cart', function () 
{
    authentication::is_login();
    authentication::is_user();
    Buyer::delete_from_cart();
});

$router->post('/save_address', function () {
    authentication::is_login();
    authentication::is_user();
    Buyer::save_address();
});

$router->get('/orders',function(){
    authentication::is_login();
    authentication::is_user();
    Buyer::orders();
});
$router->get('/place_order',function()
{
    authentication::is_login();
    authentication::is_user();
    Buyer::place_order();
});
