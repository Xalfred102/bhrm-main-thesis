<?php

include('php/connection.php'); // Database connection file

$hname = $_SESSION['hname'];

// Fetch total sum of payments from the reports table (based on payment)
$totalPaymentsQuery = "SELECT SUM(payment) AS total_payments 
                       FROM reports 
                       WHERE hname = '$hname' AND pay_date IS NOT NULL";
$totalPaymentsResult = mysqli_query($conn, $totalPaymentsQuery);
$totalPayments = mysqli_fetch_assoc($totalPaymentsResult)['total_payments'];

// Fetch total number of tenants (counting reports entries)
$paymentStatusQuery = "SELECT 
                          SUM(pay_stat = 'Fully Paid') AS fully_paid_count,
                          SUM(pay_stat = 'Not Paid') AS not_paid_count,
                          SUM(pay_stat = 'Partially Paid') AS partially_paid_count
                       FROM reports 
                       WHERE hname = '$hname'";
$paymentStatusResult = mysqli_query($conn, $paymentStatusQuery);
$paymentStatusData = mysqli_fetch_assoc($paymentStatusResult);

$fullyPaidCount = $paymentStatusData['fully_paid_count'];
$notPaidCount = $paymentStatusData['not_paid_count'];
$partiallyPaidCount = $paymentStatusData['partially_paid_count'];

// Fetch detailed report data for the landlord's boarding house
$reportQuery = "SELECT * FROM reports WHERE hname = '$hname' ORDER BY id DESC";
$reportResult = mysqli_query($conn, $reportQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - <?php echo $hname; ?></title>

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
        <h1 class="text-center mb-4">Reports for <?php echo $hname; ?></h1>

        <!-- Summary Section -->
        <div class="summary">
            <div class="card">
                <h5>Total Payments</h5>
                <p><?php echo number_format($totalPayments, 2); ?> PHP</p>
            </div>
            <div class="card">
                <h5>Fully Paid</h5>
                <p><?php echo $fullyPaidCount; ?></p>
            </div>
            <div class="card">
                <h5>Not Paid</h5>
                <p><?php echo $notPaidCount; ?></p>
            </div>
            <div class="card">
                <h5>Partially Paid</h5>
                <p><?php echo $partiallyPaidCount; ?></p>
            </div>
        </div>

        <!-- DataTable Section -->
        <div class="mt-5">
            <h2 class="mb-3">Detailed Reports</h2>
            <div class="table-responsive">
                <table id="reportTable" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Tenant Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Room No</th>
                            <th>Room Rent</th>
                            <th>Payment</th>
                            <th>Balance</th>
                            <th>Payment Date</th>
                            <th>Payment Status</th>
                            <th>Date In</th>
                            <th>Date Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($report = mysqli_fetch_assoc($reportResult)) {
                            $price = $report['price'] ?: 0; // Default to 0 if price is null
                            $payment = $report['payment'] ?: 0; // Default to 0 if payment is null
                            $balance = $price - $payment; // Calculate balance
                        ?>
                            <tr>
                                <td><?php echo $report['fname'] . ' ' . $report['lname']; ?></td>
                                <td><?php echo $report['gender']; ?></td>
                                <td><?php echo $report['email']; ?></td>
                                <td><?php echo $report['room_no']; ?></td>
                                <td><?php echo number_format($price, 2); ?> PHP</td>
                                <td><?php echo number_format($payment, 2); ?> PHP</td>
                                <td><?php echo number_format($balance, 2); ?> PHP</td>
                                <td><?php echo $report['pay_date'] ?: 'N/A'; ?></td>
                                <td><?php echo $report['pay_stat'] ?: 'N/A'; ?></td>
                                <td><?php echo $report['date_in']; ?></td>
                                <td><?php echo $report['date_out'] ?: 'N/A'; ?></td>
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
            $('#reportTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
</body>
</html>
