<?php

include './Config/Connect.php';
include './layouts/header.php';

if(isset($_GET['url'])){
    $url = $_GET['url'];
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

        default:
            # code...
            break;
    }
}else{
    include './home.php';
}


include './layouts/footer.php';