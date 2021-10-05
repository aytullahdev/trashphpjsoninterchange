<?php
include "database/db.php";
$filename = "usr.json";
$data = file_get_contents($filename);
$array = json_decode($data,true);
foreach($array as $row){
    $sql = "INSERT INTO USER_TABLE(id,name,username,email,address,phone,website,company) VALUES('".$row["id"]."','".$row["name"]."','".$row["username"]."','".$row["email"]."','".json_encode($row["address"])."','".$row["phone"]."','".$row["website"]."','".json_encode($row["company"])."')";
    if(mysqli_query($conn,$sql)){
        echo 'Inserted."'. $row["id"].'" <br>';
    }else{
        echo 'Error."'. $row["id"].'" <br>';
    }
}
?>