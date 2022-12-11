<?php

 //  Gọi tất cả danh mục 
 function getAllPrototie(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM propertie");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
function getOnePrototie($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM propertie WHERE tt_id = $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    return $result;
}
// Get parent propertie
function getParentPrototie(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM propertie WHERE tt_parent_id=0");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


// Insert
function insertPropertie($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO `propertie`( `tt_name`, `tt_type`, `tt_code`, `tt_parent_id`) VALUES ('".$data["tt_name"]."',".(int)$data["tt_type"].", '".$data["tt_code"]."',".(int)$data["tt_parent_id"].")");
    $stmt->execute();
}
// update
function updatePropertie($data){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE `propertie` 
    SET `tt_name`='".$data["tt_name"]."',
    `tt_type`='".$data["tt_type"]."',
    `tt_code`='".$data["tt_code"]."',
    `tt_parent_id`='".$data["tt_parent_id"]."' 
    WHERE `tt_id`='".$data["tt_id"]."'");
    $stmt->execute();
}
// delete
function deletePropertie($id){
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM `propertie` WHERE tt_id = $id");
    $stmt->execute();
}