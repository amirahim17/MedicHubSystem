	<?php
    session_start();
    if (!isset($_SESSION['userID']) || empty($_SESSION['userID'])) {
        header("Location: mainPageForm.html");
        exit;
    }
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MedicHub</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f2f2f2;
            color: #262626;
        }

        header {
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: relative;
        }

        header h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        nav {
            margin-top: 20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin: 0 10px;
        }

        nav ul li a {
            text-decoration: none;
            background: #fff;
            color: #fff; /* Changed to white color */
            font-size: 18px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            background-clip: text;
            -webkit-background-clip: text;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-button {
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .nav-button img {
            width: 30px;
            height: 30px;
            filter: invert(100%);
        }

        .container {
            display: flex;
            margin: 20px;
        }

        .sidebar {
            background-color: #fff;
            color: #fff;
            padding: 20px;
            width: 200px;
            border-radius: 10px;
        }

        .sidebar button {
            display: block;
            width: 100%;
            background: #fff; /* Changed to white background */
            color: #fff; /* Changed to white color */
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            background-clip: text;
            -webkit-background-clip: text;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
        }

        .sidebar button:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .main-content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-left: 20px;
            text-align: center;
        }

        .main-content img {
            width: 150px; /* Set width for profile picture */
            height: 150px; /* Set height for profile picture */
            margin-bottom: 20px;
        }

        .main-content h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .top-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .top-buttons button {
            background: #fff; /* Changed to white background */
            color: #fff; /* Changed to white color */
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            background-clip: text;
            -webkit-background-clip: text;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
        }

        .top-buttons button:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>MEDICHUB</h1>
        <nav>
            <ul>
                <li><a href="mainPageForm.html" class="nav-button" id="left-button"><img src="https://uxwing.com/wp-content/themes/uxwing/download/arrow-direction/previous-icon.png" alt="Left"></a></li>
                <li><a href="homePage.html" id="about-us-link">About Us</a></li>
                <li><a href="homePage.html" id="services-link">Services</a></li>
                <li><a href="homePage.html" id="contact-link">Contact</a></li>
                <li><a href="#" class="nav-button" id="right-button"><img src="https://uxwing.com/wp-content/themes/uxwing/download/arrow-direction/next-icon.png" alt="Right"></a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="sidebar">
            <button>MEDICAL RECORD</button>
            <button>MEDICAL CERTIFICATE</button>
            <button>PAYMENT</button>
        </div>
        <div class="main-content">
            <div class="top-buttons">
                <button id="profileButton">MY PROFILE</button>
                <button>APPOINTMENT</button>
                <button id="logoutButton">LOG OUT</button>

            </div>
            <img src="https://i.pinimg.com/564x/c2/44/bc/c244bc97d48fa1aeabaad63dd695053c.jpg" alt="Profile Picture">
            <h2>WELCOME !</h2>
        </div>
    </div>
?>
<script>
        // Check if userID in session
        var userID = "<?php echo $_SESSION['userID']; ?>";
		var userType = "<?php echo $_SESSION['userType']; ?>";
        
        // If userID doesn't exist, redirect to login page
        if (userID === '') {
            window.location.href = "mainPageForm.html";
        }

        // Add event listeners after DOM content is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Add an event listener to the profile button
            document.getElementById("profileButton").addEventListener("click", function() {
                // Redirect to profile page using patientID from session
                window.location.href = "profile.php?userType=patient&userID=" + userID;
            });

            // Add an event listener to the logout button
            document.getElementById("logoutButton").addEventListener("click", function() {
                // Display a confirmation dialog
                var confirmLogout = confirm("Are you sure you want to log out?");
                
                // If user confirms logout
                if (confirmLogout) {
                    // Redirect to logout page
                    window.location.href = "logout.php";
                }
            });
        });
</script>
</body>
</html>