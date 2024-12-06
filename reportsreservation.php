<?php
include('php/connection.php'); // Database connection file

$hname = $_SESSION['hname'];

// Fetch total reservations
$totalReservationsQuery = "SELECT COUNT(*) AS total_reservations FROM reservation WHERE hname = '$hname'";
$totalReservationsResult = mysqli_query($conn, $totalReservationsQuery);
$totalReservations = mysqli_fetch_assoc($totalReservationsResult)['total_reservations'];

// Fetch most reserved room
$mostReservedRoomQuery = "SELECT room_no, COUNT(room_no) AS count 
                          FROM reservation 
                          WHERE hname = '$hname' 
                          GROUP BY room_no 
                          ORDER BY count DESC LIMIT 1";
$mostReservedRoomResult = mysqli_query($conn, $mostReservedRoomQuery);
$mostReservedRoom = mysqli_fetch_assoc($mostReservedRoomResult);

// Fetch most common gender reserved
$mostGenderReservedQuery = "SELECT gender, COUNT(gender) AS count 
                            FROM reservation 
                            WHERE hname = '$hname' 
                            GROUP BY gender 
                            ORDER BY count DESC LIMIT 1";
$mostGenderReservedResult = mysqli_query($conn, $mostGenderReservedQuery);
$mostGenderReserved = mysqli_fetch_assoc($mostGenderReservedResult);

// Fetch most common student status reserved
$mostStudentStatusReservedQuery = "SELECT status, COUNT(status) AS count 
                                   FROM reservation 
                                   WHERE hname = '$hname' 
                                   GROUP BY status 
                                   ORDER BY count DESC LIMIT 1";
$mostStudentStatusReservedResult = mysqli_query($conn, $mostStudentStatusReservedQuery);
$mostStudentStatusReserved = mysqli_fetch_assoc($mostStudentStatusReservedResult);

// Fetch email with the highest reservations
$emailHighestReservationsQuery = "SELECT email, COUNT(email) AS count 
                                  FROM reservation 
                                  WHERE hname = '$hname' 
                                  GROUP BY email 
                                  ORDER BY count DESC LIMIT 1";
$emailHighestReservationsResult = mysqli_query($conn, $emailHighestReservationsQuery);
$emailHighestReservations = mysqli_fetch_assoc($emailHighestReservationsResult);

// Fetch counts for reservation statuses
$reservationStatusQuery = "SELECT 
                              SUM(res_stat = 'Approved') AS approved_count,
                              SUM(res_stat = 'Rejected') AS rejected_count,
                              SUM(res_stat = 'Ended') AS ended_count,
                              SUM(res_stat = 'Cancelled') AS cancelled_count
                           FROM reservation 
                           WHERE hname = '$hname'";
$reservationStatusResult = mysqli_query($conn, $reservationStatusQuery);
$reservationStatusData = mysqli_fetch_assoc($reservationStatusResult);

$approvedCount = $reservationStatusData['approved_count'];
$rejectedCount = $reservationStatusData['rejected_count'];
$endedCount = $reservationStatusData['ended_count'];
$cancelledCount = $reservationStatusData['cancelled_count'];

// Fetch reservation details for table
$reservationQuery = "SELECT * FROM reservation WHERE hname = '$hname' ORDER BY id DESC";
$reservationResult = mysqli_query($conn, $reservationQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Reports - <?php echo $hname; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card h5 {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #c19206;
        }
    </style>
</head>
<body>
    <?php include 'navigationbar.php'; ?>

    <div class="container my-4">
        <h1 class="text-center mb-4">Reservation Reports for <?php echo $hname; ?></h1>

        <!-- Summary Section -->
        <div class="summary">
            <div class="card">
                <h5>Total Reservations</h5>
                <p><?php echo $totalReservations; ?></p>
            </div>
            <div class="card">
                <h5>Most Reserved Room</h5>
                <p><?php echo $mostReservedRoom['room_no'] . ' (' . $mostReservedRoom['count'] . ' reservations)'; ?></p>
            </div>
            <div class="card">
                <h5>Most Reserved Gender</h5>
                <p><?php echo $mostGenderReserved['gender'] . ' (' . $mostGenderReserved['count'] . ')'; ?></p>
            </div>
            <div class="card">
                <h5>Most Reserved Status</h5>
                <p><?php echo $mostStudentStatusReserved['status'] . ' (' . $mostStudentStatusReserved['count'] . ')'; ?></p>
            </div>
            <div class="card">
                <h5>Email with Highest Reservations</h5>
                <p><?php echo $emailHighestReservations['email'] . ' (' . $emailHighestReservations['count'] . ')'; ?></p>
            </div>
            <div class="card">
                <h5>Approved Reservations</h5>
                <p><?php echo $approvedCount; ?></p>
            </div>
            <div class="card">
                <h5>Rejected Reservations</h5>
                <p><?php echo $rejectedCount; ?></p>
            </div>
            <div class="card">
                <h5>Ended Reservations</h5>
                <p><?php echo $endedCount; ?></p>
            </div>
            <div class="card">
                <h5>Cancelled Reservations</h5>
                <p><?php echo $cancelledCount; ?></p>
            </div>
        </div>

        <!-- DataTable Section -->
        <div class="mt-5">
            <h2 class="mb-3">Reservation Details</h2>
            <div class="table-responsive">
                <table id="reservationTable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Room No</th>
                            <th>Status</th>
                            <th>Requests</th>
                            <th>Date In</th>
                            <th>Date Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($reservation = mysqli_fetch_assoc($reservationResult)) { ?>
                            <tr>
                                <td><?php echo $reservation['fname']; ?></td>
                                <td><?php echo $reservation['lname']; ?></td>
                                <td><?php echo $reservation['email']; ?></td>
                                <td><?php echo $reservation['room_no']; ?></td>
                                <td><?php echo $reservation['status']; ?></td>
                                <td><?php echo $reservation['addons']; ?></td>
                                <td><?php echo $reservation['date_in']; ?></td>
                                <td><?php echo $reservation['date_out'] ?: 'N/A'; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reservationTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
</body>
</html>
