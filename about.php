<?php
require 'php/connection.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

    <div class="container text-center" >
        <h1>About Us</h1>
        <p>Your company description goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Our Story</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero a nunc finibus, et
                    efficitur purus fermentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                    cubilia Curae.</p>
            </div>
            <div class="col-md-6">
                <h2>Our Mission</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero a nunc finibus, et
                    efficitur purus fermentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                    cubilia Curae.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
