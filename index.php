<?php
$insert = false;
error_reporting(0);
if(isset($_POST['NAME'])){
    
    $_SERVER = "localhost"; 
    $username = "root";
    $password = "";

    $con = mysqli_connect($_SERVER ,$username, $password);

    if(!$con){
        die("connection to this database failed due to ". 
        mysqli_connect_error());
    }
    //echo "Success connecting to database"

    $name = $_POST['name'];
    $Year = $_POST['Year'];
    $Gender = $_POST['Gender'];
    $Branch = $_POST['Branch'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `Name`, `Year`, `Gender`, `Branch`, `Email`, `Phone`, `desc`, `Date`) VALUES ( 
    '$Name', '$Year', '$Gender', '$Branch', '$Email', '$Phone', '$desc', current_timestamp())";
    //echo $sql;

    if($con->query($sql) == true){
        //echo"Successfully Inserted";
        $insert = true;
    }
    else{
        echo"ERROR: $sql <br> $con->error";
        
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome to THAPAR Travel Form</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    
    <div class="container">
        <h1>Welcome to Ladakh Trip Travel Form</h1>
        <p>Enter your details and submit this form to book your seat</p>
        <?php
        if($insert == true){
        echo"<p>class='Submit Message'>Thanks for submitting the form your reponse has been noted</p>";}
    ?>

        <form action="index.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter your name">
            <input type="text" name="Year" id="Year" placeholder="Enter your year">
            <input type="text" name="Gender" id="Gender" placeholder="Enter your gender">
            <input type="text" name="Branch" id="Branch" placeholder="Enter your branch">
            <input type="text" name="Email" id="Email" placeholder="Enter your email">
            <input type="text" name="Phone" id="Phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter information regarding past or ongoing health issues"></textarea>
            <button class="btn">Submit</button>
            <!--button class="btn">Reset</button-->
        </form>

    </div>
    <script src="index.js"></script>
    
</body>
</html>