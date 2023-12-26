<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Medical Page</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="img/log.jpg" class="logo">
                <ul>
                    <li><a href="login.php">Back</a></li>
                </ul>
            </nav>
        </div>
        <form action="api/submit.php" role="form" method="post">
        <h2>Registration</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br/>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br/>
    
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br/>
        <label for="gender">Gender :</label>
        <input type="radio" id="gender" name="gender" value="male"  required>Male
        <input type="radio" id="gender" name="gender" value="female"  required>Female
        <input type="radio" id="gender" name="gender" value="other"  required>Other<br/>

        <label for="phone">Phone No :</label>
        <input type="phone" id="phone" placeholder="Phone Number" name="phone" value="number" required><br/>

    
        <button type="submit">Register</button>
    </form>
    </div>
    
</body>
</html>