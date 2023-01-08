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

// Get parent propertie
function getParentPrototie($parent_id = 0){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM propertie WHERE tt_parent_id=$parent_id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Get parent propertie
function getPrototieDontParent(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM propertie WHERE tt_parent_id != 0");
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