<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
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
        <a class="text-decoration-none"  href="{{ route('UserProfile') }}"  style="color: var(--bs-dark);">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none">
            <path d="M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z" fill="currentColor"></path>
            </svg>
        </a>
    </div>
    <div class="invoice-page-abc" style="display: flex;             justify-content: center;             align-items: center;            padding: 20px;">
        <div class="container modal-content-abc" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);padding: 20px;">
            <div class="d-flex justify-content-center align-items-center" style="flex-direction:column;text-align:center;">
                <h4 style="font-weight:bold;font-size:18px;">E-INVOICE</h4>
                <h3 class="mb-3" style="font-size:14px;font-weight:bold;color:var(--bs-secondary);">OrderID#&nbsp;<span>{{ $order->id }}</span></h3>
            </div>
            <div class="row" style="padding: 10px;">
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
                        <div class="order-list-abc">
                            @foreach ($order->orderItems as $item )
                                <div class="order-item-abc"><img alt="gray and white adidas backpack" src="{{ asset($item->product->image ?? 'assets/img/default.png') }}">
                                    <div class="order-details-abc">
                                        <p>{{ $item->product->name }}</p>
                                        <p>₱<span>{{ $item->product->price }}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="auto-fill">
                        <div class="section-label"><span>Payment Method</span></div><span style="color:var(--bs-dark);"> {{ $order->paymentMethod->name ?? 'N/A' }}</span>
                    </div>
                    <div class="auto-fill">
                        <div class="section-label">
                            <span>Delivery Method</span>
                        </div>
                        <span id="delivery-method-abc" style="color:var(--bs-dark);">{{ $order->deliveryMethod->name ?? 'N/A' }}</span>
                    </div>
                    <div class="auto-fill">
                        <div class="section-label"><span>Transaction Location</span></div><span style="color:var(--bs-dark);">
                        @if ($order->deliveryMethod->name === 'shipping')
                            {{ $order->shippingAddress 
                                ? $order->shippingAddress->street . ', ' . 
                                $order->shippingAddress->barangay . ', ' . 
                                $order->shippingAddress->city . ', ' . 
                                $order->shippingAddress->province . ', ' . 
                                $order->shippingAddress->region . ', ' . 
                                $order->shippingAddress->zip_code 
                                : 'N/A' }} <!-- Assuming this is the correct field for shipping address -->
                        @elseif ($order->deliveryMethod->name === 'meetup')
                            {{ $order->meetupLocation ? $order->meetupLocation->city . ', ' . $order->meetupLocation->landmark : 'N/A' }}
                        @elseif ($order->deliveryMethod->name === 'pickup')
                            Central 2, Abuyog, Sorsogon City
                        @endif
                        </span>
                    </div>
                    <div class="summary-abc">
                        <p><span style="font-size: 12px;">Subtotal</span><span style="font-size: 12px;">₱{{ $order->orderItems->sum(fn($item) => $item->product->price) }}</span></p>
                        <p style="font-size: 14px;"><span style="font-size: 12px;">Delivery Fee</span><span style="font-size: 12px;">₱10</span></p>
                        <p class="bold" style="color:var(--bs-black);font-size:18px;"><span style="font-size: 14px;font-weight: bold;">Total Amount</span><span style="font-weight: bold;font-size: 16px;">₱630</span></p>
                    </div>
                    <form method="POST" action="{{ route('store.invoice') }}" id="invoice-form">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="schedule-delivery-wrapper" id="schedule-delivery-wrapper">
                            <label class="form-label">Delivery date</label>
                            <input id="schedule-day" name="delivery_date" type="date" required>
                            <label class="form-label">Delivery time</label>
                            <input id="schedule-time" name="delivery_time" type="time" required>
                        </div>
                        <div id="store-info" style="display: none;">
                            <p><strong>Store Hours:</strong> Mon-Sun 9:00 AM - 6:00 PM</p>
                            <p><strong>Contact Us:</strong> +63 903 485 449</p>
                        </div>
                        <button type="submit" class="btn confirm-order-btn" role="button" style="border-radius:3px;background:#d7ac4b;color:#fff;">Generate E-Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-invoice-modal" style="position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow-y: auto; background-color: rgba(0,0,0,0.6); justify-content: center; align-items: center; padding: 40px 20px; display: none;">
        <div style="background:#fff; padding:30px; border-radius:3px; text-align:center; max-width:500px; box-shadow:0 4px 15px rgba(0,0,0,0.2); margin: auto;">
            <div class="p-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24" fill="none" color="#d7ac4b">
                    <path d="M10.2426 16.3137L6 12.071L7.41421 10.6568L10.2426 13.4853L15.8995 7.8284L17.3137 9.24262L10.2426 16.3137Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z" fill="currentColor"></path>
                </svg>
                <p class="p-3" style="font-size: 16px;">Your e-invoice has been successfully sent to the customer.</p>
            </div>
            <div class="d-flex justify-content-end gap-2 p-2">
                <a class="btn btn-primary" role="button" style="border-radius: 3px;background: #d7ac4b;border-style: none;font-size: 14px;padding: 6px 12px;" id="success-modal-okay">Okay</a>
                <a class="btn" role="button" style="border-radius: 3px;font-size: 14px;color: var(--bs-dark);border-style: solid;border-color: #d7ac4b;" href="ViewInvoice.html">View E-Invoice</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datetime.js') }}"></script>
    <script src="{{ asset('admin/assets/js/notif-tab.js') }}"></script>
    <script src="{{ asset('admin/assets/js/tabfunction.js') }}"></script>


    


    
</body>

</html>