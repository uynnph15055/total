<?php

function insertProduct($data){
    $conn = connect();
    $stmt = $conn->prepare("    INSERT INTO `products`(`sp_image`, `sp_name`, `sp_price`, `sp_sale`, `sp_quantity`, `cate_id`, `proper_id`, `sp_description`, `sp_intro`)
    VALUES ('".$data["sp_image"]."','".$data["sp_name"]."',' ".$data["sp_price"]."','".$data["sp_sale"]." ',".(int)$data["sp_quantity"].", ".(int)$data["cate_id"].",".(int)$data["proper_id"].",  '".$data["sp_description"]."' , '".$data["sp_intro"]."' )");
    $stmt->execute();

}


// Gọi tất cả sản phẩm ra ngoài
function getProductAll(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM products");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Gọi tất cả sản phẩm ra ngoài
function getProductDetail($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM products WHERE id = $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}