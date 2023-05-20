<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title> 
    <link rel="stylesheet" href="../../static/Seller/Orders/orders.css" type="text/css">
    <link rel="stylesheet" href="../../static/Buyer/Home_page/home.css" type="text/css">

</head>
<body style="margin: 0;">
<?php include 'Seller_header_page.php' ?>

    
    <div id="parent">
        <?php 
 for($i=0;$i<count($orders)-1;$i++){
    $j=$i+1;
    $date=substr($orders[$i]['date'],0,10);
    $status=array_slice(json_decode($orders[$i]['status']), -1)[0];
     $text=<<<TEXT
    <div class="box">
        <p class="p">Order No: $j</p>
        <hr>
        <p>Buyers Name: <span class="span">{$orders[$i]['buyer_name']}</span></p>
        <p>Product Ordered: <span class="span">{$orders[$i]['product_name']}</span></p>
        <p class="p">Order Date: <span class="span">$date</span></p>
        <p>Deliever To: <span class="span">{$orders[$i]['address']}</span></p>
        <p class="p">Quantity Ordered: <span class="span">{$orders[$i]['quantity']}</p>
        <p>Status: <span class="span" id={$orders[$i]['order_id']}stval>$status</span></p>
        <input type="text" placeholder="Enter text here" style="padding-right: 25px; display:none;" id={$orders[$i]['order_id']}status>
        <button  onclick="change_status({$orders[$i]['order_id']},event)" id={$orders[$i]['order_id']}bt >Edit Status</button>
        <button style="display: none;"  onclick="save_status({$orders[$i]['order_id']},event)" id={$orders[$i]['order_id']}st>Save Status</button>
    </div>
    TEXT;
echo $text;
 }
    ?>
</div>
<script src="../../static/Seller/Orders/orders.js"></script>
</body>
</html>