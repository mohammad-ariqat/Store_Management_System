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
        
   

    //function to test data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    //the name and the password that the user sent
    $NameToFind =test_input($_POST['UserName']);
    $passwordToFind = test_input($_POST['password']);
    
    //sql statement to check if the $NameToFind and $passwordToFind are in the db
    $sql = "SELECT UserName , Password FROM users WHERE UserName ='$NameToFind' And Password = '$passwordToFind'";

    $result = mysqli_query($conn, $sql);
    
    
    if (mysqli_num_rows($result) ==1) {
        //go to home page
        header('Location:/FinalProject/HomePage/HomePage.html');
        
    } else {
        echo "<script>alert('Incorrect username or password!');</script>"; 
        echo "<script>window.location.href = 'login.php';</script>";  
    }
    }
    mysqli_close($conn);

?>