<?php
require 'php/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            color: white;
        }

        .video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .navbar-brand img {
            width: 80px;
            height: 80px;
        }
        .nav-link {
            color: #fff !important;
        }
        .container {
            margin-top: 150px;
        }

        h1, h2, p {
            color: #fff;
            text-align: center; /* Center align the text */
            font-weight: bold; /* Make text bold */
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #333;
        }

        .content {
            color: #fff;
            margin-top: 50px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .col-md-6 {
            margin-bottom: 20px;
        }

        .boarding-house-card {
            background-color: #a9a9a9;
            color: #fff;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            height: 100%;
        }

        .boarding-house-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 20px 20px 0 0;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
        }

        .btn-container button {
            flex: 0 0 48%;
        }

        .contact-form {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 10px;
            color: #fff;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
    </style>
</head>

<body>
<video autoplay muted loop class="video-background">
        <source src="backvideo.mp4" type="video/mp4">
    </video>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php
                if ($_SESSION == true) {
                    echo '<a class="btn btn-warning" href="php/logout.php">Logout</a>';
                } else {
                    echo '<a class="btn btn-warning" href="php/login.php">Login</a>';
                }
                ?>
            </ul>
        </div>
    </nav>

    <div class="container text-center">
        <h1>Contact Us</h1>
        <p>If you have any questions, feel free to reach out to us by filling the form below.</p>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-form">
                    <form action="php/contact.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
