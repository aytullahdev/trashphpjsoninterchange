<?php 
 include '../database/db.php';
$req = file_get_contents('php://input');
$obj = json_decode($req,true);


if(sizeof($obj)==5){
    $res = array();
    $email = $obj['email'];
    if( empty($obj['email']) || empty($obj['uname']) || empty($obj['phone']) || empty($obj['name'])){
        echo json_encode(
            array("msg"=>"plz correct your input")
        );

    }else if($conn){
        
       
       $sql = "UPDATE user_table SET name='".$obj['name']."', username='".$obj['uname']."', email='".$obj['email']."', phone='".$obj['phone']."', website ='".$obj['web']."' WHERE email='$email'";
       
       
       if( mysqli_query($conn,$sql)){
        echo json_encode(
            array("msg"=>"Data iserted")
        );

       }else{
           
           echo json_encode(
               array("msg"=>"Error plz try again")
           );
       }


    }else{
       
        echo json_encode(
            array("msg"=>"Connection Error Plz try again later")
        );

    }
}else{
    echo json_encode(
        array("msg"=>"Check your input!")
    );
    
}

mysqli_close($conn);


?>