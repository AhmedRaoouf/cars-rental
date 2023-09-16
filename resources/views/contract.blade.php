<!DOCTYPE html>
<html>
<head>
    <title>Contract</title>
    <style>
        /* CSS styles for the contract layout */
        body {
            font-family: Arial, sans-serif;
        }
        .contract {
            margin: 30px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .contract h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .contract p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="contract">
        <h2>Contract</h2>
        <p><strong>Owner:</strong> {{ $owner }}</p>
        <p><strong>Borrower:</strong> {{ $borrower }}</p>
        <p><strong>Car:</strong> {{ $car }}</p>
        <p><strong>Rent Duration:</strong> {{ $rentDuration }}</p>
        <p><strong>From Date:</strong> {{ $fromDate }}</p>
        <p><strong>To Date:</strong> {{ $toDate }}</p>
        <p><strong>Total Price:</strong> {{ $totalPrice }}</p>
        <!-- Add more contract data here -->
    </div>
</body>
</html>
