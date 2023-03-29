<?php
class Buyer
{
    public static function change_password_post()
    {
        $req = json_decode(file_get_contents('php://input'));
        if ($req->new_pass != $req->cnew_pass) {
            echo "Both Passwords doesn't match";
            exit; 
        }
        $stat = "update person set password='$req->new_pass' where person_id={$_SESSION['id']}";
        $data=database::query($stat);
        if($data=='failure'){
            echo "Something went wrong,please try again after sometime";
            exit;
        }
        if(send_mail("{$_SESSION['mail']}","{$_SESSION['name']}", "Password Changed", "<h1>Your Hammer Account password has been changed successfully</h1>"))
            echo "password change successfully";
        else
            echo "Password Changed but email not sent";
        exit;
    }
    public static function change_password_get()
    {
        include 'Views/Authentication/changepassword.php';
        exit;
    }
    public static function load_more()
    {
        $temp_data = json_decode(file_get_contents('php://input'));
        $stat = "select * from products order by product_id offset {$temp_data->no} rows fetch next 5 row only";
        $more_products = database::query($stat);
        if($more_products=='failure')
        {
            echo "failure";
            exit;
        }
        print_r(json_encode($more_products));
        exit;   
    }
    public static function product_info()
    {
        $req_data = json_decode(file_get_contents('php://input'));
        $stat = "select * from products where product_id={$req_data->id}";
        $data = database::query($stat);
        if($data=='failure')
        {
            echo "failure";
            exit;
        }
        print_r(json_encode($data));
        exit;
    }
    public static function display_cart()
    {
        $stat = "select pt.name product_name,ct.cart_id,pt.path,pt.price,ct.quantity,st.name,pt.quantity product_quantity from products pt, cart ct, person st where ct.product_id=pt.product_id and pt.seller_id=st.person_id and ct.user_id={$_SESSION['id']}";
        $data = database::query($stat);
        if($data=='failure')
        {
            include 'Views/Error/error.php';
            exit;
        }
        include 'Views/Buyer/cart.php';
        exit;
    }
    public static function add_to_cart()
    {
        $req_data = json_decode(file_get_contents('php://input'));
        $stat = "select * from cart where product_id={$req_data->product_id} and user_id={$_SESSION['id']}";
        $data = database::query($stat);
        if (count($data) - 1)
            $stat = "update cart set quantity=({$data[0]['quantity']} + 1) where product_id={$req_data->product_id} and user_id={$_SESSION['id']}";
        else
            $stat = "insert into cart(product_id,user_id,status,quantity) values({$req_data->product_id},{$_SESSION['id']},0,1)";
        $data=database::query($stat);
        if($data=='failure')
        {echo "failure";
        exit;}
        echo "success";
        exit;
    }
    public static function remove_from_cart()
    {
        $req_data = json_decode(file_get_contents("php://input"));
        $stat = "delete from cart where product_id={$req_data->product_id} and user_id={$_SESSION['id']}";
        $data=database::query($stat);
        if($data=='failure')
        {
            echo "failure";
            exit;
        }
        echo "success";
        exit;
    }
    public static function orders()
    {
        $stat="select pt.name,pt.price,pt.path,ot.quantity,ot.date,ot.address,ot.status from products pt inner join orders ot on ot.product_id=pt.product_id where ot.user_id={$_SESSION['id']} order by date desc";
        $orders=database::query($stat);
        if($orders=='failure')
        include 'Views/Error/error.php';
        else
        include 'Views/Buyer/orders.php';
        exit;
    }
    public static function delete_from_cart()
    {
        $req_data = json_decode(file_get_contents('php://input'));
        $stat = "delete from cart where cart_id={$req_data->cart_id}";
        $data=database::query($stat);
        if($data=='failure')
        {
            echo "failure";
            exit;
        }
        echo "success";
        exit;
    }
    public static function save_address()
    {
        $req_data = json_decode(file_get_contents('php://input'));
        $stat = "update person set address='{$req_data->address}' where person_id={$_SESSION['id']}";
        $data=database::query($stat);
        if($data=='failure')
        echo "failure";
        else
        echo "success";
        exit;
    }
    public static function change_quantity()
    {
        $req_data = json_decode(file_get_contents('php://input'));
        if ($req_data->quantity == 0)
            $stat = "delete from cart where cart_id={$req_data->cart_id}";
        else
            $stat = "select products.quantity from products,cart where products.product_id=cart.product_id and cart_id={$req_data->cart_id}";
        $data = database::query($stat);
        if($data=='failure')
        {
            echo "failure";
            exit;
        }
        if (count($data) - 1) {
            if ($req_data->quantity > $data[0]['quantity'])
                echo "out of stock";
            else {
                $stat = "update cart set quantity={$req_data->quantity} where cart_id={$req_data->cart_id}";
                $data2=database::query($stat);
                if($data2=='failure')
                {
                    echo "failure";
                    exit;
                }
                echo "success";
            }
        } else {
            echo "success";
        }
        exit;    
    }
    public static function place_order()
    {
        $stat="select ct.cart_id,ct.product_id,ct.user_id,ct.quantity,pt.address from cart ct inner join person pt on ct.user_id=pt.person_id where user_id={$_SESSION['id']}";
        $cart_items=database::query($stat);
        if($cart_items=='failure')
        {
            echo "server down";
        }
        else{
            $obj=new transaction();
              $obj->query("BEGIN");
              for($i=0;$i<(count($cart_items)-1);$i++)
              {
                $up_stat="update products set quantity=quantity-{$cart_items[$i]['quantity']} where product_id={$cart_items[$i]['product_id']};";
                $status=$obj->query($up_stat);
                if($status)
                {
                    $ot_stat="insert into orders(user_id,product_id,address,quantity) values({$_SESSION['id']},{$cart_items[$i]['product_id']},'{$cart_items[$i]['address']}',{$cart_items[$i]['quantity']});";
                    if($obj->query($ot_stat))
                    {
                        $stat="delete from cart where cart_id={$cart_items[$i]['cart_id']};";
                        if(!$obj->query($stat))
                        {
                            echo "Server Problem";
                            exit;
                        }
                    } 
                    else
                    {
                        echo "Server Problem";
                        exit;
                    }
                }
                else{
                    $obj->query("ROLLBACK;");
                    echo "out of stock something";
                    exit;
                }
              }
              if($obj->query("COMMIT;"))
              echo "order placed";
              else
              echo "server problem";
              exit;
        }
    }
}