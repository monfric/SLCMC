<?php
include 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: home.php');
        } else {
            //echo "Invalid password.";
            // Error message if login fails
            $error_message = "Invalid username or password!";
        }
    } else {
        //echo "No user found with that username.";
        $error_message = "Username not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>


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
    color: #D8000C;
    background-color: #FFBABA;
    padding: 10px;
    border: 1px solid #D8000C;
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
        Password: <input type="password" name="password" placeholder="Type username" required><br>
        <p style="text-align: right"><a href="#">Forgot password?</a></p>
        <button type="submit">Login</button>
        <p style="text-align: center">Don't have an account? <a href="registration.php">Register</a></p>
    </form>
</body>
</html>