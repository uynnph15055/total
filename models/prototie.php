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
function getParentPrototie(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM propertie WHERE tt_parent_id=0");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}