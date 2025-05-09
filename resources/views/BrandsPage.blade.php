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

<body style="font-family: 'Open Sans', sans-serif;background: #f5f5f5;">
    <div id="hero-top" style="font-family: Montserrat, sans-serif;font-size: 16px;overflow: visible;">
        <nav class="navbar navbar-expand-md fixed-top d-md-flex justify-content-md-end mt-0" style="border-bottom-right-radius: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;border-top-right-radius: 0;margin-top: 0px;margin-right: 0px;margin-left: 0px;background: #ede6d2;" data-bs-theme="light">
            <div class="container-fluid main-nav-header" style="margin:8px;"><a class="navbar-brand d-flex justify-content-center align-items-center" href="#" style="color: var(--bs-gray-900);--bs-body-font-weight: normal;font-weight: bold;font-size: 25px;height: 60px;margin-right: 16px;"><img class="logo-2" src="{{asset('assets/img/logo-2.svg')}}">
                    <div class="main-nav-title">
                        <h1 class="d-flex justify-content-center align-items-center" style="font-weight:bold;font-family:'Open Sans', sans-serif;">CLOBBER<span>CORE&nbsp;</span><span class="by-k" style="font-family: 'Alex Brush', serif;">by K</span></h1>
                    </div>
                </a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-center justify-content-lg-end me-0 pe-0 ms-0" id="navcol-1">
                    <ul class="navbar-nav" style="border-top-style: none;">
                        <li class="nav-item"><a class="nav-link" href="{{ route('ShoppingPage') }}"  style="color:var(--bs-gray-dark);font-size:13px;">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Clothing') }}"style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('PrivacyPolicy') }}"  style="color:var(--bs-gray-dark);font-size:13px;">MORE</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto nav-right" style="font-family:'Open Sans', sans-serif;">
                        
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

                        <li class="nav-item"><a class="nav-link" href="{{ route('cart.view') }}"  style="font-size:13px;padding-right:20px;">
                                <div class="notification-nav" id="notif-1"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 4H19C19.5523 4 20 4.44771 20 5V19C20 19.5523 19.5523 20 19 20H5C4.44772 20 4 19.5523 4 19V5C4 4.44772 4.44771 4 5 4ZM2 5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V5ZM12 12C9.23858 12 7 9.31371 7 6H9C9 8.56606 10.6691 10 12 10C13.3309 10 15 8.56606 15 6H17C17 9.31371 14.7614 12 12 12Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" style="background:rgba(108,117,125,0.6);">{{ $cartCount }}</span></div>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('UserProfile') }}"  style="font-size:13px;">
                                <div class="notification-nav" id="notif-2"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor" fill-rule="evenodd"></path><path d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor" fill-rule="evenodd"></path></svg></div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div style="margin-top: 120px;">
        <div id="search-bar-main" class="search-div m-3" style="font-family: 'Open Sans', sans-serif;">
            <div class="main-search"><i class="fa fa-search"></i><input type="text" placeholder="Search here..."><button class="btn" type="button">Go</button></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 brand-1">
                    <div class="brand-title-2">
                        <h5>Brands you love</h5>
                    </div>
                    <div class="d-grid" style="grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));">
                        <a href="{{ route('BrandsPage', ['brand' => 'UNIQLO']) }}"> <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/uniqlo.jpg')}}"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'GAP']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/gap.jpg')}}"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'HM']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/hm.jpg')}}"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'PUMA']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/puma.jpg')}}" width="60" height="60"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'NIKE']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/nike.jpg')}}"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'ADIDAS']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/adidas.jpg')}}"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'LEVI\'S']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/levis.jpg')}}"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'ZARA']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/zara.jpg')}}"></div>
                        </div></a>
                        <a href="{{ route('BrandsPage', ['brand' => 'CHANEL']) }}">
                        <div class="brand-container-1">
                            <div class="brand-logo-2"><img src="{{asset('assets/img/chanel.jpg')}}"></div>
                        </div></a>
                    </div>
                </div>

                
                <div class="col col-md-9 brand-2">
                    <form action="{{ route('BrandsPage', ['brand' => $brand]) }}" method="GET">
                        <div class="filter-section-right" style="padding: 20px 10px 0px;">
                            <h5 style="padding-top: 0px; padding-bottom: 0px;">Filters</h5>
                            <div class="filter-row-right">
                                <!-- Color Filter -->
                                <div class="filter-dropdown-right col-md-3 col-12">
                                    <select name="color" class="form-select">
                                        <option value="">Select Color</option>
                                        @foreach($availableColors as $color)
                                            <option value="{{ $color }}" {{ request('color') == $color ? 'selected' : '' }}>
                                                {{ ucfirst($color) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Size Filter -->
                                <div class="filter-dropdown-right col-md-3 col-12">
                                    <select name="size" class="form-select">
                                        <option value="">Select Size</option>
                                        @foreach($availableSizes as $size)
                                            <option value="{{ $size }}" {{ request('size') == $size ? 'selected' : '' }}>
                                                {{ strtoupper($size) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Price Range Inputs -->
                                <div class="d-flex price-range col-md-4 col-12 gap-2 col-lg-2">
                                    <input type="number" name="min_price" class="form-control" min="0"
                                        placeholder="Min" value="{{ request('min_price') }}"
                                        min="0" max="{{ $priceRange->max_price ?? '' }}">

                                    <input type="number" name="max_price" class="form-control" min="0"
                                        placeholder="Max" value="{{ request('max_price') }}"
                                        min="0" max="{{ $priceRange->max_price ?? '' }}">
                                </div>

                                <!-- Apply Button -->
                                <button type="submit" class="apply-btn-right col-md-2 col-12">Apply Filters</button>
                            </div>
                        </div>
                    </form>


                    <div class="filter-section-right pb-2" style="padding-top: 10px;padding-right: 10px;padding-left: 10px;padding-bottom: 5px;">
                        <div>
                            <h1 style="font-size:16px;">Pre-Loved Branded Finds</h1>
                        </div>
                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 mt-3">
                        @forelse ($products as $product)
                            <div class="col">
                                <div class="brand-card"><a class="text-decoration-none" href="{{ route('product.view', $product->id) }}"><img alt="gray and white adidas backpack" src="{{ asset($product->image) }}"></a>
                                    <h1 class="branded-title">{{ $product->name }}</h1>
                                    <p class="branded-price">₱<span>{{ $product->price }}</span></p>
                                </div>
                            </div>
                            @empty
                            <p>No products found for this brand.</p>
                        @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="footer">
        <div>
            <footer style="background: #ede6d2;">
                <div class="container py-3 py-lg-4">
                    <div class="row justify-content-between">
                        <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="font-family: 'Open Sans', sans-serif;">
                            <h3 class="fs-6">Services</h3>
                            <ul class="list-unstyled">
                                <li class="pb-2"><a class="text-decoration-none link-secondary" href="#services" style="color: rgb(108, 117, 125);">Curated Thrift Selection</a></li>
                                <li class="pb-2"><a class="text-decoration-none link-secondary" href="#services">Meet-Up &amp; Local Shipping (Sorsogon only)</a></li>
                                <li class="pb-2"><a class="text-decoration-none link-secondary" href="#services">Custumer Support</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="font-family: 'Open Sans', sans-serif;">
                            <h3 class="fs-6">About Us</h3>
                            <ul class="list-unstyled">
                                <li class="pb-2"><a class="text-decoration-none link-secondary" href="#aboutus">Our Mission</a></li>
                                <li class="pb-2"><a class="text-decoration-none link-secondary" href="#aboutus">What We Offer</a></li>
                                <li class="pb-2"><a class="text-decoration-none link-secondary" href="#aboutus">Why Choose Us</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="font-family: 'Open Sans', sans-serif;">
                            <h3 class="fs-6">Payment Supported</h3>
                            <ul class="list-inline gap-2">
                                <li class="list-inline-item pb-2"><img class="object-fit-cover" src="{{asset('assets/img/gcash.jpg')}}" width="35px" height="35px"></li>
                                <li class="list-inline-item pb-2"><img class="object-fit-cover" src="{{asset('assets/img/paymaya.jpg')}}" width="35px" height="35px"></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start item social" style="font-family: 'Open Sans', sans-serif;">
                            <div class="fw-bold d-flex align-items-center mb-2"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center bs-icon me-2" style="background: #d7ac4b;width: 40px;height: 40px;padding: 0px;"><img src="{{asset('assets/img/logo-2.svg')}}" width="24" height="60" style="height: 25px;"></span><span style="color: #d47c08;">CLOBBER<span style="color: var(--bs-dark);">CORE BY K</span></span></div>
                            <p class="text-muted copyright">Sustainable Styles, Affordable Finds.</p>
                            <div>
                                <p class="text-muted">Visit and follow us on:</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook-square" style="width: 16px;color: rgba(33,37,41,0.75);"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" style="width: 16px;color: rgba(33,37,41,0.75);"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="d-flex justify-content-evenly pb-0" style="background: #d7ac4b;font-size: 14px;">
                    <p class="p-3"><i class="far fa-copyright" style="padding: 5px;"></i>2024 Clobbercore By K. All right reserved. Clobbercore By K, Sorsogon, Philippines.</p><a class="text-decoration-none" href="PrivacyPolicy.html">
                        <p class="p-3" style="color: var(--bs-dark); cursor: pointer;">User Terms &amp; Condition | Privacy Policy</p>
                    </a>
                </div>
            </footer>
        </div>
    </section>
    <div class="scrollTo-top"><button class="btn btn-primary scrollTop" id="scroll-top" type="button" style="background: #d7ac4b;border-style: none;"><i class="fa fa-chevron-up" style="color: var(--bs-light);"></i></button></div>
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
    document.querySelector('form').addEventListener('submit', function(e) {
        let minPrice = document.querySelector('input[name="min_price"]');
        let maxPrice = document.querySelector('input[name="max_price"]');

        let minValue = parseFloat(minPrice.value);
        let maxValue = parseFloat(maxPrice.value);

        if (!isNaN(minValue) && !isNaN(maxValue) && minValue > maxValue) {
            e.preventDefault(); // Stop form from submitting
            alert("Minimum price cannot be greater than maximum price.");
            maxPrice.focus();
        }
    });
</script>

<script>
    function redirectToInvoicePage(notificationId) {
        var url = '{{ route("invoice.show", ":id") }}'; // Use notification ID if that’s what your route expects
        url = url.replace(':id', notificationId);
        window.location.href = url;
    }
</script>
</body>

</html>