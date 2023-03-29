<?php
class Seller
{
    public static function home()
    {
        $stat = "select * from products where seller_id={$_SESSION['id']} and status=1";
        $products = database::query($stat);
        if($products=='failure')
        {
            include 'Views/Error/error.php';
            exit;
        }
        include 'Views/Seller/Seller_home_page.php';
    }
    public static function add_product()
    {
        $name = time();
        $target = "uploads/";
        $_FILES['path']['name']=$name;
        $target = $target . basename($_FILES['path']['name']);
        $stat="insert into products(name,description,price,quantity,path,seller_id) values('{$_POST['name']}','{$_POST['description']}',{$_POST['price']},{$_POST['quantity']},'uploads/{$_FILES['path']['name']}',{$_SESSION['id']});";
        $data=database::query($stat);
        if($data=='failure')
        {
            echo "Something went wrong,please try again after sometime";
            exit;
        }
        if (move_uploaded_file($_FILES['path']['tmp_name'], $target)) {
            echo "Product added successfully";
        } 
        else {
            echo "image uploaded is not of valid type";    
        }
        exit;
    }
    public static function edit_product()
    {
        $name = time();
        $target = "uploads/";
        $_FILES['path']['name']=$name;
        $target = $target . basename($_FILES['path']['name']);
        $stat = "update produts set name='{$_POST['name']}', description='{$_POST['description']}', price={$_POST['price']}, quantity={$_POST['quantity']},path='uploads/{$_FILES['path']['name']}' where product_id={$_POST['product_id']}";
        $data=database::query($stat);
        if($data=='failure')
        {
            echo "Something went wrong,Please try again after sometime";
            exit;
        }
        if (move_uploaded_file($_FILES['path']['tmp_name'], $target)) {
            echo "Product edit successfully";
        } 
        else {
            echo "image uploaded is not of valid type";    
        }
        exit;
    }
    public static function delete_product()
    {
        $req_data = json_decode(file_get_contents('php://input'));
        $stat = "update products set quantity=0,status=0 where product_id={$req_data->id}";
        $data=database::query($stat);
        if($data=='failure')
        echo 'failure';
        else
        echo "success";
        exit;
    }
    public static function orders()
    {
        $stat="select orders.address,orders.order_id,orders.status,orders.date,orders.quantity,products.name as product_name, person.name as buyer_name from products   inner join ( orders inner join person on orders.user_id=person.person_id) on products.product_id=orders.product_id  where products.seller_id={$_SESSION['id']}";
        $orders=database::query($stat);
        if($orders=='failure')
        include 'Views/Error/error.php';
        else
        include('Views/Seller/orders.php');
        exit;   
    }
    public static function change_status()
    {
        $req_data=json_decode(file_get_contents('php://input'));
        $stat="select status from orders where order_id={$req_data->order_id}";
        $data=database::query($stat);
        if($data=='failure')
        {
            echo "failure in first query";
            exit;
        }
        $newdata=json_decode($data[0]['status']);
        $newdata[]=$req_data->value;
        $abc=json_encode($newdata);
        $stat="update orders set status='$abc' where order_id={$req_data->order_id}";
        $data=database::query($stat);
        if($data=='failure')
        {
            echo "failure in second query";
            exit;
        }
        echo "success";
        exit;    
    }
}