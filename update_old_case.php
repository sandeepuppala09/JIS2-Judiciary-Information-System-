<?php
    session_start();
    $servername="localhost:3306";
    $username="root";
    $password="";
    $dbname="JIS";
    $conn=mysqli_connect($servername,$username,$password,$dbname);

    if($_SERVER["REQUEST_METHOD"]='POST')
    {
        $cin=$_POST['cin'];
        
        $reason_for_audjournment=$_POST['reason_for_audjournment'];
        
        $new_hearing_date=$_POST['newDate'];
       
        $summary_of_court_proceedings=$_POST['summary_of_court_proceedings'];
       
        $status=$_POST['status'];
        $summary_of_judgement=$_POST['summary_of_judgement'];

        $sql="INSERT INTO UPDATE_DETAILS VALUE('$cin','$reason_for_audjournment','$new_hearing_date','$summary_of_court_proceedings','$status','$summary_of_judgement')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {?>
            <h3>recodes added</h3>
        <?php }
        
    }

?>