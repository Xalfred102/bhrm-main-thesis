<?php
include 'connection.php';

if (empty($_SESSION["uname"]) || empty($_SESSION["role"])) {
    header('location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h2 {
            color: #495057;
            font-weight: 700;
        }

        table {
            margin-top: 30px;
        }

        .badge {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <?php include '../navadmin.php'; ?>

    <div class="container my-5">
        <!-- Pending Section -->
        <h2 class="text-center mb-4">Pending Applications</h2>
        <table id="applicationsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Boarding House Name</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT DISTINCT bhapplication.hname, bhapplication.*, documents.*, description.* 
                          FROM bhapplication 
                          INNER JOIN documents ON bhapplication.hname = documents.hname
                          INNER JOIN description ON bhapplication.hname = description.hname 
                          WHERE bhapplication.status = 'PENDING' 
                          ORDER BY bhapplication.id DESC";
                $result = mysqli_query($conn, $query);
                while ($fetch = mysqli_fetch_assoc($result)): 
                ?>
                    <tr>
                        <td>
                            <!-- Checkbox for selection -->
                            <input type="radio" name="selectApplication" class="form-check-input" value="<?php echo $fetch['hname']; ?>" />
                        </td>
                        <td><?php echo $fetch['hname']; ?></td>
                        <td><?php echo $fetch['haddress']; ?></td>
                        <td><?php echo $fetch['bh_description']; ?></td>
                        <td>
                            <!-- Links to download documents -->
                            <a href="../<?php echo $fetch['bar_clear']; ?>" class="btn btn-link" target="_blank">Bar Clearance</a><br>
                            <a href="../<?php echo $fetch['bus_per']; ?>" class="btn btn-link" target="_blank">Business Permit</a>
                        </td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td>
                            <!-- Actions for admin -->
                            <?php if ($_SESSION["role"] == "admin"): ?>
                                <a href="bhfunction.php?approve=<?php echo $fetch['hname']; ?>" class="btn btn-success btn-sm">Approve</a>
                                <a href="bhfunction.php?reject=<?php echo $fetch['hname']; ?>" class="btn btn-danger btn-sm">Reject</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Approved Section (Similar to Pending Section) -->
        <h2 class="text-center my-4">Approved Applications</h2>
        <table id="approvedApplicationsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Boarding House Name</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT DISTINCT bhapplication.hname, bhapplication.*, documents.*, description.* 
                          FROM bhapplication 
                          INNER JOIN documents ON bhapplication.hname = documents.hname
                          INNER JOIN description ON bhapplication.hname = description.hname 
                          WHERE bhapplication.status = 'APPROVED' 
                          ORDER BY bhapplication.id DESC";
                $result = mysqli_query($conn, $query);
                while ($fetch = mysqli_fetch_assoc($result)): 
                ?>
                    <tr>
                        <td><?php echo $fetch['hname']; ?></td>
                        <td><?php echo $fetch['haddress']; ?></td>
                        <td><?php echo $fetch['bh_description']; ?></td>
                        <td>
                            <a href="../<?php echo $fetch['bar_clear']; ?>" class="btn btn-link" target="_blank">Bar Clearance</a><br>
                            <a href="../<?php echo $fetch['bus_per']; ?>" class="btn btn-link" target="_blank">Business Permit</a>
                        </td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td><button class="btn btn-secondary" disabled>Approved</button></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Rejected Section -->
        <h2 class="text-center my-4">Rejected Applications</h2>
        <table id="rejectedApplicationsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Boarding House Name</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT DISTINCT bhapplication.hname, bhapplication.*, documents.*, description.* 
                          FROM bhapplication 
                          INNER JOIN documents ON bhapplication.hname = documents.hname
                          INNER JOIN description ON bhapplication.hname = description.hname 
                          WHERE bhapplication.status = 'REJECTED' 
                          ORDER BY bhapplication.id DESC";
                $result = mysqli_query($conn, $query);
                while ($fetch = mysqli_fetch_assoc($result)): 
                ?>
                    <tr>
                        <td><?php echo $fetch['hname']; ?></td>
                        <td><?php echo $fetch['haddress']; ?></td>
                        <td><?php echo $fetch['bh_description']; ?></td>
                        <td>
                            <a href="../<?php echo $fetch['bar_clear']; ?>" class="btn btn-link" target="_blank">Bar Clearance</a><br>
                            <a href="../<?php echo $fetch['bus_per']; ?>" class="btn btn-link" target="_blank">Business Permit</a>
                        </td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                        <td><button class="btn btn-secondary" disabled>Rejected</button></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables for all tables
            $('#applicationsTable').DataTable({
                searching: true,
                paging: true,
                ordering: true,
                columnDefs: [{ targets: [0, 5], orderable: false }]
            });

            $('#approvedApplicationsTable').DataTable({
                searching: true,
                paging: true,
                ordering: true,
                columnDefs: [{ targets: [5], orderable: false }]
            });

            $('#rejectedApplicationsTable').DataTable({
                searching: true,
                paging: true,
                ordering: true,
                columnDefs: [{ targets: [5], orderable: false }]
            });
        });
    </script>
</body>

</html>
