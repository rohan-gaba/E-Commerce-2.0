<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="../../static/Buyer/Home_page/home.css">

</head>

<body>
    <?php include 'Seller_header_page.php' ?>
    <center>
        <h1 style="margin-top:7rem ; ">Your Product's</h1>
    </center>
    <center>
        <h6 style="margin-top:0.5rem ; display: none; color: red; " id="main_page_message"></h6>
    </center>

    <div id="parent" style="margin-top: 2vh !important;">
    <?php
     for($i=0;$i<count($products)-1;$i++){ 
        $text=<<<TEXT
            <div style="height: 53vh;" class="product_card" id={$products[$i]['product_id']}>
                <img class="product_image" src={$products[$i]['path']} alt="Card image cap">
                <div >
                    <h5 class="product_title">
                    {$products[$i]['name']}
                    </h5>
                    <div>
                        <button class="crt" onclick='show_detail({$products[$i]['product_id']})'>View Details</button>
                        <button class="crt" onclick='delete_product({$products[$i]['product_id']})'>Delete Product</button>
                        <button class="crt" onclick='edit_product_popup({$products[$i]['product_id']})'>Edit Product</button>
                    </div>
                </div> 
             </div>
        TEXT;
        echo $text;
             } 
    ?>
    </div>

    <div id="pop_up" style="display: none;">
        <i class="fa fa-times" aria-hidden="true" id="pop_close" style="cursor: pointer;"></i>
        <h1 id="pop_title">ja jfkjakfjklj</h1>
        <img src="kjkj" class="mini_images" id="pop_image">
        <h4 id="pop_price">afjijiaj</h4>
        <h5>Availabe quantitiy: <span id="pop_quantity"></span></h5>
        <p id="pop_description">afnjkjakjkj</p>
    </div>


    <div class="header" id="issue_product" style="display: none;">
        <p id="message" style="display: none;"></p>
        <i class="fa fa-times" aria-hidden="true" style="margin: 0 auto !important; cursor: pointer;"
            onclick="close_issue()"></i>
        <h1>Issue New Product</h1>
        <hr>
        <form onsubmit="return false">

            <div class="box">
                <label>Product name</label>
                <input type="text" name="name" placeholder="product name" id="product_name" required>
                <br>
                <label>Product description</label>
                <textarea name="description" cols="30" rows="10" placeholder="enter product description"
                    id="product_description" required></textarea>
                <br>
                <label for="">Product price</label>
                <input type="number" name="price" placeholder="enter price" id="product_price" required />
                <br>
                <label for="">Product image</label>
                <input type="file" name="path" id="upload" required />
                <br>
                <label for="">Product quantity</label>
                <input type="number" name="quantity" placeholder="enter quantitiy" id="product_quantity" required />
                <br>
                <button class="submit" onclick="sendproduct()">Submit</button>
            </div>
        </form>
    </div>

    <div class="header" id="edit_product_header" style="display: none;">
        <p id="edit_message" style="display: none;"></p>
        <i class="fa fa-times" aria-hidden="true" style="margin: 0 auto !important; cursor: pointer;"
            onclick="close_edit_popup()"></i>
        <h1>Edit Your Product</h1>
        <hr>
        <form onsubmit="return false">

            <div class="box">
                <label>Product name</label>
                <input type="text" name="name" placeholder="product name" id="product_name_edit" required>
                <br>
                <label>Product description</label>
                <textarea name="description" cols="30" rows="10" placeholder="enter product description"
                    id="product_description_edit" required></textarea>
                <br>
                <label for="">Product price</label>
                <input type="number" name="price" placeholder="enter price" id="product_price_edit" required />
                <br>
                <label for="">Product image</label>
                <input type="file" name="path" id="upload_edit" required />
                <br>
                <label for="">Product quantity</label>
                <input type="number" name="quantity" placeholder="enter quantitiy" id="product_quantity_edit"
                    required />
                <br>
                <button class="submit" onclick="edit_product()" id="edit_submit">EDIT</button>
            </div>
        </form>
    </div>
    <script src="../../static/Seller/Header/seller_header.js"></script>
    <script src="../../static/Seller/Home/seller_home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>