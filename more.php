<?php
session_start();
$servername="localhost:3306";
$username="root";
$password="";
$dbname="JIS";
$conn=mysqli_connect($servername,$username,$password,$dbname);
$sid = $_SESSION['name'];
echo $sid;
$id = $_GET['id'];
$sql = "SELECT * from LAWYER WHERE ID='$sid'";
$sql2 = "SELECT * from JUDGE WHERE ID='$sid'";

$result = mysqli_query($conn,$sql);
$result2 = mysqli_query($conn,$sql2);
$paid=1;
if(isset($_GET['paid']))
{
    $paid=$_GET['paid'];
}

echo '\n'.$paid;

if(($paid != "2") && (mysqli_num_rows($result) >= 1 && mysqli_num_rows($result2) == 0))
{?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
        <link rel="stylesheet" href="home_page.css">
        <title>Document</title>
    </head>
    <body>
    <div class="container container-fluid">
    <div class="justify-content-center">
        <p>you have to pay  20 rs</p>
        <button><a href="payment.php?id='<?php echo $id; ?>'">PAY</a></button>
    </div>
    
<?php
}
else
{
    $sql3 = "SELECT more_about FROM MORE_DETAILS WHERE CIN = $id";
    echo $id;
    $result3 = mysqli_query($conn,$sql3);
    if(mysqli_num_rows($result3)>0)
        {
            while($row=mysqli_fetch_assoc($result3))
            
            {

            
    ?>
    
        
            <p><?php echo $row['more_about']; ?></p>
        </div>
    </body>
    </html>
<?php
    }}
}
echo $id;


?>