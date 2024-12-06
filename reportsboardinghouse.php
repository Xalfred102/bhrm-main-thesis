<?php
include('php/connection.php'); // Database connection file

// Fetch total boarding houses
$totalBoardingHousesQuery = "SELECT COUNT(*) AS total_houses FROM boardinghouses";
$totalBoardingHousesResult = mysqli_query($conn, $totalBoardingHousesQuery);
$totalBoardingHouses = mysqli_fetch_assoc($totalBoardingHousesResult)['total_houses'];

// Fetch approved and rejected boarding houses
$statusCountQuery = "SELECT 
                        SUM(status = 'Approved') AS approved_count, 
                        SUM(status = 'Rejected') AS rejected_count 
                     FROM bhapplication";
$statusCountResult = mysqli_query($conn, $statusCountQuery);
$statusCount = mysqli_fetch_assoc($statusCountResult);

$approvedCount = $statusCount['approved_count'];
$rejectedCount = $statusCount['rejected_count'];

// Fetch number of users who reserved for each boarding house
$reservationCountQuery = "SELECT hname, COUNT(*) AS reservation_count 
                          FROM reservation 
                          GROUP BY hname";
$reservationCountResult = mysqli_query($conn, $reservationCountQuery);

// Store reservation data in an associative array
$reservationCounts = [];
while ($row = mysqli_fetch_assoc($reservationCountResult)) {
    $reservationCounts[$row['hname']] = $row['reservation_count'];
}

// Fetch boarding house details for the table
$boardingHouseDetailsQuery = "SELECT * FROM boardinghouses ORDER BY id DESC";
$boardingHouseDetailsResult = mysqli_query($conn, $boardingHouseDetailsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House Report</title>

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery (necessary for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin-left: 220px; /* Offset for the navbar */
            padding: 20px;
        }

        .summary {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: calc(33.333% - 20px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            font-size: 1.5em;
            color: #333;
        }

        table.dataTable {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table.dataTable th,
        table.dataTable td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php include 'navadmin.php'; ?>

    <div class="container">
        <h1>Boarding House Report</h1>

        <!-- Summary Cards -->
        <div class="summary">
            <div class="card">
                <h3>Total Boarding Houses</h3>
                <p><?php echo $totalBoardingHouses; ?></p>
            </div>
            <div class="card">
                <h3>Approved Boarding Houses</h3>
                <p><?php echo $approvedCount; ?></p>
            </div>
            <div class="card">
                <h3>Rejected Boarding Houses</h3>
                <p><?php echo $rejectedCount; ?></p>
            </div>
        </div>

        <!-- Boarding House Details Table -->
        <h2>Boarding House Details</h2>
        <table id="boardingHouseTable" class="display">
            <thead>
                <tr>
                    <th>Boarding House Name</th>
                    <th>Address</th>
                    <th>Reservations</th>
                    <th>Landlord Name</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($house = mysqli_fetch_assoc($boardingHouseDetailsResult)) { 
                    $hname = $house['hname'];
                    $reservations = $reservationCounts[$hname] ?? 0; // Default to 0 if no reservations
                ?>
                    <tr>
                        <td><?php echo $house['hname']; ?></td>
                        <td><?php echo $house['haddress']; ?></td>
                        <td><?php echo $reservations; ?></td>
                        <td><?php echo $house['landlord']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#boardingHouseTable').DataTable();
        });
    </script>
</body>
</html>
