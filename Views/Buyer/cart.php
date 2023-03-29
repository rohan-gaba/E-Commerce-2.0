<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../static/Buyer/Cart_page/cart_page.css" type="text/css">
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div id="main_header">
        <div id="products_box">
            <?php
            $total = 0;
            $item = 0;
            for ($i = 0; $i < count($data)-1; $i++) {
                $total += $data[$i]['quantity'] * $data[$i]['price'];
                $item += $data[$i]['quantity'];
                $text = <<<TEXT
                        <div class="products" id={$data[$i]['cart_id']}>
                        <img  height="150px" width="150px" src={$data[$i]['path']} class="product_images">
                        <div class="description_box">
                        <h1 class="product_name">{$data[$i]['product_name']}</h1>
                        TEXT;
                echo $text;
                if ($data[$i]['quantity'] <= $data[$i]['product_quantity']) {
                    $text = <<<TEXT
                        <p  class="instock" id={$data[$i]['cart_id']}in_stock>IN STOCK</p>
                        <br>
                        <p class="product_quantity"><button class="mini_buttons" style="border-radius: 100%; margin-right: 5px;" onclick="decrease_quantity({$data[$i]['cart_id']},event.target)">-</button>{$data[$i]['quantity']}<button  class="mini_buttons" style="border-radius: 100%; margin-left: 5px;" onclick="increase_quantity({$data[$i]['cart_id']},event.target)" id={$data[$i]['cart_id']}incr>+</button></p>
                        <p class="product_price">₹ <span id={$data[$i]['cart_id']}p>{$data[$i]['price']}</span>/-</p>
                        TEXT;
                    echo $text;
                } else {
                    $text = <<<TEXT
                        <p  class="outstock" id={$data[$i]['cart_id']}out_stock>OUT OF STOCK</p>
                        <button onclick="remove_quantity({$data[$i]['cart_id']})" class="remove">Remove Item</button>
                        <br>
                        <br>
                        TEXT;
                    echo $text;
                }
                echo "<p>Sold by: {$data[$i]['name']}</p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <div id="checkout_box">
            <h1>Total Amount</h1>
            <hr>
            <p style="font-weight: bolder;">Address:</p>
            <textarea id="address" cols="30" rows="3"></textarea>
            <p id="confirm_address" style="display: none;"></p>
            <button id="save_address" class="save_address" onclick="save_address1()">Save Address</button>
            <button id="edit_address" class="save_address" style="display: none;" onclick="edit_address1()">Edit
                Address</button>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p style="font-weight: bold;">Total Amount: <span style="font-weight: lighter;">₹</span><span
                    id="total_amount" style="font-weight: lighter;">
                    <?php echo $total ?>
                </span><span style="font-weight: lighter;">/-</span></p>
            <p style="font-weight: bold;">Total Items: <span id="total_item" style="font-weight: lighter;">
            <?php echo $item ?>
                </span></p>
            <br>
            <button class="submit" onclick="place_order()">Checkout</button>
        </div>
    </div>
    <script src="../../static/Buyer/Cart_page/cart_page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>