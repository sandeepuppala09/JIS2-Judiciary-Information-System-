<?php
     session_start();
     $servername="localhost:3306";
     $username="root";
     $password="";
     $dbname="JIS";
     $conn=mysqli_connect($servername,$username,$password,$dbname);

     if($_SERVER["REQUEST_METHOD"]='POST'){
        $id=$_POST['id'];


        $sql="DELETE FROM LAWYER WHERE ID='$id'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn)>0)
        {
            echo 'Deleted';
            //header('location: judge_account_delete.html');
        }
        else{
            echo 'Not Found';
        }
     }
?>