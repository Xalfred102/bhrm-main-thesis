<?php
require 'connection.php';

$errors = array(); // Initialize the errors array

if (!empty($_SESSION['uname']) && !empty($_SESSION['role'])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) && empty($password)) {
        array_push($errors, "Missing all fields");
    } elseif (empty($email)) {
        array_push($errors, "Missing Email");
    } elseif (empty($password)) {
        array_push($errors, "Missing Password");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }

    $query = "SELECT * FROM `users` WHERE uname = '$email' and pass = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result)) {
        $role = $row['role'];

        if ($role == 'admin') {
            $_SESSION["uname"] = $row['uname'];
            $_SESSION["role"] = $row["role"];
            $_SESSION['login_message_displayed'] = true;
            header("Location: ../index.php");
            exit;
        } elseif ($role == 'user') {
            $_SESSION["uname"] = $row['uname'];
            $_SESSION["role"] = $row["role"];
            $_SESSION['login_message_displayed'] = true; // Set the variable to true

            header("Location: ../index.php");
            exit;
        } elseif ($role == 'landlord'){
            $_SESSION["uname"] = $row['uname'];
            $_SESSION["role"] = $row["role"];
            $_SESSION["hname"] = $row['hname'];
            $_SESSION['login_message_displayed'] = true;
            if (empty($_SESSION['hname'])){
                header("Location: bhfunction.php");
            }else{
                header("Location: ../dashboard.php");
            }
            exit;
        }
    } else {
        array_push($errors, "Account is not found.");
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <style>
        body {
            background-color: #e6e6e6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 400px;
            margin: 10% auto 0 auto;
            background-color: #a9a9a9;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container img {
            width: 50%;
        }

        .container span {
            font-size: 17px;
            font-weight: 100;
            display: block;
            margin-bottom: 20px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 200;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ffcc00;
            border: none;
            border-radius: 5px;
            color: #000;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #e6b800;
        }

        .links {
            margin-top: 20px;
            font-size: 13px;
            font-weight: 100;
        }

        .links a {
            text-decoration: none;
            color: black;
            display: block;
            margin: 5px 0;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 14px;
            font-weight: 200;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="../index.php"><img src="../images/logo.png" alt="Logo"></a>
        <span>Login</span>

        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn" name="submit">Sign in now</button>
        </form>

        <div class="links">
            <a href="signup.php">Account? Register Now</a>
            <a href="forgot.html">Forgot Password</a>
            <a href="signuplandlord.php">Sign up as landlord</a>
        </div>

        <?php 
        if (isset($errors) && count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<p class='error-message'>$error</p>";
            }
        }
        ?>
    </div>

</body>
</html>