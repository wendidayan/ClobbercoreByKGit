<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ecommerce-Client-Side</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,700,800&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Lightbox-Gallery-baguetteBox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/LoginStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/test.css') }}">
</head>

<body style="font-family: 'Open Sans', sans-serif;">
    <div id="hero-top" style="font-family: Montserrat, sans-serif;font-size: 16px;overflow: visible;">
        <nav class="navbar navbar-expand-md fixed-top d-md-flex justify-content-md-end mt-0" style="border-bottom-right-radius: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;border-top-right-radius: 0;margin-top: 0px;margin-right: 0px;margin-left: 0px;background: #ede6d2;" data-bs-theme="light">
            <div class="container-fluid main-nav-header" style="margin:8px;"><a class="navbar-brand d-flex justify-content-center align-items-center" href="#" style="color: var(--bs-gray-900);--bs-body-font-weight: normal;font-weight: bold;font-size: 25px;height: 60px;margin-right: 16px;"><img class="logo-2" src="{{asset('assets/img/logo-2.svg')}}">
                    <div class="main-nav-title">
                        <h1 class="d-flex justify-content-center align-items-center" style="font-weight:bold;font-family:'Open Sans', sans-serif;">CLOBBER<span>CORE&nbsp;</span><span class="by-k" style="font-family: 'Alex Brush', serif;">by K</span></h1>
                    </div>
                </a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-center justify-content-lg-end me-0 pe-0 ms-0" id="navcol-1">
                    <ul class="navbar-nav" style="border-top-style: none;">
                        <li class="nav-item"><a class="nav-link" href="{{ route('ShoppingPage') }}" style="color:var(--bs-gray-dark);font-size:13px;">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Clothing') }}"style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('PrivacyPolicy') }}"style="color:var(--bs-gray-dark);font-size:13px;">MORE</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto nav-right" style="font-family:'Open Sans', sans-serif;">
                    <li class="nav-item"><a class="nav-link" href="#" style="font-size:13px;padding-right:20px;color:var(--bs-dark-text-emphasis);">
                                <div class="notification-nav" id="notif"><svg fill="none" height="1em" style="width:20px;height:20px;" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" id="notif-badge" style="background:rgba(108,117,125,0.6);"> {{ $notifCount }}</span>
                                    <div id="notif-content" class="notif-box" style="margin:0px;margin-left:-360px;">
                                        <h5 style="font-size: 16px;margin: 0px;padding: 16px;border-bottom: 1px solid #ddd;background: rgba(215,172,75,0.1);">Recently Received Notifications</h5>
                                        <div class="notif-xyz"   id="notif-list" style="overflow-y:auto;scroll-behavior:smooth;height:250px;">
                                            @forelse ($notifications as $notif)
                                                <div class="notif-item p-4" style="border-bottom: 1px solid #ddd;" onclick="redirectToInvoicePage({{ $notif->id }})">
                                                    <h4 class="m-0 pb-2" style="font-size: 14px;color: var(--bs-secondary);">Invoice Sent</h4>
                                                    <p class="m-0 pb-1" style="font-size: 12px;">Your <strong>OrderID: {{ $notif->order_id }}</strong> has an e-invoice ready.</p>
                                                    <h6 style="font-size: 10px;color: var(--bs-secondary);">{{ \Carbon\Carbon::parse($notif->created_at)->format('m/d/Y h:i A') }}</h6>
                                                </div>
                                            @empty
                                                <div class="p-4">No new notifications.</div>
                                            @endforelse
                                      <!--      <div class="notif-item p-4" style="border-bottom: 1px solid #ddd;">
                                                <h4 class="m-0 pb-2" style="font-size: 14px;color: var(--bs-secondary);">Order Confirmed</h4>
                                                <p class="m-0 pb-1" style="font-size: 12px;">Your <strong>OrderID: 250318U2QJ5N1J</strong> has been confirmed.</p>
                                                <h6 style="font-size: 10px;color: var(--bs-secondary);">10/03/2025 10:30 PM</h6>
                                            </div>
                                            <div class="notif-item p-4" style="border-bottom: 1px solid #ddd;" onclick="redirectToViewDetailsPage()">
                                                <h4 class="m-0 pb-2" style="font-size: 14px;color: var(--bs-secondary);">Order Delivered</h4>
                                                <p class="m-0 pb-1" style="font-size: 12px;">Your <strong>OrderID: 250318U2QJ5N1J</strong> has been delivered.</p>
                                                <p class="m-0 pb-1" style="font-size: 12px;">Your feedback matters to us and helps us improve. Please take a moment to rate your experience and leave a review.</p>
                                                <h6 style="font-size: 10px;color: var(--bs-secondary);">10/03/2025 10:30 PM</h6>
                                            </div>-->
                                        </div>
                                        <div id="viewAll" class="end-box p-3" style="background:rgba(215,172,75,0.1);  color: #d7ac4b;       font-weight: bold;" href="UserProfile.html#notifications"><span>View All Notifications</span></div>
                                    </div>
                                </div>
                            </a></li>

                            
                        <li class="nav-item"><a class="nav-link" href="{{ route('cart.view') }}" style="font-size:13px;padding-right:20px;">
                                <div class="notification-nav" id="notif-1"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 4H19C19.5523 4 20 4.44771 20 5V19C20 19.5523 19.5523 20 19 20H5C4.44772 20 4 19.5523 4 19V5C4 4.44772 4.44771 4 5 4ZM2 5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V5ZM12 12C9.23858 12 7 9.31371 7 6H9C9 8.56606 10.6691 10 12 10C13.3309 10 15 8.56606 15 6H17C17 9.31371 14.7614 12 12 12Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" style="background:rgba(108,117,125,0.6);">{{ $cartCount }}</span>
                                    <div class="notif-box" id="notif-content-1">
                                        <h5 style="font-size:18px;margin:0px;padding:15px;border-bottom:1px solid #ddd;background:rgba(215,172,75,0.1);font-weight:bold;">Recently Received Notifications</h5>
                                        <div class="notif-item">
                                            <p>COD Request Confirmed: Order 250318U2QJ5N1J</p>
                                        </div>
                                        <div class="notif-item">
                                            <p>Payment Confirmed: Order 250318U2QJ5N1J</p>
                                        </div>
                                        <div class="notif-item">
                                            <p>COD Request Confirmed: Order 250318U2QJ5N1J</p>
                                        </div>
                                        <div class="end-box" style="background:rgba(215,172,75,0.1);"></div>
                                    </div>
                                </div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('UserProfile') }}"  style="font-size:13px;">
                                <div class="notification-nav" id="notif-2"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor" fill-rule="evenodd"></path><path d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor" fill-rule="evenodd"></path></svg></div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container invoice-container" style="margin-top:120px;">
        <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;text-align: center;">
            <h2 style="font-size: 18px;">E-Invoice  {{ $invoice->invoice_number }}</h2>
            <h3 class="mb-3" style="font-size: 16px;font-weight: bold;">OrderID#&nbsp;<span>{{ $order->id }}</span></h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="info-grid-abc">
                    <div class="info-abc" style="background: rgba(215,172,75,0.1);">
                        <div class="section-label"><span>Customer Name</span></div><span style="font-weight: bold;">{{ $order->user->fullname }}</span>
                    </div>
                    <div class="info-abc">
                        <div class="section-label"><span>Order Date</span></div><span style="font-weight: bold;"> {{ $order->created_at->format('F d, Y') }}</span>
                    </div>
                </div>
                <div class="order-list-wrapper-abc">
                @foreach ($order->orderItems as $item)
                    <div class="order-list-abc">
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
                    <div class="section-label"><span>Payment Method</span></div><span style="color: var(--bs-dark);"> {{ $order->paymentMethod->name }}</span>
                </div>
                <div class="auto-fill">
                    <div class="section-label"><span>Delivery Method</span></div><span style="color: var(--bs-dark);">{{ $order->deliveryMethod->name }}</span>
                </div>
                <div class="auto-fill">
                    <div class="section-label"><span>Transaction Location</span></div><span style="color: var(--bs-dark);"> @if ($order->deliveryMethod->name === 'shipping')
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
                            @endif</span>
                </div>
                <div class="auto-fill">
                    <div class="section-label"><span>Delivery day &amp; time</span></div><span style="color: var(--bs-dark);">{{ $invoice->delivery_date }} {{ $invoice->delivery_time }}</span>
                </div>
                <div class="summary-abc">
                    <p style="font-size: 14px;"><span style="font-size: 12px;">Subtotal</span><span style="font-size: 12px;">₱{{ $order->orderItems->sum(fn($item) => $item->product->price) }}</span></p>
                    <p style="font-size: 14px;"><span style="font-size: 12px;">Delivery Fee</span><span style="font-size: 12px;">₱{{ $deliveryFee }}</span></p>
                    <p class="bold" style="color: var(--bs-black);font-size: 20px;"><span style="font-size: 14px;font-weight: bold;">Total Amount</span><span style="font-weight: bold;">₱ {{ $order->orderItems->sum(fn($item) => $item->product->price) + $deliveryFee }}</span></p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('assets/js/emojiJs.js') }}"></script>
    <script src="{{ asset('assets/js/chatbox.js') }}"></script>
    <script src="{{ asset('assets/js/forgotpass.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('assets/js/hover-notif.js') }}"></script>
    <script src="{{ asset('assets/js/Lightbox-Gallery-baguetteBox.min.js') }}"></script>
    <script src="{{ asset('assets/js/Lightbox-Gallery.js') }}"></script>
    <script src="{{ asset('assets/js/my-profileJS.js') }}"></script>
    <script src="{{ asset('assets/js/my-purchaseTab.js') }}"></script>
    <script src="{{ asset('assets/js/scrolltotop.js') }}"></script>
    <script src="{{ asset('assets/js/steps.js') }}"></script>
    <script src="{{ asset('assets/js/tabDelivery.js') }}"></script>
    <script src="{{ asset('assets/js/tabfunction.js') }}"></script>

    <script>
    function redirectToInvoicePage(notificationId) {
        var url = '{{ route("invoice.show", ":id") }}'; // Use notification ID if that’s what your route expects
        url = url.replace(':id', notificationId);
        window.location.href = url;
    }
</script>
</body>

</html>