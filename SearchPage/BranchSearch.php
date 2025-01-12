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
        $Location = test_input($_POST['Location']);
        $Phone = test_input($_POST['Phone']);

        //WHERE 1=1: to add conditions. Since 1=1 is always true 
        //It allows to append AND condition
        $sql = "SELECT * FROM branches WHERE 1=1";
        
        //here i used like , so it gets the data if it contains the name or loc or phone
        //i checked if its empty because the user is not requered to enter the data
        if (!empty($BranchName)) {
            $sql .= " AND Name LIKE '%$BranchName%'";
        }
        if (!empty($Location)) {
            $sql .= " AND Location LIKE '%$Location%'";
        }
        if (!empty($Phone)) {
            $sql .= " AND Phone LIKE '%$Phone%'";
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
            <title>Branch Search</title>
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
                    <h1>Branch Search</h1>
                </div>
            </div>
            <div class="container my-4">
                <table class="table table-bordered table-hover">
                    <!--table head-->
                    <thead class="table-dark">
                        <tr>
                            <th>Branche Name</th>
                            <th>Location</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <!--table body-->
                    <tbody>
                        
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    
                            <tr>
                                <td>
                                    <?php echo $row['Name']; ?>
                                </td>

                                <td>
                                    <?php echo $row['Location']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Phone']; ?>    
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

