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
    
    //the curent name and password that the user sent
    $NameToFind =test_input($_POST['CUserName']);
    $PasswordToFind = test_input($_POST['Cpassword']);
    $NewName =test_input($_POST['NUserName']);
    $NewPassword = test_input($_POST['Npassword']);
    
    
    $sql = "UPDATE users SET UserName = '$NewName' , Password = '$NewPassword' 
    WHERE UserName = '$NameToFind' And Password = '$PasswordToFind' ";
    
    $result = mysqli_query($conn, $sql);
    
    //when updating a table use affected_rows to get the number of rows affected
    if (mysqli_affected_rows($conn) ==1) {
        //go to home page
        header('Location:MainPage.html');
        
    } else {
        
        echo "<script>alert('User Not Found!');</script>"; 
        echo "<script>window.location.href = 'MainPage.html';</script>";  
        
    }
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