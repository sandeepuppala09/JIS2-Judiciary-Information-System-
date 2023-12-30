<?php
     session_start();
     $servername="localhost:3306";
     $username="root";
     $password="";
     $dbname="JIS";
     $conn=mysqli_connect($servername,$username,$password,$dbname);

     if($_SERVER["REQUEST_METHOD"]='POST'){
        $id=$_POST['id'];


        $sql="DELETE FROM JUDGE WHERE ID='$id'";
        $result=mysqli_query($conn,$sql);
        //echo 'affected rows'. mysqli_affected_rows($conn);
        if(mysqli_affected_rows($conn)>0){ 
        
            echo 'Deleted';
            //header('location: judge_account_delete.html');
        }
        else
        {
            echo "Not found";
        }
     }
?>