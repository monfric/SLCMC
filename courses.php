<?php
include 'db.php';
session_start();





$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $intake = $_POST['intake'];
    

    // Check if the user already applied for three courses in the same intake
    $check_limit = "SELECT COUNT(*) as course_count FROM applications WHERE user_id='$user_id' AND intake='$intake'";
    $result = $conn->query($check_limit);
    $row = $result->fetch_assoc();

    if ($row['course_count'] < 3) {
        $sql = "INSERT INTO applications (user_id, course_id, intake) VALUES ('$user_id', '$course_id', '$intake')";
        if ($conn->query($sql) === TRUE) {
            //echo "Course applied successfully!";
            $error_message = "Course applied successfully!!";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        //echo "You can only apply for up to 3 courses in the same intake.";
        $error_message = "No duplicate or more than 3 courses in the same intake allowed!!";
    }
}

// Fetch courses
$courses = $conn->query("SELECT * FROM courses");

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
  <nav>
    <div class="menu">
      <div class="logo">
        <img src="img/logo1.png" width=100 height=100> 
      </div>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="view-courses.php">view courses</a></li>
        <li><a href="courses.php">Application Portal</a></li>
        <li><a href="inbox.php">Inbox</a></li>
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

 <h1 align=center>Apply Course</h1>

       <!-- Display error message if set -->
    <?php if (!empty($error_message)): ?>
        <div class="error-message" align=center>
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>


    <form method="POST">

   

        <select name="course_id">
            <?php while ($course = $courses->fetch_assoc()): ?>
                <option value="<?= $course['id'] ?>"><?= $course['course_name'] ?></option>
            <?php endwhile; ?>
        </select><br>
        Intake: <select name="intake" required>
                                <option value="">Select intake</option>
                                <option value="January 2024">January 2024</option>
                                <option value="March 2024">March 2024</option>
                                <option value="May 2024">May 2024</option>
                                <option value="September 2024">September 2024</option>
                        </select>
                               

        <button type="submit">Apply</button>
    </form>

</body>
</html>