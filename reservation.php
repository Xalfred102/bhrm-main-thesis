<?php require 'php/connection.php';

if (!empty($_SESSION["uname"]) && !empty($_SESSION["role"])) {
    echo '';
} else {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVATION</title>
</head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        
        a{
            text-decoration: none;
            color: black;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            margin-left: 220px; /* Offset for the navbar */
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: black;
        }

        .background {
            background-image: url(images/a2.png);
            background-size: cover;  /* Ensure the image covers the entire container */
            background-position: center; /* Position the background image centrally */
            background-repeat: no-repeat;  /* Prevent the background from repeating */
            min-height: auto;  /* Ensure the section is at least the height of the viewport */
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:disabled {
            background-color: #ccc; /* Light gray background */
            color: #666; /* Darker gray text */
            border: 1px solid #999; /* Gray border */
            cursor: not-allowed; /* Change cursor to indicate it's not clickable */
            opacity: 0.6; /* Slightly transparent */
        }

        button:hover {
            background-color: #0056b3;
        }

        button.login {
            width: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }.login a{
            color: white;
        }

        /* Reject button style */
        button.reject {
            background-color: #dc3545; /* Bootstrap danger color */
        }

        button.reject:hover {
            background-color: #c82333; /* Darker shade on hover */
        }

        img {
            width: 150px; /* Adjust the size of the images */
            height: auto;
        }


    </style>

<body>
    <?php include 'navbar.php'; ?>
    
    

    <?php if(!empty($_SESSION['role']) && $_SESSION['role'] == 'landlord'): ?>
        
    <?php else: ?>
        <style>

            .back{
                height: 100px;
                display: flex;
                justify-content: right;
                align-items: center;
                margin-right: 300px;
            }.back a{
                height: auto;
            }
        
            @media (max-width: 479px){
                .back{
                    height: 100px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-right: 0;
                }.back a{
                    height: auto;
                }
            }
            
            .btn{
                color: rgb(255, 255, 255);
                padding: 10px 20px;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                background-color: #007bff;
            }
        </style>
        <div class="back">
            <div>
                <?php 
                    if(empty($_SESSION['uname'])){
                        echo "<a class='btn' href='index.php'>Back</a>";
                    }else{
                        echo "<a class='btn' href='index.php'>Back</a>";
                    }
                ?>
            </div>     
        </div>
    <?php endif; ?>


    <div class="container">    
    <?php
        if (!empty($_SESSION['uname']) && $_SESSION['role'] == 'user' && !empty($_SESSION['hname'])) {
            $uname = $_SESSION['uname'];
            $hname = $_SESSION['hname'];
            // Query all reservations for the user
            $reservationQuery = "SELECT * FROM reservation WHERE email = '$uname' and hname = '$hname' ORDER BY id DESC";
            $reservationResult = mysqli_query($conn, $reservationQuery);

            while ($reservation = mysqli_fetch_assoc($reservationResult)) {
                $reservationId = $reservation['id']; // Unique identifier for the reservation
                $roomPrice = $reservation['price']; // Price for the specific reservation
                $twobalance = $reservation['price'] - $reservation['payment'];
                
                // Fetch payment details for the current reservation
                $paymentQuery = "SELECT * FROM payments WHERE res_id = '$reservationId' ORDER BY id DESC";
                $paymentResult = mysqli_query($conn, $paymentQuery);
                $payment = mysqli_fetch_assoc($paymentResult);

                $paymentAmount = $payment['payment'] ?? 0;
                $balance = $roomPrice - $paymentAmount;
                ?>
                <div class="card">
                    <div class="card-footer">
                        <img src="<?php echo $reservation['image']; ?>" alt="Boarding House Image">
                    </div>
                    <div class="card-header">
                        <h5>Boarding House: <?php echo $reservation['hname']; ?></h5>
                    </div>
                    <div class="card-header">
                        <h5>Reservation #<?php echo $reservation['id']; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Guest Information:</strong></p>
                                <p>Name: <?php echo $reservation['fname'] . ' ' . $reservation['lname']; ?></p>
                                <p>Email: <?php echo $reservation['email']; ?></p>
                                <p>Gender: <?php echo $reservation['gender']; ?></p>
                                <p>Status: <?php echo $reservation['tenant_status']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Room Information:</strong></p>
                                <p>Room No: <?php echo $reservation['room_no']; ?></p>
                                <p>Room / Rent: <?php echo $reservation['price']; ?></p>
                                <p>Room Capacity: <?php echo $reservation['capacity']; ?></p>
                                <p>Room Selected Slots: <?php echo $reservation['room_slot']; ?></p>
                                <p>Current Tenant: <?php echo $reservation['current_tenant']; ?></p>
                                <p>Gender Allowed: <?php echo $reservation['gender']; ?></p>
                                <p>Room Amenities: <?php echo $reservation['amenities']; ?></p>
                                <p>Room Floor: <?php echo $reservation['room_floor']; ?></p>
                                <p>Room Status: <?php echo $reservation['status']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Reservation Details:</strong></p>
                                <p>Date In: <?php echo $reservation['date_in']; ?></p>
                                <p>Date Out: <?php echo $reservation['date_out']; ?></p>
                                <p>Requests: <?php echo $reservation['addons']; ?></p>
                                <p>Reservation Status: <?php echo $reservation['res_stat']; ?></p>
                                <p>Reservation Duration: <?php echo $reservation['res_duration']; ?></p>
                                <p>Reservation Reason: <?php echo $reservation['res_reason']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Payment Details:</strong></p>
                                <?php if ($payment) { ?>
                                    <p>Payment: <?php echo $payment['payment'] . ' PHP'; ?></p>
                                    <p>Payment Date: <?php echo $payment['pay_date']; ?></p>
                                    <p>Payment Status: <?php echo $payment['pay_stat']; ?></p>
                                    <p><strong>Balance: </strong><?php echo $balance . ' PHP'; ?></p>
                                <?php } else { ?>
                                    <p>Payment:  <?php echo $reservation['payment'] . ' PHP'; ?></p>
                                    <p>Payment Date: <?php echo $reservation['pay_date']; ?></p>
                                    <p>Payment Status: <?php echo $reservation['pay_stat']; ?></p>
                                    <p><strong>Balance: </strong><?php echo $twobalance . ' PHP'; ?></p>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>



        <?php
        if (!empty($_SESSION['uname']) && $_SESSION['role'] == 'user' && empty($_SESSION['hname'])) {
            $uname = $_SESSION['uname'];
            // Query all reservations for the user
            $reservationQuery = "SELECT * FROM reservation WHERE email = '$uname' ORDER BY id DESC";
            $reservationResult = mysqli_query($conn, $reservationQuery);

            while ($reservation = mysqli_fetch_assoc($reservationResult)) {
                $reservationId = $reservation['id']; // Unique identifier for the reservation
                $roomPrice = $reservation['price']; // Price for the specific reservation
                $twobalance = $reservation['price'] - $reservation['payment'];
                
                // Fetch payment details for the current reservation
                $paymentQuery = "SELECT * FROM payments WHERE res_id = '$reservationId' ORDER BY id DESC";
                $paymentResult = mysqli_query($conn, $paymentQuery);
                $payment = mysqli_fetch_assoc($paymentResult);

                $paymentAmount = $payment['payment'] ?? 0;
                $balance = $roomPrice - $paymentAmount;
                ?>
                <div class="card">
                    <div class="card-footer">
                        <img src="<?php echo $reservation['image']; ?>" alt="Boarding House Image">
                    </div>
                    <div class="card-header">
                        <h5>Boarding House: <?php echo $reservation['hname']; ?></h5>
                    </div>
                    <div class="card-header">
                        <h5>Reservation #<?php echo $reservation['id']; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Guest Information:</strong></p>
                                <p>Name: <?php echo $reservation['fname'] . ' ' . $reservation['lname']; ?></p>
                                <p>Email: <?php echo $reservation['email']; ?></p>
                                <p>Gender: <?php echo $reservation['gender']; ?></p>
                                <p>Status: <?php echo $reservation['tenant_status']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Room Information:</strong></p>
                                <p>Room No: <?php echo $reservation['room_no']; ?></p>
                                <p>Room / Rent: <?php echo $reservation['price']; ?></p>
                                <p>Room Capacity: <?php echo $reservation['capacity']; ?></p>
                                <p>Room Selected Slots: <?php echo $reservation['room_slot']; ?></p>
                                <p>Current Tenant: <?php echo $reservation['current_tenant']; ?></p>
                                <p>Gender Allowed: <?php echo $reservation['gender']; ?></p>
                                <p>Room Amenities: <?php echo $reservation['amenities']; ?></p>
                                <p>Room Floor: <?php echo $reservation['room_floor']; ?></p>
                                <p>Room Status: <?php echo $reservation['status']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Reservation Details:</strong></p>
                                <p>Date In: <?php echo $reservation['date_in']; ?></p>
                                <p>Date Out: <?php echo $reservation['date_out']; ?></p>
                                <p>Requests: <?php echo $reservation['addons']; ?></p>
                                <p>Reservation Status: <?php echo $reservation['res_stat']; ?></p>
                                <p>Reservation Duration: <?php echo $reservation['res_duration']; ?></p>
                                <p>Reservation Reason: <?php echo $reservation['res_reason']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Payment Details:</strong></p>
                                <?php if ($payment) { ?>
                                    <p>Payment: <?php echo $payment['payment'] . ' PHP'; ?></p>
                                    <p>Payment Date: <?php echo $payment['pay_date']; ?></p>
                                    <p>Payment Status: <?php echo $payment['pay_stat']; ?></p>
                                    <p><strong>Balance: </strong><?php echo $balance . ' PHP'; ?></p>
                                <?php } else { ?>
                                    <p>Payment:  <?php echo $reservation['payment'] . ' PHP'; ?></p>
                                    <p>Payment Date: <?php echo $reservation['pay_date']; ?></p>
                                    <p>Payment Status: <?php echo $reservation['pay_stat']; ?></p>
                                    <p><strong>Balance: </strong><?php echo $twobalance . ' PHP'; ?></p>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>

    </div>


    <style>
        .container{
            margin: 0 250px;
            width: auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            overflow-y: scroll;
            overflow-x: scroll;
            height: auto;
        } h1{
            text-align: center;
        }
        .container::-webkit-scrollbar {
            display: none; /* For Chrome, Safari, and Opera */
        }.container.second-container{
            margin: 0 250px;
            width: auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            overflow-y: scroll;
            overflow-x: scroll;
            height: auto;
        } 

        @media (max-width: 479px){
            .container{
                width: auto;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: 1fr;
                overflow-y: scroll;
                overflow-x: scroll;
                height: auto;
            }
        }

        .card {
            margin: 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            width: 550px;
        }

        @media (max-width: 479px){
            .card {
                margin: 20px;
                padding: 20px;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                border: 1px solid #ccc;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
                width: 280px;
            }
        }

        .card-header {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .card-body {
            width: auto;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .col-md-6{
            padding: 2px;
        }.col-md-6 p{
            margin-bottom: 3px;
        }

        @media (max-width: 479px){
                .card-body {
                    width: auto;
                    padding: 20px;
                    display: flex;
                    flex-direction: column;
                    grid-template-columns: 0fr;
                }
            }

        .card-footer {
            padding: 10px;
            background-color: #f0f0f0;
            border-top: 1px solid #ccc;
        }

        .card-footer img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .reject {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .reject:hover {
            background-color: #cc0000;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }

        .button-row{
            margin: auto;
            grid-column-start: 1;
            grid-column-end: 3;

        }
    </style>
  
</body>
</html>
