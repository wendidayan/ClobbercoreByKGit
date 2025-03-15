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
    <h2>Proceed with Online Payment</h2>
    <p>You have selected Gcash/Paymaya. Click the button below to continue.</p>
    <form action="{{ route('paymongo.checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="amount" value="{{ session('amount') }}">
        <input type="hidden" name="selected_payment" value="{{ session('selected_payment') }}">
        <button type="submit" class="btn btn-success">Pay Online</button>
    </form>
    <a href="{{ route('ShoppingPage') }}" class="btn btn-primary">Go Back to Shop</a>
</div>
</body>
</html>
