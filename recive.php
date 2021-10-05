<?php 
 include 'database/db.php';
$req = file_get_contents('php://input');
$obj = json_decode($req,true);


if(sizeof($obj)==1){
    $res = array();
    $name = $obj['email'];
   
    if($conn){
        
       
       $sql = "SELECT address FROM user_table WHERE email='$name'";
       $result = mysqli_query($conn,$sql);
       
       if(mysqli_num_rows($result)==1){
          while($row = mysqli_fetch_assoc($result)){
            $res[] = $row;
          }
         $res = json_encode($res);
         echo $res;

       }else{
           
           echo json_encode(
               array("msf"=>"Data is not found")
           );
       }


    }else{
       
        echo json_encode(
            array("msf"=>"Connection Error Plz try again later")
        );

    }
}else{
    echo json_encode(
        array("msf"=>"Check your input!")
    );
    
}

mysqli_close($conn);


?>