<?php
 
 try{
    $servername = "localhost";
 $username = "root";
 $pass ="";
 $db = "mydb";
 $conn = mysqli_connect($servername,$username,$pass,$db);

 }catch(Exception $ex){
   echo "exception called plz retry";
    
 }
 

?>