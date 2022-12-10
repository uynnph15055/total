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
function getOneCategory($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM category WHERE dm_id = $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    return $result;
}
// Thêm danh mục
function insertCate($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO category (dm_name,dm_image) VALUES ('".$data["dm_name"]."' , '".$data["dm_image"]."')");
    $stmt->execute();
}
// Sửa danh mục
function updateCate($data){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE `category` SET `dm_image`='".$data['dm_image']."',`dm_name`='".$data["dm_name"]."' WHERE `dm_id` = '".$data['dm_id']."' ");
    $stmt->execute();
}
// Xóa danh mục
function deleteCate($id){
    $conn = connect();
    $sql = "DELETE FROM category WHERE category.dm_id = ".$id;
    $conn->exec($sql);
}