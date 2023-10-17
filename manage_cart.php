<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            //this will take all the items inside the Item_Name and store it inside the variable
            $myitems=array_column($_SESSION['cart'],'Item_Name');

            // this will raise the alert if the item already exist
            if(in_array($_POST['Item_Name'],$myitems))
            {
                echo"<script>
                alert('item Already Exist');
                window.location.href = 'home.php';
                </script>";
            }
            else{
            //this will count the number of items in the cart and also add the new item to it
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
            print_r($_SESSION['cart']);
            echo"<script>
                alert('item Added');
                window.location.href = 'home.php';
            </script>";
            }
        }
        else
        {
            //if cart is empty then this will add the items from the POST to the cart
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1);
            print_r($_SESSION['cart']);
            echo"<script>
                alert('item Added');
                window.location.href = 'home.php';
            </script>";
        }
    }
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['Item_Name'] == $_POST['Item_Name'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);      // to rearrange it properly when any random value will be deleted
                echo"
                    <script>
                    alert('Item Removed');
                    window.location.href='myCart.php';
                    </script>
                ";
            }
        }
    }
}

?>
