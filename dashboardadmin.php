<?php
require 'php/connection.php';

// Fetch the total landlords
$query_landlords = "SELECT COUNT(*) as total_landlords FROM users where role = 'landlord'";
$result_landlords = mysqli_query($conn, $query_landlords);
$total_landlords = mysqli_fetch_assoc($result_landlords)['total_landlords'];

// Fetch the total boarding houses
$query_boardinghouses = "SELECT COUNT(*) as total_boardinghouses FROM boardinghouses";
$result_boardinghouses = mysqli_query($conn, $query_boardinghouses);
$total_boardinghouses = mysqli_fetch_assoc($result_boardinghouses)['total_boardinghouses'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include 'navadmin.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Admin Dashboard</h2>

        <!-- Chart Section -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Statistics Overview</h4>
                <canvas id="statisticsChart" style="max-height: 400px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        // Get data from PHP variables
        const totalLandlords = <?php echo $total_landlords; ?>;
        const totalBoardingHouses = <?php echo $total_boardinghouses; ?>;

        // Configure Chart.js
        const ctx = document.getElementById('statisticsChart').getContext('2d');
        const statisticsChart = new Chart(ctx, {
            type: 'bar', // Bar chart
            data: {
                labels: ['Landlords', 'Boarding Houses'], // Labels
                datasets: [{
                    label: 'Total Count',
                    data: [totalLandlords, totalBoardingHouses], // Data
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Blue
                        'rgba(255, 206, 86, 0.7)'  // Yellow
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', // Blue
                        'rgba(255, 206, 86, 1)'  // Yellow
                    ],
                    borderWidth: 1 // Border width
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true, // Show legend
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Landlords vs Boarding Houses'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true // Start y-axis from 0
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
