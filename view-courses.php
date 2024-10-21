<?php
// Include the database connection file
include 'db.php';

// Fetch courses from the database
$sql = "SELECT course_name, description FROM courses";
$result = $conn->query($sql);
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
  top: 0;
    left: 0;
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



    //start of pagination style 
    /* Pagination Styles */
.pagination {
    text-align: center;
    margin-top: 20px;
}

.pagination a {
    color: #333;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    margin: 0 2px;
    border-radius: 5px;
    font-size: 1em;
}

.pagination a:hover {
    background-color: #4CAF50;
    color: white;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}
//end of pagination style 
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
  </p>

   
   <h2>Courses available</h2>

 

<h1 align=center>Available Courses</h1>

<table border="1">
    <tr>
        <th>Course Name</th>
        <th>Description</th>
    </tr>
    <?php
// Database connection (assuming $conn is your MySQLi connection object)
$records_per_page = 5; // Set the number of records to display per page

// Get the current page number from the URL, defaulting to 1 if not set
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1; // Default to the first page
}

// Calculate the offset for the SQL query
$offset = ($page - 1) * $records_per_page;

// SQL query to fetch the total number of courses
$total_sql = "SELECT COUNT(*) FROM courses"; // Replace 'courses' with your table name
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_row()[0];

// SQL query to fetch the current page of records
$sql = "SELECT course_name, description FROM courses LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

// Check if any courses were returned
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["course_name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No courses available</td></tr>";
}

// Calculate total pages
$total_pages = ceil($total_rows / $records_per_page);
?>
</table>





    <?php
   // Check if any courses were returned
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["course_name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No courses available</td></tr>";
}

// Calculate total pages
$total_pages = ceil($total_rows / $records_per_page);

    ?>

</table>

<?php
// Display pagination as per the PHP code above
?>





<!-- Pagination Links -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>>
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $total_pages): ?>
        <a href="?page=<?php echo $page + 1; ?>">Next</a>
    <?php endif; ?>

  </div>
  
</body>
</html>