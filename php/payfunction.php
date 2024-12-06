<?php
// Include database connection
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the payment record
    $query = "SELECT * FROM payments WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $payment = mysqli_fetch_assoc($result);
    $email = $payment['email'];
    $hname = $payment['hname'];

    if (!$payment) {
        echo "Payment not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_amount = floatval($_POST['payment']);
    $pay_stat = $_POST['pay_stat'];
    $pay_date = $_POST['pay_date'];
    $price = floatval($payment['price']);

    // Calculate the payment status if it's not manually selected
    if ($pay_stat === 'Fully Paid' || $pay_stat === 'Partially Paid') {
        // Validate user override
        if ($pay_stat === 'Fully Paid' && $payment_amount < $price) {
            $pay_stat = 'Partially Paid';
        }
    } else {
        // Automatically calculate pay_stat based on amount
        $pay_stat = $payment_amount >= $bed_price ? 'Fully Paid' : 'Partially Paid';
    }

    
    // Update the payment record
    $updateQuery = "UPDATE payments SET 
                    payment = $payment_amount, 
                    pay_stat = '$pay_stat', 
                    pay_date = '$pay_date' 
                    WHERE id = $id and email = '$email' and hname = '$hname'";

    if (mysqli_query($conn, $updateQuery)) {
        header('Location: ../payment.php');
        exit;
    } else {
        echo "Error updating payment: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary, .btn-secondary {
            width: 100%;
            padding: 10px;
        }

        .btn-primary {
            background-color: #ffc107;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #bf9310;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Payment</h1>
    <form method="POST">
        <!-- Payment Amount -->
        <div class="mb-3">
            <label for="payment" class="form-label">Payment Amount:</label>
            <input 
                type="number" 
                class="form-control" 
                id="payment" 
                name="payment" 
                step="0.01" 
                value="<?php echo $payment['payment']; ?>" 
                required>
        </div>

        <!-- Payment Status -->
        <div class="mb-3">
            <label for="pay_stat" class="form-label">Payment Status:</label>
            <select class="form-select" id="pay_stat" name="pay_stat">
                <option value="Fully Paid" <?php echo $payment['pay_stat'] == 'Fully Paid' ? 'selected' : ''; ?>>Fully Paid</option>
                <option value="Partially Paid" <?php echo $payment['pay_stat'] == 'Partially Paid' ? 'selected' : ''; ?>>Partially Paid</option>
                <option value="Not Paid" <?php echo $payment['pay_stat'] == 'Not Paid' ? 'selected' : ''; ?>>Not Paid</option>
            </select>
        </div>

        <!-- Payment Date -->
        <div class="mb-3">
            <label for="pay_date" class="form-label">Payment Date:</label>
            <input 
                type="datetime-local" 
                class="form-control" 
                id="pay_date" 
                name="pay_date" 
                value="<?php echo date('Y-m-d\TH:i', strtotime($payment['pay_date'])); ?>">
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
            <a href="../payment.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
