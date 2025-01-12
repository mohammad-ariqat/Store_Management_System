
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export To Branch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/FinalProject/styles/forms.css">
</head>
<body>
    <?php 
        $BranchToFind =$_GET['b_id'];
    
    ?>
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


    <div class="form1">
        <h2>Export To Branch</h2>
        <form method="POST" action="<?php echo htmlspecialchars("ExToBranchVP.php"); ?>">
            <!--Branch id-->
            <label for="BranchId">Branch ID:</label>
            <input type="text" name="BranchId" value="<?php echo $BranchToFind ?>" readonly>
            
            <!--Product name-->
            <label for="ProductName">Product Name:</label>
            <input type="text" name="ProductName" required>
            
            <!--cost-->        
            <label for="Cost">Cost:</label>
            <input type="number" id="Cost" name="Cost" step="0.01" required>
            
            <!--Quantity-->
            <label for="Quantity">Quantity:</label>
            <input type="number" id="Quantity" name="Quantity" required oninput="calculateProfit()">
            
            <!--date-->
            <label for="Date">Date:</label>
            <input type="date" name="Date" required>

            <!--profit-->
            <label for="Profit">Profit:</label>
            <input type="text" id="Profit" name="Profit" disabled>
            
            <input type="submit" value="Export">
        </form>
    </div>
    
    <script>
    function calculateProfit() {
        // Get the values of Cost and Quantity
        var cost = document.getElementById('Cost').value;
        var quantity = document.getElementById('Quantity').value;

        // Calculate the profit
        var profit = cost * quantity;

        // Display the profit in the Profit input field
        document.getElementById('Profit').value = profit.toFixed(2); // Display profit with 2 decimal points
    }
</script>
</body>
</html>