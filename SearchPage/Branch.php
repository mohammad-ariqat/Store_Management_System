<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Search</title>
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
        <h2>Branch Search</h2>
        <div class="container mt-2 mx-5 g-5">
                
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".name" >Name</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".loc">Location</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".phone">Phone</button>
            
        </div>
        
        
        <form method="POST" action="<?php echo htmlspecialchars("BranchSearch.php"); ?>">
            
            <label for="BranchName" class="collapse name">Branch Name:</label>
            <input type="text" name="BranchName" maxlength="255" class="collapse name" >
            <br>

            <label for="Location" class="collapse loc">Location:</label>
            <input type="text" name="Location" maxlength="255" class="collapse loc" >

            <br>
            <label for="Phone" class="collapse phone">Phone:</label>
            <input type="number" name="Phone" class="collapse phone" >

            
            <input class="btn" type="submit" value="Search">
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>