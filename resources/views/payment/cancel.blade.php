<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="text-success">Payment Cancelled!</h1>
        <p>Your payment has been cancelled.</p>
        <a href="{{ route('ToPay') }}" class="btn btn-primary">Go Back to Shop</a>
    </div>
</body>
</html>
