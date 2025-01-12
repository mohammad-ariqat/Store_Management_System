
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/FinalProject/styles/forms.css">
</head>
<body>
    <div class="form1">
        <h2>Create Account</h2>
    <form method="POST" action="<?php echo htmlspecialchars("NewUserVP.php"); ?>">
            <label for="UserName">Username:</label>
            <input type="text" name="UserName" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Create">
    </form>
    </div>
</body>
</html>