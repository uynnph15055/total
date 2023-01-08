<?php

function insertUser($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO `user`(`username`, `email`, `password`, `phone`) 
    VALUES ('".$data["username"]."','".$data["email"]."',' ".$data["password"]."','".$data["phone"]."')");
    $stmt->execute();
}

function insertComment($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO `comment`(`pro_id`, `user_id`, `content`) 
    VALUES (".$data["pro_id"].",".$data["user_id"].",' ".$data["content"]."')");
    $stmt->execute();

}


// Gọi tất cả sản phẩm ra ngoài
function getUserWhereEmail($email){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM `user` WHERE `email` = '".$email ."'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}



// Gọi tất cả sản phẩm ra ngoài
function getComment($proId){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM `comment`
     INNER JOIN `user` ON comment.user_id = user.id WHERE comment.pro_id = $proId");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}