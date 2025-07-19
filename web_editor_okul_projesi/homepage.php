<?php
session_start();
include 'connect.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $connector->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Hello, " . $row['firstname'] . " " . $row['lastname'];
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style="text align:center; padding%15;">
    <p style="font-size 50px; font-weight:bold;">
    Hello
    <?php
    if(isset($_SESSION['emai'])){
        $email=$_SESSION['emai'];
        $query=mysqli_query($conn,"SELECT users.* FROM 'users' WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];

        }
    }
    ?>

</p>
<a href="logout.php">logout</a> 
    
</body>
</html>