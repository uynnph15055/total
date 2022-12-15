<?php

include './../../Config/Connect.php';
include './../../helper/dd.php';
include './../../helper/baseAdmin.php';
include './../../models/category.php';
include './../../models/prototie.php';
include './../../models/product.php';

if(isset($_GET['url'])){
    $url = $_GET['url'];
    switch ($url) {
        case 'update-status-product':
            try {
                updateStatusProduct($_GET["id"] , $_GET["value"]);
                echo 'success';
            } catch (\Throwable $th) {
                echo 'error';
            }
            break;
    }
}