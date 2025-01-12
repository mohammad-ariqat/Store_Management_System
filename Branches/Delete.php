<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "mydb102";

    $conn = mysqli_connect($servername, $username, $password, $dbName);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
    
    $sql = "SELECT * FROM branches";

    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Delete Branch</title>
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
                    <h1>Click On Branch to Delete</h1>
                </div>
            </div>
            <div class="container my-4">
                <table class="table table-bordered table-hover">
                    <!--table head-->
                    <thead class="table-dark">
                        <tr>
                            <th>All Branches</th>
                        </tr>
                    </thead>
                    <!--table body-->
                    <tbody>

                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    
                            <tr>
                                <td>
                                    <!--when the link is clicked it sends the branch id in a get req to delbranch.php-->
                                    <a href="DelBranch.php?b_id=<?php echo $row['id'];?>"> 
                                        <?php echo $row['Name']; ?>    
                                    </a>
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

