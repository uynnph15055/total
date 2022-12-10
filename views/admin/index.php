<?php

include './../../Config/Connect.php';
include './../../helper/dd.php';
include './../../helper/baseAdmin.php';
include './../../models/category.php';
include './../../models/prototie.php';
include './layouts/header.php';

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch ($url) {
        case 'thuoc-tinh':
            $proto = getAllPrototie();
            $parent =  getParentPrototie();
            include './prototie/index.php';
            break;
        case 'luu-thuoc-tinh':
            if (isset($_POST)) {
                try {
                    if ($_POST["tt_type"] == 0) {
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
            if ($_FILES['dm_image']) {
                $file = $_FILES['dm_image'];
                $fileName = './../../upload/' . $file["name"];
                move_uploaded_file($file["tmp_name"], $fileName);
                if ($_POST) {
                    $_POST["dm_image"] =  $fileName;
                    try {
                        insertCate($_POST);
                        header("location:" . BASE_ADMIN . "danh-muc");
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            }
            break;
        case 'sua-danh-muc':
            if (isset($_GET['id'])) {
                $cate = getOneCategory($_GET['id']);
            }
            include './category/update.php';
            break;
        case 'luu-sua-danh-muc':
            if ($_FILES['dm_image']["name"]) {
                $file = $_FILES['dm_image'];
                $fileName = './../../upload/' . $file["name"];
                move_uploaded_file($file["tmp_name"], $fileName);
                if ($_POST) {
                    // dd($_POST);
                    $_POST["dm_image"] =  $fileName;
                    try {
                        updateCate($_POST);
                        header("location:" . BASE_ADMIN . "danh-muc");
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            }
            break;
        case 'xoa-danh-muc':
            if (isset($_GET['id'])) {
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
} else {
    include './main.php';
}


include './layouts/footer.php';
