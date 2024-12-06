<?php
include('php/connection.php'); // Include database connection file

// Fetch total landlords from the users table (assuming role is 'landlord')
$totalLandlordsQuery = "SELECT COUNT(*) AS total_landlords FROM users WHERE role = 'landlord'";
$totalLandlordsResult = mysqli_query($conn, $totalLandlordsQuery);
$totalLandlords = mysqli_fetch_assoc($totalLandlordsResult)['total_landlords'];

// Fetch all landlords for the table display
$landlordsQuery = "SELECT * FROM users WHERE role = 'landlord'";
$landlordsResult = mysqli_query($conn, $landlordsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Report</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery (necessary for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php include 'navadmin.php'; ?>

    <!-- Navbar or other sections here -->

    <div class="container mt-5">
        <h1 class="display-4">Landlord Report</h1>

        <!-- Landlord Summary -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Total Landlords</h3>
                <p class="card-text">
                    <?php echo $totalLandlords; ?>
                </p>
            </div>
        </div>

        <!-- Landlords Table -->
        <h2 class="mb-4">Landlords List</h2>
        <table id="landlordTable" class="display table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($landlord = mysqli_fetch_assoc($landlordsResult)) { ?>
                    <tr>
                        <td><?php echo $landlord['id']; ?></td>
                        <td><?php echo $landlord['fname']; ?></td>
                        <td><?php echo $landlord['lname']; ?></td>
                        <td><?php echo $landlord['uname']; ?></td>
                        <td><img src="/bhrm-main/<?php echo $landlord['image'] ?? 'default.png'; ?>" width="50" height="50" class="rounded-circle" alt="Profile Picture"></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS Initialization -->
    <script>
        $(document).ready(function() {
            $('#landlordTable').DataTable();
        });
    </script>

</body>
</html>
