<?php
     session_start();
     $servername="localhost:3306";
     $username="root";
     $password="";
     $dbname="JIS";
     $conn=mysqli_connect($servername,$username,$password,$dbname);
     if($_SERVER["REQUEST_METHOD"]='POST')
     {
        $cin=rand(0,100000000);
        $defendent_name=$_POST['difendent_name'];
        $crime_type=$_POST['crime_type'];
        $commited_date=$_POST['commited_date'];
        $location=$_POST['location'];
        $arresting_officer=$_POST['arresting_officer'];
        $date_of_register_encounter=$_POST['counter_date'];
        $hearing_date=$_POST['hearing'];
        $door_num=$_POST['door_num'];
        $village=$_POST['village'];
        $town=$_POST['town'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $country=$_POST['country'];
        $judge=$_POST['judge'];
        $lawyer=$_POST['lawyer'];
        $start_date=$_POST['start_date'];
        $expected_completion_date=$_POST['expexted_completion_date'];

        $sql="INSERT INTO NEWCASE VALUES('$cin','$defendent_name','$crime_type','$commited_date','$location','$arresting_officer','$date_of_register_encounter','$hearing_date','$judge','$lawyer','$start_date','$expected_completion_date')";
        $sql2= "INSERT INTO ADDRESS VALUES('$cin','$door_num','$village','$town','$city','$state','$country')";

        $result=mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);
        if($result&&$result2)
        {?>
            <h1>Succesfully entered</h1>
            <p>CIN:<?php echo $cin; ?></p>
            <p>Defenent Name:<?php echo $defendent_name; ?></p>
            <p>Arrest Officer:<?php echo $arresting_officer; ?></p>
            <p>Crime:<?php echo $crime_type; ?></p>

        <?php }
     }

?>