<?php
$insert=false;
if(isset($_POST['firstname']))
{

    $server= "localhost";
    $username= "root";
    $password= "";

    $con= mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to data base fail due to". mysqli_connect_error());
    }
    // echo "Succesfully connected to DB";
    
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];

    $sql="INSERT INTO `trip`. `tript` (`firstname`, `lastname`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$firstname', '$lastname', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    if($con->query($sql)==true)
    {
        // echo "succesfully inserted";
        $insert=true;
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Confirmation form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="blink.css">
</head>
<body>
    <img src="bg0.jpg" class="bg" alt="Skncoe">
    <div class="container">
        <h1>Welcome To College US trip</h1>
       
        <p>Enter Your details to confirm Your participation</p>

        <?php
            if($insert==true)
            {
                echo  "<p class='sbmmsg element-animated blink-standard'>Thank You For Submiting Your Response </p>";

            }

        ?>
        <form action="index.php" method="post">

            <label for="firstname">First Name</label>
            <br>
            <input type="text" name="firstname" id="firstname" placeholder="Enter Your First Name" required>

            <br>
            <label for="lastname">Last Name</label>
            <br>
            <input type="text" name="lastname" id="lastname" placeholder="Enter Your Last Name" required >

            <br>
            <label for="gender">Gender</label>
            
            <br>
            <select name="gender" id="gender" required> 
                <option value="male">Male</option>
                <option value="male">Female</option>
            </select>
            

            <br>
            <label for="email"> Email Id</label>
            <br>
            <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
            <br>

            <label for="phone"> Mobile No.</label>
            <br>
            <input type="tel" name="phone" id="phone" placeholder="Enter Your Mobile No." required>
            <br>

            <label for="desc"> Other Info</label>
            <br>
            <textarea name="desc" id="desc" placeholder="Any Other Information" cols="30" rows="8"></textarea>
            <br>

            <button class="btn">SUBMIT</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>


