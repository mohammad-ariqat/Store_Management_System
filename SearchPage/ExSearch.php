<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "mydb102";

    $conn = mysqli_connect($servername, $username, $password, $dbName);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        
        $BranchName = test_input($_POST['BranchName']);
        $ProductName = test_input($_POST['ProductName']);
        $Date = test_input($_POST['Date']);

        //i used join to get the branch name  
        $sql = "SELECT t.id, t.ProductName, t.Quantity, t.Date, b.Name AS BranchName 
          FROM transactions t 
          JOIN branches b ON t.BranchId = b.id 
          WHERE t.Type = 'export'";

        if (!empty($BranchName)) {
            $sql .= " AND b.Name LIKE '%$BranchName%'";
        }
        if (!empty($Date)) {
            $sql .= " AND t.Date = '$Date'";
        }
        if (!empty($ProductName)) {
            $sql .= " AND t.ProductName LIKE '%$ProductName%'";
        }
    
        
        $result = mysqli_query($conn, $sql);
        if ($result == false) {
            die("Query failed: " . mysqli_error($conn));
        }
    }
    
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>exports Search</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="/FinalProject/styles/menus.css">
        </head>
        <body>
            <!--Nav Bar-->
            <nav class="navbar navbar-expand-lg nav-underline">
                <div class="container-fluid">
                    <a href="/FinalProject/HomePage/HomePage.html">
                        <img src="/FinalProject/HomePage/imgs/supermarket.png" alt="Bootstrap" width="45" height="35">
                    </a>
                    <div class="navbar-collapse">
                        <div class="navbar-nav">
                            <a class="nav-link" href="/FinalProject/HomePage/HomePage.html">Home</a>
                            <a class="nav-link" href="/FinalProject/ImportPage/Import.php">Import</a>
                            <a class="nav-link" href="/FinalProject/ExportPage/ExportPage.html">Export</a>
                            <a class="nav-link" href="/FinalProject/Branches/main.html">Branches</a>
                            <a class="nav-link" href="/FinalProject/StatsPage/StatsPage.php">Statistics</a>
                            <a class="nav-link" href="/FinalProject/SearchPage/main.html">Search</a>
                            <a class="nav-link" href="/FinalProject/AccountSettingsPage/MainPage.html">Account</a>
                        </div>
                    </div>
                </div>
            </nav>


            <div class="container">
                <div class="company-header">
                    <h1>Exports Search</h1>
                </div>
            </div>
            <div class="container my-4">
                <table class="table table-bordered table-hover">
                    <!--table head-->
                    <thead class="table-dark">
                        <tr>
                            <th>Transaction ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Branche Name</th>
                        </tr>
                    </thead>
                    <!--table body-->
                    <tbody>
                        
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>

                                <td>
                                    <?php echo $row['ProductName']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Quantity']; ?>    
                                </td>
                                <td>
                                    <?php echo $row['Date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['BranchName']; ?>    
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>

    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // Close the connection
    mysqli_close($conn);
    ?>

