<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/Buyer/Orders_page/orders.css" type="text/css">
</head>
<body>
    <?php 
    include ('header.php');
     ?>
    <div id="your_orders_div">
         <?php for($i=0;$i<count($orders)-1;$i++){
            $date=substr($orders[$i]['date'],0,10);
            $status=array_slice(json_decode($orders[$i]['status']), -1)[0];
            $text=<<<TEXT
            <div class="cart-item-div">
            <img src={$orders[$i]['path']} class="product-image" style="min-width: 250px; max-width:250px; min-height:250px; max-width: 250px;">
            <div class="product-details-div">
                <h1 class="order-product-name">{$orders[$i]['name']}</h1>
                <p style="margin:5px  0px;">Address: {$orders[$i]['address']}</p>
                <div class="quantity-div">
                    <p class="quantity">Order Quantity: {$orders[$i]['quantity']}</p>
                </div>
                <h1 style="color: green;">$status</h1>
                <p> Ordered Date: $date</p>
            </div>
            <h1 class="product_price">₹{$orders[$i]['price']}</h1>
        </div>
        TEXT;
        echo $text;
         } ?>
    </div>


    <script src="../../static/Buyer/Orders_page/orders.js"></script>
</body>
</html>



