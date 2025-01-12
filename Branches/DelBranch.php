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
            $BranchToFind =$_GET['b_id'];
            $sql = "DELETE FROM branches WHERE id = '$BranchToFind'";
            $result = mysqli_query($conn, $sql);
        }
        
        
    
    
    header('Location:Delete.php');
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    mysqli_close($conn);
?>