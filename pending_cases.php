<?php
    session_start();
     $servername="localhost:3306";
     $username="root";
     $password="";
     $dbname="JIS";
     $conn=mysqli_connect($servername,$username,$password,$dbname);
     $sql='SELECT DISTINCT NEWCASE.*,UPDATE_DETAILS.new_hearing_date,UPDATE_DETAILS.status FROM NEWCASE INNER JOIN UPDATE_DETAILS ON NEWCASE.CIN = UPDATE_DETAILS.CIN  ORDER BY UPDATE_DETAILS.new_hearing_date DESC,CIN';
     $sql2  = "SELECT CIN,crime_type FROM NEWCASE WHERE CIN NOT IN(SELECT CIN FROM UPDATE_DETAILS WHERE status='solved')";

     
     $result=mysqli_query($conn,$sql2);
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home_page.css">
    <style>
      
      table,
      th,
      td
        {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <div class="nav_bar">
        <nav class="navbar navbar-expand-lg navbar-dark NAVBAR">
            <a class="navbar-brand" href="#">
                <img src="/home/apiiit-rkv/Pictures/highcourt_logo.jpeg" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mr-3">
                        <a class="nav-link NAVLINK" href="home.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown mr-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Cases
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item " href="new_case_file1.html">New Case File</a>
                          <a class="dropdown-item " href="update_old_case.html">Update old case</a>
                          
                          <a class="dropdown-item " href="case_complition.html">Case completion</a>
                        </div>
                      </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link NAVLINK" href="#">Case Status</a>
                      </li>
                      <li class="nav-item mr-3">
                        <a class="nav-link NAVLINK" href="#">Calender</a>
                      </li>
                      <li class="nav-item dropdown mr-3">
                        <a class="nav-link dropdown-toggle NAVLINK" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Account Management
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="account_creation.html">Account Creation</a>
                          <a class="dropdown-item" href="#">Delete Account</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                      <li class="nav-item mr-3">
                        <a class="nav-link NAVLINK" href="#">print</a>
                      </li>
                   </ul>
                

                
              </div>
            </div>
          </nav>

    </div>
    <div>
    <?php
          
          if(mysqli_affected_rows($conn) <= 0)
          {
            ?><h1>No Pending Cases</h1><?php
          }
          else{
        
        
   
     while($row=mysqli_fetch_assoc($result))
            
     { ?>
        <div class = "table table-bordered table-hover table-responsive-sm table-responsive-bg">
        <table class = "table-striped" > 
            <tr class="table table-primary">
                <th>CIN</th>
                <th>Crime Type</th>
                <th>Status</th>
                <th>More<th>
            </tr>
            <tr>
                <td><?php echo $row['CIN']; ?></td>
                <td><?php echo $row['crime_type']; ?></td>
                <td>Pending</td>
                <td><a href="more.php?id=<?php echo $row['CIN'];?>">more</a></td>
                
            </tr>
          
        </table>
        </div>

        
        
     </body>
     <?php
    }
    }
    ?>