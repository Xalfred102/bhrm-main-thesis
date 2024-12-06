<?php
require 'connection.php';

if (!empty($_SESSION["uname"]) && !empty($_SESSION["role"])) {
    header("location: ../index.php");
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $gender = $_POST['gender'];
    $pass = $_POST['pass'];
    $conpassword = $_POST['confirmpassword'];

    $_FILES['image'];

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileactualext = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileactualext, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . '.' . $fileactualext;
                $fileDestination = '../profiles/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big.";
            }
        }
    } else {
        echo "You cannot upload this type of file.";
    }

    $query = "SELECT * FROM `users` WHERE uname = '$uname'";
    $result = mysqli_query($conn, $query);
    $errors = array();

    if (empty($fname) && empty($lname) && empty($uname) && empty($pass) && empty($conpassword)) {
        array_push($errors, "Missing all fields");
    } elseif (empty($fname)) {
        array_push($errors, "Missing First Name");
    } elseif (empty($lname)) {
        array_push($errors, "Missing Last Name");
    } elseif (empty($uname)) {
        array_push($errors, "Missing Email");
    } elseif (empty($pass)) {
        array_push($errors, "Missing Password");
    } elseif (!filter_var($uname, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    } elseif (strlen($pass) < 3) {
        array_push($errors, "Password must be 8 characters long.");
    } elseif ($pass !== $conpassword) {
        array_push($errors, "Password didn't match.");
    } elseif ($result && mysqli_num_rows($result) > 0) {
        array_push($errors, "Email already exists.");
    }
    
    if (count($errors) > 0) {
        $error_messages = implode("\\n", $errors); // Combine error messages into a single string
        echo "<script>alert('$error_messages');</script>"; // Display the alert button with error messages
    } else {
        $query = "INSERT INTO `users`(`id`, `image`, `fname`, `lname`, `gender`, `uname`, `pass`, `role`) VALUES 
                                    ('', 'profiles/$fileNameNew','$fname','$lname', '$gender','$uname','$pass', 'user')";
        mysqli_query($conn, $query);
        echo "<script>alert('Successfully added the information.');</script>"; // Display success message in an alert button
    }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTRATION</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
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
            margin: 5% auto;
            background-color: #a9a9a9;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            width: 100%;
            padding: 10px;
            background-color: #ffcc00;
            border: none;
            border-radius: 5px;
            color: #000;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #e6b800;
        }

        .links {
            margin-top: 10px;
            font-size: 13px;
            font-weight: 100;
        }

        .links a {
            text-decoration: none;
            color: black;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="../images/logo.png" alt="Logo">
        <span>Registration Form</span>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Picture</label>
                <input type="file" name="image" value="">
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <label for="uname">Email</label>
                <input type="email" id="uname" name="uname" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
            </div>
            <button type="submit" name="submit" class="btn">Register</button>
        </form>
        <div class="links">
            <a href="login.php">Already have an Account? Login Now</a>
        </div>
    </div>
</body>
</html>
