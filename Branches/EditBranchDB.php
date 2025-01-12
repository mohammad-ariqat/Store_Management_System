<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "mydb102";

    //Create connection
    $conn = mysqli_connect($servername, $username, $password ,$dbName);
    
    
    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        $BranchId = $_POST['BranchId'];
        $BranchName = test_input($_POST['BranchName']);
        $Location = test_input($_POST['Location']);
        $Phone = test_input($_POST['Phone']);
        
    
        $sql = "UPDATE branches SET Name = '$BranchName' , Location = '$Location' , Phone = '$Phone' WHERE id = '$BranchId'";
        $result = mysqli_query($conn, $sql);
          
    }
        
    mysqli_close($conn);
    
    header('Location:Edit.php');
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>