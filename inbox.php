<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script>
  // Function to check inactivity and redirect to logout
  function checkInactivity() {
    var lastActivity = <?php echo $_SESSION['last_activity']; ?>;
    var timeout = 10 * 60 * 1000; // 1 minutes in milliseconds

    // Calculate the time difference between current time and last activity
    var currentTime = new Date().getTime();
    var elapsedTime = currentTime - lastActivity;

    // Redirect to logout if elapsed time exceeds the timeout limit
    if (elapsedTime > timeout) {
      window.location.href = 'logout.php';
    }
  }

  // Execute the checkInactivity function on page load and at intervals
  window.onload = function() {
    setInterval(checkInactivity, 600000); // Check every minute
  };
</script>
    <title> Home</title> 
   
    <style>

      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body {
  height: 100vh;
  width: 100%;
  background: #ffffff;
  
}

::selection{
  color: #000;
  background-color: #00cdfe;
}
nav{
  position: fixed;
  background: #00cdfe;
  width: 100%;
  padding: 10px 0;
  z-index: 12;
}
nav .menu{
  max-width: 1250px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
}
.menu .logo a{
  text-decoration: none;
  color: #fff;
  font-size: 35px;
  font-weight: 600;
}
.menu ul{
  display: inline-flex;
}
.menu ul li{
  list-style: none;
  margin-left: 7px;
}
.menu ul li:first-child{
  margin-left: 0px;
}
.menu ul li a{
  text-decoration: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  padding: 8px 15px;
  border-radius: 5px;
  transition: all 0.3s ease;
}
.menu ul li a:hover{
  background: #fff;
  color: black;
}
.img{
  background: url('img3.jpg')no-repeat;
  width: 100%;
  height: 100vh;
  background-size: cover;
  background-position: center;
  position: relative;
}
.img::before{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.4);
}
.center{
  position: absolute;
  top: 52%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  padding: 0 20px;
  text-align: center;
}
.center .title{
  color: #fff;
  font-size: 55px;
  font-weight: 600;
}
.center .sub_title{
  color: #fff;
  font-size: 52px;
  font-weight: 600;
}
.center .btns{
  margin-top: 20px;
}
.center .btns button{
  height: 55px;
  width: 170px;
  border-radius: 5px;
  border: none;
  margin: 0 10px;
  border: 2px solid white;
  font-size: 20px;
  font-weight: 500;
  padding: 0 10px;
  cursor: pointer;
  outline: none;
  transition: all 0.3s ease;
}
.center .btns button:first-child{
  color: #fff;
  background: none;
}
.btns button:first-child:hover{
  background: white;
  color: black;
}
.center .btns button:last-child{
  background: white;
  color: black;
}


//start of styling input elements
/* Title Styling */
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Form Styling */
form {
    width: 70%;                    /* Adjust the form width */
    margin: 0 auto;                 /* Center the form on the page */
    background-color: white;        /* White background for the form */
    padding: 20px;                  /* Add padding inside the form */
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); /* Light shadow for form */
    border-radius: 8px;             /* Slight rounded corners */
}

/* Select dropdown and input field styling */
select, input[type="textarea"] {
    width: 100%;                    /* Full width for inputs */
    padding: 12px;                  /* Padding for inputs */
    margin-bottom: 15px;            /* Space between input fields */
    border: 1px solid #ccc;         /* Light border for input fields */
    border-radius: 4px;             /* Slightly rounded corners */
    box-sizing: border-box;         /* Ensure padding and border do not affect width */
    font-size: 1em;                 /* Consistent font size */
}

/* Button styling */
button[type="submit"] {
    width: 100%;                    /* Full width for button */
    padding: 12px;                  /* Padding for the button */
    background-color: #4CAF50;      /* Green background */
    color: white;                   /* White text */
    border: none;                   /* Remove border */
    border-radius: 4px;             /* Rounded corners */
    font-size: 1em;                 /* Increase font size */
    cursor: pointer;                /* Pointer cursor on hover */
}

button[type="submit"]:hover {
    background-color: #45a049;      /* Slightly darker green on hover */
}

/* Add some spacing between form elements */
form select, form input {
    margin-bottom: 20px;
}

//end of styling input elements


// start of the table code
 <style>
        body {

            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            //max-width: 800px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    // end of table code

    </style>
    
   </head>
<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <img src="img/logo1.png" width=100 height=100> 
      </div>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="view-courses.php">view courses</a></li>
        <li><a href="courses.php">Application Portal</a></li>
        <li><a href="#">Inbox</a></li>
        <li><a href="index.php?logout='1'">Logout</a></li>
      </ul>
    </div>
  </nav>
 

  <p> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </p>

 <h1 align=center>My applications</h1>

 <table border="1">
   

<?php
 
// Query to fetch applications made by the logged-in user
$sql = "SELECT courses.course_name, applications.intake, applications.timeStamp
        FROM applications
        JOIN courses ON applications.course_id = courses.id
        WHERE applications.user_id = ?";

if ($stmt = $conn->prepare($sql)) {
    // Bind the user ID to the prepared statement
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any applications were returned
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Course Name</th><th>Intake</th><th>Application Date</th></tr>";
        
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["course_name"] . "</td>";
            echo "<td>" . $row["intake"] . "</td>";
            echo "<td>" . $row["timeStamp"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>You have not applied for any courses yet.</p>";

    }
    
    $stmt->close(); // Close the prepared statement
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close(); // Close the database connection
?>

</table>


</body>
</html>