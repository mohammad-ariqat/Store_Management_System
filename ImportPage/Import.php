
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/FinalProject/styles/forms.css">
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


    <div class="form1 mt-2">
        <h2>Product Data</h2>
        <form method="POST" action="<?php echo htmlspecialchars("VP.php"); ?>">
            <label for="ProductName">Product Name:</label>
            <input type="text" name="ProductName" maxlength="255" required>
            
            <br>

            <label for="Cost">Cost:</label>
            <input type="number" name="Cost" step="0.01" required>

            <br>

            <label for="Quantity">Quantity:</label>
            <input type="number" name="Quantity" min="1" required>

            <label for="Date">Date:</label>
            <input type="date" name="Date" required>

            <label for="PlaceOfImportation">Place of Importation:</label>
            <input type="text" name="PlaceOfImportation" maxlength="255" required>

            <input type="submit" value="Add">
        </form>

    </div>
</body>
</html>