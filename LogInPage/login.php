<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to the Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to external stylesheet-->
    <link rel="stylesheet" href="/FinalProject/styles/forms.css">
</head>
<body>
    <!-- Main container for the login form -->
    <div class="form1">
        <h2>Login</h2>
        <!-- Form for user login, sending data via POST method to the server -->
        <form method="POST" action="<?php echo htmlspecialchars("LogInVP.php"); ?>">
            <!--username -->
            <label for="UserName">Username:</label>
            <input type="text" name="UserName" required>
            <br>
            <!--password -->
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <!-- Submit-->
            <input type="submit" value="Login">
        </form>

        <!-- Links for password recovery and account creation -->
        <div class="form-links">
            <a href="PassReset.php">Forgot password?</a> | 
            <a href="NewUser.php">Create Account</a>
        </div>
    </div>
</body>
</html>
