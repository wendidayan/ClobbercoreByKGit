<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ecommerce-Server-Side</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/LoginStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/Navbar-Right-Links-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.css') }}">
</head>

<body>
    <div class="d-flex justify-content-between align-items-center p-2 m-2">
        <a class="text-decoration-none" href="#" style="color: var(--bs-dark);">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none">
                <path d="M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z" fill="currentColor"></path>
            </svg>
        </a>
    </div>
    <!--Generate Invoice Success Alert, transaction generated and orderstatus updated alert message-->
    @if (session('success'))
        <div id="alert-invoice" class="alert alert-success text-center" style="font-size: 12px;" role="alert">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('alert-invoice').style.display = 'none';
            }, 3000);
        </script>
    @endif
    <div class="invoice-page-abc" style="display: flex;             justify-content: center;             align-items: center;            padding: 20px;">
        <div class="container modal-content-abc" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="d-flex justify-content-center align-items-center" style="flex-direction:column;text-align:center;">
                <h4 style="font-weight:bold;font-size:18px;">E-INVOICE {{ $invoice->invoice_number }}</h4>
                <h3 class="mb-3" style="font-size:14px;font-weight:bold;color:var(--bs-secondary);">OrderID#&nbsp;<span>{{ $order->id }}</span></h3>
            </div>
            <div class="row p-3">
                <div class="col-md-6">
                    <div class="info-grid-abc">
                        <div class="row">
                            <div class="col">
                                <div class="info-abc" style="background:rgba(215,172,75,0.1);">
                                    <div class="section-label"><span>Customer Name</span></div><span style="font-weight:bold;">{{ $order->user->fullname }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-abc">
                                    <div class="section-label"><span>Order Date</span></div><span style="font-weight:bold;">{{ $order->created_at->format('F d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-list-wrapper-abc">
                        @foreach ($order->orderItems as $item)
                            <div class="order-item-abc">
                                <img alt="{{ $item->product->name }}" src="{{ asset($item->product->image ?? 'assets/img/default.png') }}">
                                <div class="order-details-abc">
                                    <p>{{ $item->product->name }}</p>
                                    <p>₱<span>{{ $item->product->price }}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="auto-fill">
                        <div class="section-label"><span>Payment Method</span></div><span style="color:var(--bs-dark);">{{ $order->paymentMethod->name }}</span>
                    </div>
                    <div class="auto-fill">
                        <div class="section-label"><span>Delivery Method</span></div><span style="color:var(--bs-dark);">{{ $order->deliveryMethod->name }}</span>
                    </div>
                    <div class="auto-fill">
                        <div class="section-label"><span>Delivery Location</span></div>
                        <span style="color:var(--bs-dark);">
                            @if ($order->deliveryMethod->name === 'shipping')
                                {{ $order->shippingAddress 
                                    ?   $order->shippingAddress->street . ', ' . 
                                        $order->shippingAddress->barangay . ', ' . 
                                        $order->shippingAddress->city . ', ' . 
                                        $order->shippingAddress->province . ', ' . 
                                        $order->shippingAddress->region . ', ' . 
                                        $order->shippingAddress->zip_code 
                                    : 'N/A' }}
                            @elseif ($order->deliveryMethod->name === 'meetup')
                                {{ $order->meetupLocation ? $order->meetupLocation->city . ', ' . $order->meetupLocation->landmark : 'N/A' }}
                            @elseif ($order->deliveryMethod->name === 'pickup')
                                Central 2, Abuyog, Sorsogon City
                            @endif
                        </span>
                    </div>
                    <div class="auto-fill">
                        <div class="section-label"><span>Delivery day &amp; time</span></div><span style="color:var(--bs-dark);">{{ $invoice->delivery_date }} {{ $invoice->delivery_time }}</span>
                    </div>
                    <div class="summary-abc">
                        <p><span style="font-size: 12px;">Subtotal</span><span style="font-size: 12px;">₱{{ $order->orderItems->sum(fn($item) => $item->product->price) }}</span></p>
                        <p style="font-size: 14px;"><span style="font-size: 12px;">Delivery Fee</span><span style="font-size: 12px;">₱10</span></p>
                        <p class="bold" style="color:var(--bs-black);font-size:18px;"><span style="font-size: 14px;font-weight: bold;">Total Amount</span><span style="font-weight: bold;font-size: 16px;">₱630</span></p>
                    </div>
                    <form action="{{ route('invoice.send', $order->id) }}" method="POST">
                        @csrf

                        <button type="submit" class="btn send-invoice-btn" style="border-radius: 3px;background: #d7ac4b; color: #fff;">
                            Send E-Invoice
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/datetime.js"></script>
    <script src="assets/js/notif-tab.js"></script>
    <script src="assets/js/tabfunction.js"></script>


</body>

</html>