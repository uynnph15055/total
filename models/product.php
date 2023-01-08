<?php

function insertProduct($data){
    $conn = connect();
    $stmt = $conn->prepare("    INSERT INTO `products`(`sp_image`, `sp_name`, `sp_price`, `sp_sale`, `sp_quantity`, `cate_id`, `proper_id`, `sp_description`, `sp_intro`)
    VALUES ('".$data["sp_image"]."','".$data["sp_name"]."',' ".$data["sp_price"]."','".$data["sp_sale"]." ',".(int)$data["sp_quantity"].", ".(int)$data["cate_id"].",".(int)$data["proper_id"].",  '".$data["sp_description"]."' , '".$data["sp_intro"]."' )");
    $stmt->execute();

}

function updateStatusProduct($id , $value){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE `products`  SET `status` = $value WHERE `id` = $id");
    $stmt->execute();

}

function updateViewProduct($id , $value){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE `products`  SET `number_view` = $value WHERE `id` = $id");
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



// Tìm kiếm theo tên
function getProductByName($keyword){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM products WHERE sp_name LIKE '%".$keyword."%'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Gọi tất cả sản phẩm ra ngoài
function getProductDetail($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM products INNER JOIN propertie ON propertie.tt_id = products.proper_id  WHERE products.id = $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Gọi tất cả sản phẩm ra ngoài
function getProductWhereCate($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM products WHERE cate_id = $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


// Gọi tất cả sản phẩm ra ngoài
function getProductWhereCateRemoveIt($cate_id, $id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM products WHERE cate_id = $cate_id AND id != $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Gọi tất cả sản phẩm ra ngoài
function getProductList(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM products INNER JOIN category ON products.cate_id = category.dm_id INNER JOIN propertie ON products.proper_id = propertie.tt_id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}