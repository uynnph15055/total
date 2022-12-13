<?php

include './../../Config/Connect.php';
include './../../helper/dd.php';
include './../../helper/baseAdmin.php';
include './../../models/category.php';
include './../../models/prototie.php';
include './../../models/product.php';
include './layouts/header.php';

if(isset($_GET['url'])){
    $url = $_GET['url'];
    switch ($url) {
        case 'them-san-pham':
            $proto =  getPrototieDontParent();
            $cate = getAllCategory();
            include './product/add.php';
            break;

        case 'chi-tiet-san-pham':
            $proto =  getProductDetail($_GET['id'])[0];
            include './product/detail.php';
            break;
        
       case 'san-pham':
            $proto =  getProductAll();
            include './product/index.php';
            break;

        case 'luu-them-san-pham':
            if($_FILES["sp_image"]){
                $file = $_FILES["sp_image"];
                $fileName = $file["name"];
                move_uploaded_file($file["tmp_name"] , './../../upload/' . $fileName);
                $_POST['sp_image'] = $fileName;
                insertProduct($_POST);
                dd('success');
            }
          
            break;

        case 'thuoc-tinh':
            $proto = getAllPrototie();
            $parent =  getParentPrototie();
            include './prototie/index.php';
            break;
        case 'luu-thuoc-tinh':
            if(isset($_POST)){
                try {
                    if($_POST["tt_type"] == 0){
                        $_POST['tt_code'] = NULL;
                    }
                    insertPropertie($_POST);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } catch (\Throwable $th) {
                    dd('Lỗi ko thêm được !!!');
                }
             
            }
            include './prototie/index.php';
            break;

        case 'danh-muc':
            $cate = getAllCategory();
            include './category/index.php';
            break;
        case 'them-danh-muc':
            include './category/add.php';
            break;

         case 'luu-them-danh-muc':
            if($_FILES['dm_image']){
                $file = $_FILES['dm_image'];
                $fileName = $file["name"];
                move_uploaded_file($file["tmp_name"] , './../../upload/' . $fileName);
                if($_POST){
                    $_POST["dm_image"] =  $fileName;
                    try {
                        insertCate( $_POST);
                        header("location:".BASE_ADMIN."danh-muc");
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            }
            break;

        case 'xoa-danh-muc':
            if(isset($_GET['id'])){
                deleteCate($_GET['id']);        
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            include './category/add.php';
            break;
        case 'lien-he':
            include './contact.php';
            break;

        default:
            # code...
            break;
    }
}else{
    include './main.php';
}


include './layouts/footer.php';