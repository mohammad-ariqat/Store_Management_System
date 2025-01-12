<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exports Search</title>
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

    <div class="form1 mt-3">
        <h2>Exports Search</h2>
        <div class="container mt-2 mx-5 g-5">
                
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".bname" >Branch </button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".pname">Product </button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".date">Date</button>
            
        </div>
        
        
        <form method="POST" action="<?php echo htmlspecialchars("ExSearch.php"); ?>">
            
            <label for="BranchName" class="collapse bname">Branch Name:</label>
            <input type="text" name="BranchName" maxlength="255" class="collapse bname" >
            <br>

            <label for="ProductName" class="collapse pname">ProductName:</label>
            <input type="text" name="ProductName" maxlength="255" class="collapse pname" >

            <br>
            <label for="Date" class="collapse date">Date:</label>
            <input type="date" name="Date" class="collapse date" >

            
            <input class="btn" type="submit" value="Search">
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>