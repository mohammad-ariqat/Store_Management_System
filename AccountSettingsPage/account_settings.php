
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
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

    
    <div class="form1 mt-5">
        <h2>Edit Account</h2>
        <form method="POST" action="<?php echo htmlspecialchars("VP.php"); ?>">
                <label for="CUserName">Current Username:</label>
                <input type="text" name="CUserName" required>
                <br>
                <label for="NUserName">New Username:</label>
                <input type="text" name="NUserName" required>
                <br>

                <label for="Cpassword">Current Password:</label>
                <input type="password" name="Cpassword" required>
                <br>

                <label for="Npassword">New Password:</label>
                <input type="password" name="Npassword" required>
                <br>
                <input type="submit" value="Conform">
        </form>

    </div>
</body>
</html>