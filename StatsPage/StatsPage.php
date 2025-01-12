<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "mydb102";

    $conn = mysqli_connect($servername, $username, $password, $dbName);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        
        //insted of running 3 difrent sql statements and storing the result in vars i put them all into one its called Subqueries
        $sql = "SELECT 
        (SELECT COUNT(*) FROM transactions WHERE Type = 'import') * 100.0 / total_count AS ImportPercentage,
        (SELECT COUNT(*) FROM transactions WHERE Type = 'export') * 100.0 / total_count AS ExportPercentage,
        (SELECT SUM(Cost * Quantity) FROM branchproducts) AS TotalProfit
        FROM (SELECT COUNT(*) AS total_count FROM transactions) AS total";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $ImportPercentage = $row['ImportPercentage'];
            $ExportPercentage = $row['ExportPercentage'];
            $TotalProfit = $row['TotalProfit'];
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
        
    }
    
    // Close the connection
    mysqli_close($conn);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stats Page</title>
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

        <div class="company-header">
            <h1>Statistics</h1>
        </div>

        <div class="container mt-4 p-4 bg-light border rounded" style="max-width: 600px;">
            <p class="mb-2 font-weight-bold text-secondary">Import Percentage: 
                <span class="text-primary"><?php echo $ImportPercentage ?>%</span>
            </p>
            <p class="mb-2 font-weight-bold text-secondary">Export Percentage: 
                <span class="text-success"><?php echo $ExportPercentage ?>%</span>
            </p>
            <p class="mb-0 font-weight-bold text-secondary">Total Profit: 
                <span class="text-dark"><?php echo $TotalProfit ?></span>
            </p>
        </div>



    </body>
    </html>

