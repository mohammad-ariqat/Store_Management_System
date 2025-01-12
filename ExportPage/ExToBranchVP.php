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
        $stmt = $conn->prepare("INSERT INTO branchproducts (BranchId , ProductName, Cost, Quantity , Date) VALUES (?, ?, ? , ? , ?)");
        
        $stmt->bind_param("isdis",$BranchId ,$ProductName, $Cost, $Quantity, $Date);
        //set parameters and execute
        $BranchId = test_input($_POST['BranchId']);
        $ProductName = test_input($_POST['ProductName']);
        $Cost = test_input($_POST['Cost']);
        $Quantity = test_input($_POST['Quantity']);
        $Date = test_input($_POST['Date']);
        
        if ($stmt->execute()) {

           
            //if data was inserted into branchproducts table then insert into transactions table
            $stmt = $conn->prepare("INSERT INTO transactions (Type, ProductName, Quantity , BranchId , Date) VALUES (?, ?, ? ,? , ?)");
            $type = "export";  //type is set to export because this is the export VP
            $stmt->bind_param("ssiis", $type, $ProductName, $Quantity , $BranchId , $Date);
            

            if ($stmt->execute()) {
                //if data was inserted into transactions table then update the products table
                $sql = "UPDATE products SET Quantity = Quantity - '$Quantity' WHERE ProductName = '$ProductName'";
                $result = mysqli_query($conn, $sql);
            }
        }
        
    
    }
    header('Location:FinalPage.html');
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    mysqli_close($conn);
?>