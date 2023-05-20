<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>

     <link rel="stylesheet" href="../../static/Buyer/Home_Page/home.css"> 

</head>

<body style="background:url('https://www.shutterstock.com/image-photo/businessman-on-blurred-background-using-260nw-566874976.jpg');background-repeat: no-repeat;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
    <?Php 
     include('header.php');
               echo "<div id=\"parent\" style=\"z-index: 0;\">";
                    for($i=0;$i<5;$i++)
                    {    
                       $text=<<<EOF
                       <div class='product_card' id={$data[$i]['product_id']}>
                           <img class='product_image' src={$data[$i]['path']} alt=\"Card image cap\">
                      <div >
                     EOF;
                     echo $text;
                     echo "<h5 class=\"product_title\">".$data[$i]['name']."</h5>";
                     if($data[$i]['quantity']>0)
                     { 
                        $text2=<<<TEXT2
                        <div>
                                <button class="delcrt" onclick='delete_from_cart({$data[$i]['product_id']},event.target)' style="display: none;" >Remove From Cart</button>
                                <button class="crt" onclick='add_to_cart({$data[$i]['product_id']},event.target)'>Add To Cart</button>
                                <button class="crt" onclick='showpop({$data[$i]['product_id']})'>View  More</button>
                        </div>
                        TEXT2;
                         echo $text2;
                    }else
                    { 
                        echo "<p class=\"out_of_stock\">* OUT OF STOCK</p>";
                    } 
                        echo "</div> ";
                        echo "</div>";
                            }
                echo "</div>";
                ?>
                <div id="pop_up" style="display: none;">
                    <i class="fa fa-times" aria-hidden="true" id="pop_close"></i>
                    <h1 id="pop_title">ja jfkjakfjklj</h1>
                    <img src="kjkj" class="mini_images" id="pop_image">
                    <h4 id="pop_price">afjijiaj</h4>
                        <p id="pop_description">afnjkjakjkj</p>          
                  </div>


                <button id="load_more">Load More</button>
                <script src="../../static/Buyer/Home_page/home.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                    crossorigin="anonymous"></script>
</body>

</html>