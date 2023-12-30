<?php
    session_start();
    $servername="localhost:3306";
    $username="root";
    $password="";
    $dbname="JIS";
    $conn=mysqli_connect($servername,$username,$password,$dbname);

    if($_SERVER["REQUEST_METHOD"]='POST'){
        $user_id=mysqli_real_escape_string($conn,$_POST['id']);
        // echo $user_id;
        $user_password=mysqli_real_escape_string($conn,$_POST['pwd']);
        // echo $user_password;
        

        $sql=" SELECT * FROM REGISTERER WHERE ID='$user_id' AND password='$user_password' ";
        $sql2=" SELECT * FROM LAWYER WHERE ID='$user_id' AND password='$user_password' ";
        $sql3=" SELECT * FROM JUDGE WHERE ID='$user_id' AND password='$user_password' ";
        
        $registerer=mysqli_query($conn,$sql);
        $lawyer=mysqli_query($conn,$sql2);
        $judge=mysqli_query($conn,$sql3);

        if(mysqli_num_rows($registerer)==1){
            $_SESSION['name']=$user_id;
            header('location: home.html');

        }
        if(mysqli_num_rows($judge)==1){
            $_SESSION['name']=$user_id;
            header('location: home.html');
            
        }
        if(mysqli_num_rows($lawyer)==1){
            $_SESSION['name']=$user_id;
            header('location: home.html');
            
        }
        else{
            
            $error="uerror";
            
            
        }
    }
?>