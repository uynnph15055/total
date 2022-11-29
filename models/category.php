<?php

 //  Gọi tất cả danh mục 
function getAllCategory(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM category");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Thêm danh mục
function insertCate($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO category (dm_name,dm_image) VALUES ('".$data["dm_name"]."' , '".$data["dm_image"]."')");
    $stmt->execute();
}

// Xóa danh mục
function deleteCate($id){
    $conn = connect();
    $sql = "DELETE FROM category WHERE category.dm_id = ".$id;
    $conn->exec($sql);
}