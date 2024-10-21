<?php
// Include the database connection file
include 'db.php';


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
  background: url('img/theatre.jpg')no-repeat;
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
    </style>
    
   </head>
<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <img src="img/logo1.png" width=100 height=100> 
      </div>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="view-courses.php">view courses</a></li>
        <li><a href="courses.php">Application Portal</a></li>
        <li><a href="inbox.php">Inbox</a></li>
        <li><a href="index.php?logout='1'">Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="img"></div>
  <div class="center">
    <div class="title">Sr Leonella CMC</div>
    <div class="sub_title">Online Courses Application System</div>
    <div class="btns">
      <button>Learn More</button>
      <button>Join Us</button>
    </div>
  </div>
</body>
</html>