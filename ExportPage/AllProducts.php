<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "mydb102";

    $conn = mysqli_connect($servername, $username, $password, $dbName);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
    
    $sql = "SELECT * FROM products";

    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <!--self Note: Spent 2hrs to make this table but learned alot :) -->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Product Table</title>
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
                    <div class="collapse navbar-collapse">
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
                    <h1>Products Page</h1>
                </div>
            </div>
            <div class="container my-4">
                <table class="table table-bordered table-hover">
                    <!--table head-->
                    <thead class="table-dark">
                        <tr>
                            <th>All Products</th>
                        </tr>
                    </thead>
                    <!--table body-->
                    <tbody>
                        <!--php while loop to loop throgh each product-->
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <!--using the bootstrap Collapse Components link to the docs: https://getbootstrap.com/docs/5.3/components/collapse/#how-it-works-->
                        <!--the data-bs-target is to tell the page what row should be expanded using id-->
                            <tr data-bs-toggle="collapse" data-bs-target="#details-<?php echo $row['id']; ?>">
                            <!--column for all the product names-->
                                <td><?php echo $row['ProductName']; ?></td>
                                
                            </tr>
                            <tr id="details-<?php echo $row['id']; ?>" class="collapse table-success">
                                <td colspan="3">
                                    <strong>Cost:</strong> <?php echo $row['Cost']; ?><br>
                                    <strong>Quantity:</strong> <?php echo $row['Quantity']; ?><br>
                                    <strong>Date Of Importation:</strong> <?php echo $row['Date']; ?><br>
                                    <strong>Place Of Importation:</strong> <?php echo $row['PlaceOfImportation']; ?>
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
    }
    // Close the connection
    mysqli_close($conn);
    ?>

