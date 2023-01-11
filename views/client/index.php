<?php

ob_start();
session_start();
include './../../Config/Connect.php';
include './../../helper/dd.php';
include './../../helper/baseAdmin.php';
include './../../models/category.php';
include './../../models/prototie.php';
include './../../models/auth.php';
include './../../models/product.php';

include './layouts/header.php';

if(isset($_GET['url'])){
    $url = $_GET['url'];
    $cate= getAllCategory();
    switch ($url) {
        case 'gioi-thieu':
            include './infomation.php';
            break;
        case 'san-pham':
            include './product.php';
            break;
        case 'lien-he':
            include './contact.php';
         break;
         case 'chi-tiet-san-pham':
            if(isset($_GET['id'])){
                $comment = getComment($_GET['id']);
                $rowPro = getProductDetail($_GET['id'])[0];
                $product = getProductWhereCateRemoveIt($rowPro['cate_id'], $_GET['id']);
                updateViewProduct($_GET['id'] ,  $rowPro['number_view'] + 1);
                include './productDetail.php';
            }
            break;

        case 'them-gio-hang':
            if(isset($_POST)){
                $productId = $_POST["sp_id"];
                $rowProduct = getProductDetail($productId)[0];
                if(isset($_SESSION["cart"])){
                    $cart = $_SESSION["cart"];
                    if(array_key_exists($productId , $cart)){
                        $cart[$productId] = [
                            'id' => $productId,
                             'name' => $rowProduct["sp_name"],
                             'image' => $rowProduct["sp_image"],
                             'quantity' => $_POST["quantity"] + $cart[$productId]['quantity'],
                             'price' => $rowProduct["sp_sale"],
                        ];
                    }else{
                        $cart[$productId] = [
                            'id' => $productId,
                             'name' => $rowProduct["sp_name"],
                             'image' => $rowProduct["sp_image"],
                             'quantity' => $_POST["quantity"],
                             'price' => $rowProduct["sp_sale"],
                        ];
                    }
                }else{
                    $cart[$productId] = [
                        'id' => $productId,
                         'name' => $rowProduct["sp_name"],
                         'image' => $rowProduct["sp_image"],
                         'quantity' => $_POST["quantity"],
                         'price' => $rowProduct["sp_sale"],
                    ];
                }

                $_SESSION["cart"] = $cart;
                dd($_SESSION["cart"]);

            }
            break;

        case 'tim-kiem-theo-ten':
            if(isset($_POST['keyword'])){
                $product = getProductByName($_POST['keyword']);
            }
            include './home.php';
            break;

        case 'loc-theo-danh-muc':
            if(isset($_GET['id'])){
                $product = getProductWhereCate($_GET["id"]);
            }
            include './home.php';
            break;

        case 'dang-ky':
           
            include './register.php';
            break;

        case 'save-dang-ky':
            if(isset($_POST)){
                $_POST['password'] = password_hash( $_POST['password'] , PASSWORD_DEFAULT);
                insertUser($_POST);
                header("Location: http://localhost:8080/total/views/client/?url=dang-nhap");    
            }
            break;
            
        case 'dang-xuat':
            unset($_SESSION['user_client']);
            header("Location: http://localhost:8080/total/views/client/");    
            break;

        case 'dang-nhap':
            include './login.php';
            break;

        case 'save-binh-luan':
             if(isset($_POST) && isset($_SESSION["user_client"])){
                 $_POST["user_id"]  = $_SESSION["user_client"]["id"];
                insertComment($_POST);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
             }else{
                header("Location: http://localhost:8080/total/views/client/");   
             }
            break;

        case 'save-dang-nhap':
            if(isset($_POST)){
                $rowUser = getUserWhereEmail($_POST['email'])[0];
                if(password_verify($_POST["password"] ,$rowUser["password"]) ){
                    if($rowUser['role'] == 0){
                        $_SESSION['user_client'] = $rowUser;
                        header("Location: http://localhost:8080/total/views/client/");   
                        echo 'T là khách hàng';
                    }else{
                        $_SESSION['user_admin'] = $rowUser;
                        header("Location: http://localhost:8080/total/views/admmin/");  
                        echo 'T là admin';
                    }
                }else{
                    echo 'Bạn đang nhập sai tài khoản !!!';
                    die;
                }
            }
            include './login.php';
            break;

        default:
            # code...
            break;
    }
}else{
    $cate= getAllCategory();
    $product= getProductAll();
    include './home.php';
}


include './layouts/footer.php';
ob_flush();