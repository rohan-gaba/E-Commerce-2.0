<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/Seller/Header/seller_header.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark topp"
    style="position: fixed;  width:100%; top:0; z-index: 1; background-color: #8B0000 !important;" id="nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="/seller" style="font-size: xx-large; margin-left: 20px;">Hammer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="m-auto">
            </ul>
            <form class="d-flex" role="search">
                <ul class="navbar-nav me-auto  mb-lg-0">
                <li class="nav-item">
                            <h3 style="color: white; margin: 8px 5px 0 0;"><?php echo $_SESSION['name']?></h3>
                        </li>
                    <div class="dropdown">
                        <button class="dropbtn">Manage Account</button>
                        <div class="dropdown-content" class="drop">
                          <a onclick="issue_product()" style="cursor:pointer;">Issue A Product</a>
                          <a href="/seller_orders">Orders Recieved</a>
                          <a href="/logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        </div>
                      </div>
                </ul>
            </form>
        </div>
    </div>
</nav>

    
</body>
</html>