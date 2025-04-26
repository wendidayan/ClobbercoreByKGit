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

<body style="background: #f5f5f5;">
    <section id="hero" class="hero">
        <div id="hero-top" style="font-family: Montserrat, sans-serif;font-size: 16px;overflow: visible;">
            <nav class="navbar navbar-expand-md fixed-top d-md-flex justify-content-md-end mt-0" style="border-bottom-right-radius: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;border-top-right-radius: 0;margin-top: 0px;margin-right: 0px;margin-left: 0px;background: #ede6d2;" data-bs-theme="light">
                <div class="container-fluid main-nav-header" style="margin:8px;"><a class="navbar-brand d-flex justify-content-center align-items-center" href="#" style="color: var(--bs-gray-900);--bs-body-font-weight: normal;font-weight: bold;font-size: 25px;height: 60px;margin-right: 16px;"><img class="logo-2" src="assets/img/logo-2.svg">
                        <div class="main-nav-title">
                            <h1 class="d-flex justify-content-center align-items-center" style="font-weight:bold;font-family:'Open Sans', sans-serif;">CLOBBER<span>CORE&nbsp;</span><span class="by-k" style="font-family: 'Alex Brush', serif;">by K</span></h1>
                        </div>
                    </a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse d-md-flex justify-content-md-center justify-content-lg-end me-0 pe-0 ms-0" id="navcol-1">
                        <ul class="navbar-nav" style="border-top-style: none;">
                            <li class="nav-item"><a class="nav-link" href="{{ route('ShoppingPage') }}"  style="color:var(--bs-gray-dark);font-size:13px;">HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('Clothing') }}"  style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
                            <li class="nav-item"><a class="nav-link active nav-link active" href="{{ route('PrivacyPolicy') }}" style="color:var(--bs-gray-dark);font-size:13px;">MORE</a></li>
                        </ul>
                        <ul class="navbar-nav ms-auto nav-right" style="font-family:'Open Sans', sans-serif;">
                            <li class="nav-item"><a class="nav-link" href="#" style="font-size:13px;padding-right:20px;color:var(--bs-dark-text-emphasis);">
                                    <div class="notification-nav" id="notif"><svg fill="none" height="1em" style="width:20px;height:20px;" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" style="background:rgba(108,117,125,0.6);">12</span>
                                        <div id="notif-content" class="notif-box" style="margin:0px;margin-left:-360px;">
                                            <h5 style="font-size: 16px;margin: 0px;padding: 16px;border-bottom: 1px solid #ddd;background: rgba(215,172,75,0.1);">Recently Received Notifications</h5>
                                            <div class="notif-xyz" style="overflow-y:auto;scroll-behavior:smooth;height:250px;">
                                                <div class="notif-item p-4" style="border-bottom: 1px solid #ddd;" onclick="redirectToInvoicePage()">
                                                    <h4 class="m-0 pb-2" style="font-size: 14px;color: var(--bs-secondary);">Your e-invoce is ready!</h4>
                                                    <p class="m-0 pb-1" style="font-size: 12px;"><strong>OrderID: 250318U2QJ5N1J</strong></p>
                                                    <h6 style="font-size: 10px;color: var(--bs-secondary);">10/03/2025 10:30 PM</h6>
                                                </div>
                                                <div class="notif-item p-4" style="border-bottom: 1px solid #ddd;">
                                                    <h4 class="m-0 pb-2" style="font-size: 14px;color: var(--bs-secondary);">Order Confirmed</h4>
                                                    <p class="m-0 pb-1" style="font-size: 12px;">Your <strong>OrderID: 250318U2QJ5N1J</strong> has been confirmed.</p>
                                                    <h6 style="font-size: 10px;color: var(--bs-secondary);">10/03/2025 10:30 PM</h6>
                                                </div>
                                                <div class="notif-item p-4" style="border-bottom: 1px solid #ddd;" onclick="redirectToViewDetailsPage()">
                                                    <h4 class="m-0 pb-2" style="font-size: 14px;color: var(--bs-secondary);">Order Delivered</h4>
                                                    <p class="m-0 pb-1" style="font-size: 12px;">Your <strong>OrderID: 250318U2QJ5N1J</strong> has been delivered.</p>
                                                    <p class="m-0 pb-1" style="font-size: 12px;">Your feedback matters to us and helps us improve. Please take a moment to rate your experience and leave a review.</p>
                                                    <h6 style="font-size: 10px;color: var(--bs-secondary);">10/03/2025 10:30 PM</h6>
                                                </div>
                                            </div>
                                            <div id="viewAll" class="end-box p-3" style="background:rgba(215,172,75,0.1);  color: #d7ac4b;       font-weight: bold;"><span>View All Notifications</span></div>
                                        </div>
                                    </div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link"  href="{{ route('cart.view') }}" style="font-size:13px;padding-right:20px;">
                                    <div class="notification-nav" id="notif-1"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 4H19C19.5523 4 20 4.44771 20 5V19C20 19.5523 19.5523 20 19 20H5C4.44772 20 4 19.5523 4 19V5C4 4.44772 4.44771 4 5 4ZM2 5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V5ZM12 12C9.23858 12 7 9.31371 7 6H9C9 8.56606 10.6691 10 12 10C13.3309 10 15 8.56606 15 6H17C17 9.31371 14.7614 12 12 12Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" style="background:rgba(108,117,125,0.6);">12</span></div>
                                </a></li>
                            <li class="nav-item"><a class="nav-link" href="UserProfile.html" style="font-size:13px;">
                                    <div class="notification-nav" id="notif-2"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor" fill-rule="evenodd"></path><path d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor" fill-rule="evenodd"></path></svg></div>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="search-bar-main" class="search-div m-3" style="font-family: 'Open Sans', sans-serif;">
                <div class="main-search"><i class="fa fa-search"></i><input type="text" placeholder="Search here..."><button class="btn" type="button">Go</button></div>
            </div>
        </div>
        <div class="content">
            <div class="info-title" style="font-family: 'Open Sans', sans-serif;">
                <h2 class="mb-2" style="font-weight: bold;">Sustainable styles, Affordable finds</h2>
                <p>Shop the Thrift You Love.</p>
            </div>
        </div>
    </section>
    <section id="services-banner" class="mt-5" style="font-family: 'Open Sans', sans-serif;">
        <div class="new-arrival-heading" style="font-family: 'Open Sans', sans-serif;">
            <div class="container">
                <div></div>
            </div>
            <div class="container mt-0 pt-0">
                <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding: 50px 0px;">
                    <div class="container" style="font-family:'Open Sans', sans-serif;padding:0px;">
                        <div class="row gx-2 gy-2 row-cols-2 row-cols-md-2 text-center d-xxl-flex justify-content-xxl-center photos row-cols-xl-6 row-cols-lg-6" data-bss-baguettebox="">
                            <div class="col-xxl-1 offset-xxl-0 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label1.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Patok na Patok!</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label2.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Meet- Up</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label3.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Below Steals</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label4.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Preloved Fashions</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label5.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Thrift Picks</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label6.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Men's Shirt</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label7.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Sulit na Sulit</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label9.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Ukay Deals</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-1 item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/label8.png">
                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;text-align: center;">Daily Ukay&nbsp;</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section id="ad-section" class="ads mb-5">
        <div class="carousel slide" data-bs-ride="false" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/banner1.png" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/banner2.png" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/banner3.png" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="2"></button></div>
        </div>
    </section>
    <section id="categories" class="mt-5" style="font-family: 'Open Sans', sans-serif;">
        <div class="new-arrival-heading" style="font-family: 'Open Sans', sans-serif;">
            <div class="container">
                <div>
                    <h5 style="font-weight: bold;font-family: 'Open Sans', sans-serif;">CATEGORIES</h5>
                </div>
            </div>
            <div class="container mt-0 pt-0">
                <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding: 50px 0px;">
                    <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                        <div class="row gx-2 gy-2 row-cols-3 row-cols-md-3 photos row-cols-xl-6 row-cols-lg-6" data-bss-baguettebox="">
                            <div class="col item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/1.png">
                                        <h4 class="card-title" style="font-size: 12px;margin-top: 12px;text-align: center;">Men's Shirt</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/5.png">
                                        <h4 class="card-title" style="font-size: 12px;margin-top: 12px;text-align: center;">Women's Shirt</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/4.png">
                                        <h4 class="card-title" style="font-size: 12px;margin-top: 12px;text-align: center;">Women's Pants</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/7.png">
                                        <h4 class="card-title" style="font-size: 12px;margin-top: 12px;text-align: center;">Dress</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/3.png">
                                        <h4 class="card-title" style="font-size: 12px;margin-top: 12px;text-align: center;">Denim Short</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col item">
                                <div class="card">
                                    <div class="card-body"><img class="img-fluid" src="assets/img/2.png">
                                        <h4 class="card-title" style="font-size: 12px;margin-top: 12px;text-align: center;">Kidswear</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>



    <!--POPULAR BRANDS -->
    <section id="popular-brands" class="popular-brands mb-4">
        <div class="container">
            <h2 class="brand-title">Discover Your Favorite Brands- Pre-loved Treasures</h2>
            <div class="brand-scroll-container">
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'NIKE']) }}"><img alt="person in white nike crew neck shirt" class="brand-logo" src="assets/img/photo-1606105954396-43576bb5a44d.jpg">
                        <div class="brand-name">
                            <h6>Nike</h6>
                        </div>
                    </a></div>
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'UNIQLO']) }}"><img class="brand-logo" src="assets/img/uniqlo.jpg">
                        <div class="brand-name">
                            <h6>UNIQLO</h6>
                        </div>
                    </a></div>
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'ZARA']) }}"><img class="brand-logo" src="assets/img/zara.jpg">
                        <div class="brand-name">
                            <h6>ZARA</h6>
                        </div>
                    </a></div>
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'PUMA']) }}"><img class="brand-logo" src="assets/img/puma.jpg">
                        <div class="brand-name">
                            <h6>PUMA</h6>
                        </div>
                    </a></div>
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'LEVI\'S']) }}"><img class="brand-logo" src="assets/img/levis.jpg">
                        <div class="brand-name">
                            <h6>LEVI'S</h6>
                        </div>
                    </a></div>
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'GAP']) }}"><img class="brand-logo" src="assets/img/gap.jpg">
                        <div class="brand-name">
                            <h6>GAP</h6>
                        </div>
                    </a></div>
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'ADIDAS']) }}"><img class="brand-logo" src="assets/img/adidas.jpg">
                        <div class="brand-name">
                            <h6>ADIDAS</h6>
                        </div>
                    </a></div>
                <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'CHANEL']) }}"><img class="brand-logo" src="assets/img/chanel.jpg">
                        <div class="brand-name">
                            <h6>CHANEL</h6>
                        </div>
                    </a></div>
                    <div class="brand-card-inline"><a class="text-decoration-none" href="{{ route('BrandsPage', ['brand' => 'HM']) }}"><img class="brand-logo" src="{{asset('assets/img/hm.jpg')}}">
                        <div class="brand-name">
                            <h6>H&M</h6>
                        </div>
                    </a></div>
            </div>
        </div>
    </section>

    <!-- THRIFT DEALS -->
    <section id="bagsak-presyo">
        <div class="new-arrival-heading" style="font-family: 'Open Sans', sans-serif;">
            <div class="container">
                <div class="row text-center text-md-start align-items-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <div>
                            <h4 style="font-weight: bold;">Bagsak Presyo&nbsp;<span style="font-style: italic;color: #d7ac4b;">Thrift Deals:</span>&nbsp;</h4>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end d-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end mt-2 mt-md-0">
                        <div class="justify-content-center"><button class="btn d-flex justify-content-center col-12 col-md-6 text-md-end btn-outline-secondary rounded-pill align-items-center" type="button" style="width: 120px;height: 40px;padding: 10px 20px;font-weight: bold;background: #d7ac4b;color: var(--bs-black);border-style: none;font-family: 'Open Sans', sans-serif;font-size: small;"><a class="text-decoration-none" href="#" style="color: var(--bs-light);text-align: center;">See All<i class="fa fa-angle-right" style="margin-left: 8px;font-size: 16px;"></i>&nbsp;</a></button></div>
                    </div>
                </div>
            </div>
            <div class="container mt-0 pt-0">
                <section class="photo-gallery py-4 py-xl-5">
                    <div class="container" style="font-family: 'Open Sans', sans-serif;">
                        <div class="row gx-3 gy-4 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 photos" data-bss-baguettebox="">
                            @foreach ($thriftDeals as $product)
                                <div class="col item">
                                    <div class="card h-100">
                                        <a href="{{ route('product.view', $product->id) }}">
                                            <img class="img-fluid fixed-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="object-fit: cover; height: 150px; width: 100%;">
                                        </a>
                                        <div class="card-body p-2">
                                            <h4 class="card-title mb-1" style="font-size: 14px;">{{ $product->name }}</h4>
                                            <p class="mb-0" style="font-size: 16px; font-weight: bold; color: #d7ac4b;">₱{{ $product->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>


    <!-- NEW ARRIVALS -->    
    <section id="new-arrival" class="new-arrival-container">
        <div class="new-arrival-heading" style="font-family:'Open Sans', sans-serif;">
            <div class="container">
                <div class="row text-center text-md-start align-items-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <div>
                            <h4 style="font-weight:bold;">New&nbsp;<span style="font-style:italic;color:#d7ac4b;">Arrivals</span>&nbsp;- Get yours for Only&nbsp;<span class="price-tag">₱50</span>!</h4>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end d-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end mt-2 mt-md-0">
                        <div class="justify-content-center"><button class="btn btn-outline-secondary text-md-end d-flex justify-content-center align-items-center col-12 col-md-6 rounded-pill" type="button" style="width:175px;height:40px;padding:10px 20px;font-weight:bold;background:#d7ac4b;color:var(--bs-black);border-style:none;font-family:'Open Sans', sans-serif;font-size:small;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">All&nbsp;Collection<i class="fa fa-long-arrow-right" style="margin-left:8px;"></i></a></button></div>
                    </div>
                </div><button class="btn scroll-btn prev-btn" type="button" style="width:40px;height:40px;"><i class="fas fa-chevron-left"></i></button>
                <div id="newArrivals" class="new-arrivals-wrapper py-4 py-xl-5 mt-0 pt-4">
                @foreach ( $newArrivals as $product) 
                    <div class="product-card-slide" style="border-radius:6px;border-color:rgb(210,210,210);font-family:'Open Sans', sans-serif;"><a class="text-decoration-none" href="{{ route('product.view', $product->id) }}"><img class="img-fluid fixed-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}"></a>
                        <h4 class="product-title">{{ $product->name }} &nbsp;</h4>
                        <p class="text-start" style="font-weight: bold;color: #d7ac4b;">₱<span>{{ $product->price }}</span></p>
                    </div> @endforeach
                </div><button class="btn scroll-btn next-btn" type="button" style="width:40px;height:40px;"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>
    
    <!-- ALL OUT -->   
    <section id="all-products">
        <div class="new-arrival-heading" style="font-family: 'Open Sans', sans-serif;">
            <div class="container">
                <div class="row text-center text-md-start align-items-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <div>
                            <h4 style="font-weight: bold;">All-Out Ukay&nbsp;</h4>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end d-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end mt-2 mt-md-0">
                        <div class="justify-content-center"><button class="btn d-flex justify-content-center col-12 col-md-6 text-md-end btn-outline-secondary rounded-pill align-items-center" type="button" style="width: 120px;height: 40px;padding: 10px 20px;font-weight: bold;background: #d7ac4b;color: var(--bs-black);border-style: none;font-family: 'Open Sans', sans-serif;font-size: small;"><a class="text-decoration-none" href="#" style="color: var(--bs-light);text-align: center;">See All<i class="fa fa-angle-right" style="margin-left: 8px;font-size: 16px;"></i>&nbsp;</a></button></div>
                    </div>
                </div>
            </div>
            <div class="container mt-0 pt-0">
                <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding: 50px 0px;">
                    <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                        <div class="row gx-2 gy-2 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 photos" data-bss-baguettebox="">
                        @foreach ( $allProducts as $product) 
                            <div class="col item">
                                <div class="card" style="height: 280px;">
                                    <div class="card-body"><a  href="{{ route('product.view', $product->id) }}"><img class="img-fluid fixed-image"  src="{{ asset($product->image) }}"></a>
                                        <h4 class="card-title" style="font-size:14px;margin-top:12px;">{{$product->name }}</h4>
                                        <p style="font-size:16px;font-weight:bold;color:#d7ac4b;">₱{{$product->price }}</p>
                                    </div>
                                </div>
                            </div> @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section>
        <div class="container p-4 p-md-5 mt-3 mb-5" style="background: #ffffff;font-family: 'Open Sans', sans-serif;">
            <section>
                <h2 style="font-size:18px;">Reviews</h2>
            </section>
            <div class="review-card mt-4 p-4" style="border-radius:8px;border:1px solid rgba(173,181,189,0.6);">
                <div class="review-details">
                    <div class="d-flex align-items-xxl-center review-info gap-3"><img class="object-fit-cover review-profile" alt="woman standing near blue steel gate" style="border-radius:50%;border-bottom-width:6px;width:50px;height:50px;" src="assets/img/photo-1517841905240-472988babdf9.jpg">
                        <h6 class="username">Username</h6>
                    </div>
                    <div class="d-flex mt-3 date-time" style="font-size:smaller;color:rgba(108,117,125,0.76);">
                        <h6>2025-03-25&nbsp;</h6>
                        <h6>9:30</h6>
                    </div>
                    <div class="text-warning d-flex align-items-center mt-2 rating-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                    <div class="comment-card mt-3">
                        <div>
                            <p><span style="color:rgba(0, 0, 0, 0.87);">Matagal ko na ginagamit mga to. Will definitely buy again. Thank you seller at kay kuya na nag deliver. Well packed din yung mga item.</span></p>
                            <div class="d-flex customer-photos gap-2"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1517841905240-472988babdf9.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1740564014446-f07ea2da269c.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1529626455594-4ff0802cfb7e.jpg" style="width:72px;height:72px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="review-pagination mt-3" style="color: black;">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                </ul>
            </nav>
        </div>
    </section>
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
                                <li class="list-inline-item pb-2"><img class="object-fit-cover" src="assets/img/gcash.jpg" width="35px" height="35px"></li>
                                <li class="list-inline-item pb-2"><img class="object-fit-cover" src="assets/img/paymaya.jpg" width="35px" height="35px"></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start item social" style="font-family: 'Open Sans', sans-serif;">
                            <div class="fw-bold d-flex align-items-center mb-2"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center bs-icon me-2" style="background: #d7ac4b;width: 40px;height: 40px;padding: 0px;"><img src="assets/img/logo-2.svg" width="24" height="60" style="height: 25px;"></span><span style="color: #d47c08;">CLOBBER<span style="color: var(--bs-dark);">CORE BY K</span></span></div>
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
    <div class="scrollTop-chatbox-main" style="font-family: 'Open Sans', sans-serif;"><button class="btn btn-primary" type="button" onclick="toggleChatbox()"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chat">
                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894m-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"></path>
            </svg></button><button class="btn btn-primary" id="scroll-top" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-compact-up">
                <path fill-rule="evenodd" d="M7.776 5.553a.5.5 0 0 1 .448 0l6 3a.5.5 0 1 1-.448.894L8 6.56 2.224 9.447a.5.5 0 1 1-.448-.894l6-3z"></path>
            </svg></button></div>
    <div id="chatbox" class="chatbox-popup" style="font-family:'Open Sans', sans-serif;">
        <div class="chatbox-header">
            <div class="chatbox-header-info"><i class="fa fa-comments"></i>
                <div class="chatbox-logo-main">
                    <h2 class="chatbox-logo">ChatBox</h2>
                    <p>Chat with the seller.</p>
                </div>
            </div><button class="btn" id="close-chatbox" type="button"><i class="fa fa-chevron-down"></i></button>
        </div>
        <div class="chatbox-body">
            <div class="message bot-message"><i class="fa fa-user-circle seller-avatar"></i>
                <div class="message-text"><span> Hi there 👋🏻 </span><br><span> How can I help you today?</span></div>
            </div>
            <div class="message user-message">
                <div class="message-text">
                    <p>Hi hello, wow so ganda ng weather todei hehehehhe nag almusal ka na? Kain ka na</p>
                </div>
            </div>
            <div class="message bot-message thinking"><i class="fa fa-user-circle seller-avatar"></i>
                <div class="message-text">
                    <div class="thinking-indicator">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chatbox-footer">
            <form class="chatbox-form" action="#"><textarea class="chatbox-message-input" placeholder="Message here..." required=""></textarea>
                <div class="chatbox-controls"><button class="btn" id="emoji-picker" type="button"><i class="fa fa-smile-o"></i></button>
                    <div class="chatbox-file-wrapper"><input class="form-control form-control form-control" type="file" accept="images/*" hidden="" id="chatbox-inputfile"><img src="#"><button class="btn" id="chatbox-upload" type="button"><i class="fa fa-paperclip"></i></button><button class="btn" id="file-cancel" type="button"><i class="fa fa-close"></i></button></div><button class="btn" id="send-message-btn" type="button"><i class="fa fa-send" style="font-size:12px;"></i></button>
                </div>
            </form>
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

</body>

</html>