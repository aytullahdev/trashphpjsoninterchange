<?php 
 include '../database/db.php';




   
    if($conn){
        
       $res = array();
       $sql = "SELECT * FROM user_table";
       $result = mysqli_query($conn,$sql);
       
       if(mysqli_num_rows($result)>0){
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

mysqli_close($conn);


?>