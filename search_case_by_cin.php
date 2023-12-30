
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
    <div class = "container-fluid">
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
      <div class = "form">
      <form action="search_case_by_cin.php" method="post">
          <p>Search: <input type="text" name="cin" id="cin"> <button type="submit">search</button></p>
      </form>
      </div>
    <?php
    
    #session_start();
     $servername="localhost:3306";
     $username="root";
     $password="";
     $dbname="JIS";
     $conn=mysqli_connect($servername,$username,$password,$dbname);
     if($_SERVER["REQUEST_METHOD"]='POST')
     {
      if (isset($_POST['cin'])) {
        $cin=$_POST['cin'];
        $sql="SELECT * FROM NEWCASE WHERE CIN='$cin'";
        $sql2="SELECT * FROM UPDATE_DETAILS WHERE CIN='$cin' ORDER BY CIN,new_hearing_date ";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            
            {

            
     
?>
        <div class = "table table-bordered table-hover table-responsive-sm table-responsive-bg">
          <table>
              <tr class = "table-primary">
                  <th>CIN</th>
                  <th>Name of Defendent</th>
                  <th>Crime Type</th>
                  <th>Commited Date</th>
                  <th>Location</th>
                  <th>Arresting Officer</th>
                  <th>Counter Register Date</th>
                  <th>Hearing Date</th>
                  <th>Judge</th>
                  <th>Lawyer</th>
                  <th>Start Date</th>
                  <th>Expected ending Date</th>
                  <th>More</th>

              </tr>
              <tr>
                  <td><?php echo $row['CIN']; ?></td>
                  <td><?php echo $row['name_of_defendent']; ?></td>
                  <td><?php echo $row['crime_type']; ?></td>
                  <td><?php echo $row['commited_date']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td><?php echo $row['arresting_officer']; ?></td>
                  <td><?php echo $row['counter_register_date']; ?></td>
                  <td><?php echo $row['hearing_date']; ?></td>
                  <td><?php echo $row['Judge']; ?></td>
                  <td><?php echo $row['lawyer']; ?></td>
                  <td><?php echo $row['start_date']; ?></td>
                  <td><?php echo $row['expexted_completion_date']; ?></td>
                  <td><a href="more.php?id=<?php echo $row['CIN']; ?>">more</a></td>
              </tr>
          </table>
        </div>
        
        
    

    
        <?php
    }    
    }?>

   
 <div class = "table table-bordered table-hover table-responsive-sm">
 <table>
            <tr class = "table-primary">
                <th>CIN</th>
                <th>Reason for Audjournment</th>
                <th>New Hearing Date</th>
                <th>Summary of Court Proceedings</th>
                <th>Status</th>
                <th>Summary of Judgement</th>
                <th>More</th>

            </tr>
            <?php
        while($row1=mysqli_fetch_assoc($result2)){?>
            <tr>
               <td><?php echo $row1['CIN']; ?></td>
               <td><?php echo $row1['reason_for_audjournment']; ?></td>
               <td><?php echo $row1['new_hearing_date']; ?></td>
               <td><?php echo $row1['summary_of_court_proceedings']; ?></td>
               <td><?php echo $row1['status']; ?></td>
               <td><?php echo $row1['summary_of_judgement']; ?></td>
               <td><a href="more.php?id=<?php echo $row1['CIN']; ?>">more</a></td>
            </tr>
            <?php
        }
            ?>
            <br>
        </table>
 </div> 
 </div>      

    <?php  }}
    else
    {?>
      <div class = "form">
      <form action="search_case_by_cin.php" method="post">
          <p>Search: <input type="text" name="cin" id="cin"> <button type="submit">search</button></p>
      </form>
      </div>
    <?php } ?>
    <div>

</body>