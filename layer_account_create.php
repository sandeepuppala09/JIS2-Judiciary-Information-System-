<?php
     session_start();
     $servername="localhost:3306";
     $username="root";
     $password="";
     $dbname="JIS";
     $conn=mysqli_connect($servername,$username,$password,$dbname);

     if($_SERVER["REQUEST_METHOD"]='POST'){
        $name=$_POST['name'];
        $ID=$_POST['username'];
        $pwd=$_POST['password'];

        $sql="INSERT INTO LAWYER VALUES('$name','$ID','$pwd')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header('location: lawyer_account.html');
        }
     }
?>