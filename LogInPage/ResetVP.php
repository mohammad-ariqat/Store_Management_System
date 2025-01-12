<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "mydb102";
    //connect to Data Base
    $conn = mysqli_connect($servername, $username, $password, $dbName);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "Connected successfully <br>";
    }

    
    
    //the name and the new password that the user sent
    $NameToFind =test_input($_POST['UserName']);
    $Newpassword = test_input($_POST['password']);
    
    //sql statement to update the password of the user 
    $sql = "UPDATE users SET Password = '$Newpassword' WHERE UserName = '$NameToFind'";

    $result = mysqli_query($conn, $sql);
    
    //if pasword updated then send back to login page
    if ($result === TRUE) {
        header('Location:login.php');
        
    } else {
        echo $result;
    }

    //function to test data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    mysqli_close($conn);

?>