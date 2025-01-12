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
        $stmt = $conn->prepare("INSERT INTO products (ProductName, Cost, Quantity , Date , PlaceOfImportation) VALUES (?, ?, ? , ? , ?)");
        
        $stmt->bind_param("sdiss",$productName, $cost, $quantity, $date, $placeOfImportation);
        //set parameters and execute
        $productName = test_input($_POST['ProductName']);
        $cost = test_input($_POST['Cost']);
        $quantity = test_input($_POST['Quantity']);
        $date = test_input($_POST['Date']);
        $placeOfImportation = test_input($_POST['PlaceOfImportation']);
        

        if ($stmt->execute()) {
            //if data was inserted into products table then insert into transactions table
            $stmt = $conn->prepare("INSERT INTO transactions (Type, ProductName, Quantity , Date) VALUES (?, ?, ? ,?)");
            $type = "import";  //type is set to import because this is the import VP
            $stmt->bind_param("ssis", $type, $productName, $quantity , $date);
            $stmt->execute();
        }
    
    
    }
    header('Location:FinalPage.html');
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $stmt->close();
    mysqli_close($conn);
?>