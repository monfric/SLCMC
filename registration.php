<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        //echo "Account created successfully. <a href='login.php'>Login here</a>";
        $error_message = "Account created successfully!";
    } else {
        //echo "Error: " . "Username already exist" . "<br>";
        // . $sql . . $conn->error
        $error_message = "Username already exist!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <style>
   body {
  height: 100vh;
  width: 100%;
  background: linear-gradient(to bottom, #00cdfe 23%, #fe019a 95%);
  
}

form {
    background-color: white;
    padding: 20px;
    margin: 50px auto;
    width: 300px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
     box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}


/* Error Message Styles */
.error-message {
    color: #oa6522;
    background-color: #2e8b57;
    padding: 10px;
    border: 1px solid #oa6522;
    border-radius: 5px;
    margin-bottom: 20px;
    margin: auto;
    width: fit-content;
}
// end of error message
</style>

</head>
<body>
    <form method="POST">
        <p align=center><img src="img/logo1.png" width=100 height=100></p>

         <!-- Display error message if set -->
    <?php if (!empty($error_message)): ?>
        <div class="error-message" align=center>
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

        Username: <input type="text" name="username" placeholder="Type username" required><br>
        Email: <input type="email" name="email" placeholder="Type your email" required><br>
        Password: <input type="password" name="password" placeholder="Type your password" required><br>
        <button type="submit">Register</button>
        <p style="text-align: center">Alread have an account? <a href="login.php">Login</a></p>
    </form>
</body>
</html>
