<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login | MedicHub</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
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
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
        }

        header {
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
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
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .wrapper {
            width: 380px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
            margin-top: 150px; /* Added margin to compensate for fixed header */
        }

        .wrapper .title {
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            line-height: 100px;
            color: #fff;
            user-select: none;
            border-radius: 15px 15px 0 0;
            position: relative;
        }

        .wrapper .title::before {
            content: 'Login';
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .wrapper form {
            padding: 10px 30px 50px 30px;
        }

        .wrapper form .field {
            height: 50px;
            width: 100%;
            margin-top: 20px;
            position: relative;
        }

        .wrapper form .field input {
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 17px;
            padding-left: 20px;
            border: 1px solid lightgrey;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .wrapper form .field input:focus,
        form .field input:valid {
            border-color: #4158d0;
        }

        .wrapper form .field label {
            position: absolute;
            top: 50%;
            left: 20px;
            color: #999999;
            font-weight: 400;
            font-size: 17px;
            pointer-events: none;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }

        form .field input:focus ~ label,
        form .field input:valid ~ label {
            top: 0%;
            font-size: 16px;
            color: #4158d0;
            background: #fff;
            transform: translateY(-50%);
        }

        form .content {
            display: flex;
            width: 100%;
            height: 50px;
            font-size: 16px;
            align-items: center;
            justify-content: space-around;
        }

        form .content .checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form .content input {
            width: 15px;
            height: 15px;
            background: red;
        }

        form .content label {
            color: #262626;
            user-select: none;
            padding-left: 5px;
        }

        form .field input[type="submit"] {
            color: #fff;
            border: none;
            padding-left: 0;
            margin-top: -10px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            transition: all 0.3s ease;
        }

        form .field input[type="submit"]:active {
            transform: scale(0.95);
        }

        form .signup-link {
            color: #262626;
            margin-top: 20px;
            text-align: center;
        }

        form .pass-link a,
        form .signup-link a {
            color: #4158d0;
            text-decoration: none;
        }

        form .pass-link a:hover,
        form .signup-link a:hover {
            text-decoration: underline;
        }

        .radio {
            display: flex;
            justify-content: space-between;
        }

        .radio input[type="radio"] {
            transform: scale(0.32);
            margin-right: 2px;
        }

        .horizontal-line {
            margin: 10px 0;
            border-top: 1px solid #ccc;
        }

        .form-check-input {
            display: inline-block;
            width: 20px;
            margin-right: 5px;
            transform: scale(1);
        }

        .form-check-label {
            margin-left: 2px !important;
        }
      </style>
   </head>
   <body>
    <header>
        <h1>Welcome to MedicHub</h1>
        <nav>
            <ul>
                <li><a href="homePage.html">Home</a></li>
            </ul>
        </nav>
    </header>

    <div class="wrapper">
        <div class="title">Login</div>
        <form id="loginForm" class="form-horizontal" autocomplete="off" method="post" accept-charset="utf-8" onsubmit="return validateAndRedirect()">
            <div style="display:none;">
                <input type="hidden" name="_method" value="POST"/>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="staffCheckbox" value="staff" required="required">
                <label class="form-check-label">Staff</label>
                <input class="form-check-input" type="radio" name="role" id="patientCheckbox" value="patient" required="required">
                <label class="form-check-label">Patient</label>
            </div>
            <div class="horizontal-line"></div>
            <div class="field">
                <input type="text" name="username" id="username" required>
                <label>User ID</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="Login">
            </div>
            <div class="signup-link">
                Not a member? <a href="patientRegistration.html">Signup now</a>
            </div>
        </form>
    </div>

    <script>
        function validateAndRedirect() {
            const role = document.querySelector('input[name="role"]:checked').value;
            const username = document.getElementById('username').value;

            if (role === 'staff') {
                if (username.startsWith('ADM')) {
                    window.location.href = 'homePageAdmin.php';
                } else if (username.startsWith('D')) {
                    window.location.href = 'homePageStaff.php';
                } else {
                    alert('Staff ID should start with ADM or D.');
                    return false;
                }
            } else if (role === 'patient') {
                if (username.startsWith('P')) {
                    window.location.href = 'patientDashboard.php';
                } else {
                    alert('Patient ID should start with P.');
                    return false;
                }
            }

            return false; // Prevent form submission since we're handling redirection via JavaScript
        }
    </script>
</body>
</html>