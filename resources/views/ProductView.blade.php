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
                        <li class="nav-item"><a class="nav-link" href="Clothing.html" style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('PrivacyPolicy') }}" style="color:var(--bs-gray-dark);font-size:13px;">MORE</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('cart.view') }}" style="font-size:13px;padding-right:20px;">
                                <div class="notification-nav" id="notif-1"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 4H19C19.5523 4 20 4.44771 20 5V19C20 19.5523 19.5523 20 19 20H5C4.44772 20 4 19.5523 4 19V5C4 4.44772 4.44771 4 5 4ZM2 5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V5ZM12 12C9.23858 12 7 9.31371 7 6H9C9 8.56606 10.6691 10 12 10C13.3309 10 15 8.56606 15 6H17C17 9.31371 14.7614 12 12 12Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" style="background:rgba(108,117,125,0.6);">12</span>
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
                        <li class="nav-item"><a class="nav-link" href="UserProfile.html" style="font-size:13px;">
                                <div class="notification-nav" id="notif-2"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor" fill-rule="evenodd"></path><path d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor" fill-rule="evenodd"></path></svg></div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="margin-top: 120px;">
        <div class="row p-4 p-md-5" style="background: var(--bs-body-bg);font-family: 'Open Sans', sans-serif;">
            <div class="col-12 col-md-12 col-lg-5 mb-4 mt-4">
                <div class="productView-image"><img class="img-fluid pb-2 main-image-container" alt="Product Image" id="mainImage" src="{{ asset($product->image) }}">
                    <div class="small-img-group">
                        <div class="small-img-col"><img class="object-fit-cover small-img" alt="gray and white adidas backpack" width="100%" src="{{asset('assets/img/photo-1613130061126-fae9b27545f9.jpg')}}" height="100px"></div>
                        <div class="small-img-col"><img class="object-fit-cover small-img" width="100%" src="{{asset('assets/img/maincover992.png')}}" height="100px"></div>
                        <div class="small-img-col"><img class="object-fit-cover small-img" alt="smiling man standing near green trees" width="100%" src="{{ asset($product->image) }}" height="100px"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 mb-4 mt-4">
                <p class="text-muted">Category:&nbsp;<a class="text-decoration-none" href="#">{{ $product->category->name }} &gt; {{ $product->subcategory->name }}</a></p>
                <h3 class="mb-3">{{ $product->name }}</h3>
                <h2 class="fw-bold mb-3" style="font-weight:bold;">₱&nbsp;<span>{{ $product->price }}</span></h2>
                <ul class="list-unstyled mb-3">
                    <li>Color:&nbsp;<span>{{ $product->color }}</span></li>
                    <li>Size:&nbsp;<span>{{ $product->size }}</span></li>
                </ul>
                <p class="fw-bold text-success mt-3 mb-3">Only 1 piece available | Rare Find</p>
                <div class="row text-center d-flex justify-content-between buy-add-button mt-5">
                    <!--Adding to cart-->
                    <div class="col" style="padding:0px 0px;height:50px;">
                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="btn btn-primary"
                            style="font-size: 12px; padding: 5px 10px; background: rgba(215,172,75,0.14); width: 90%; height: 50px; border: 1.4px solid #d7ac4b; border-radius: 3px;">
                            <span style="color: #d7ac4b; font-size: 14px;">Add To Cart</span>
                        </button>
                    </form>
                    </div>
                     <!-- Mine Method (done) -->
                     <div class="col-6" style="padding: 0px 0px; height: 50px;">
                    <form action="{{ route('order.mine', ['productId' => $product->id]) }}" method="POST" style="margin: 0;">
                        @csrf
                            <button type="submit"
                                class="btn btn-primary"
                                style="font-size: 12px; padding: 5px 10px; width: 90%; height: 50px; background: #d7ac4b; border-style: none; border-radius: 3px;">
                                <span style="color: var(--bs-light); font-size: 14px; text-decoration: none;">Buy Now</span>
                            </button>
                        </form>
                    </div>               
                </div>
            </div>
        </div>
    </div>
    <section id="banner">
        <div></div>
    </section>
    <section id="product-detailSec">
        <div class="product-detailsSec">
            <div class="container p-4 p-md-5" style="background: #ffffff;border-bottom: 1px none rgba(108,117,125,0.21);font-family: 'Open Sans', sans-serif;">
                <section>
                    <h2 style="font-size:18px;">Product Specifications</h2>
                    <div>
                        <div>
                            <div class="d-flex spec1">
                                <h3 style="font-size: 14px;color: var(--bs-gray);">Category&nbsp;</h3>
                                <div>
                                    <h3 style="font-size:14px;">{{ $product->category->name }} &gt; {{ $product->subcategory->name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex spec1">
                                <h3 style="font-size: 14px;color: var(--bs-gray);">Color</h3>
                                <div>
                                    <h3 style="font-size:14px;">{{$product->color }}</h3>
                                </div>
                            </div>
                        </div>
                        <div></div>
                        <div>
                            <div class="d-flex spec1">
                                <h3 style="font-size: 14px;color: var(--bs-gray);">Stocks</h3>
                                <div>
                                    <h3 class="text-success" style="font-size:14px;">Only 1 available</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex spec1">
                                <h3 style="font-size: 14px;color: var(--bs-gray);">Style</h3>
                                <div>
                                    <h3 style="font-size:14px;">{{ $product->style }}</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex spec1">
                                <h3 style="font-size: 14px;color: var(--bs-gray);">Condition</h3>
                                <div>
                                    <h3 style="font-size:14px;">{{ $product->condition }}</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex spec1">
                                <h3 style="font-size: 14px;color: var(--bs-gray);">Material</h3>
                                <div>
                                    <h3 style="font-size:14px;">{{ $product->material }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="container p-4 p-md-5 mt-3" style="background: #ffffff;font-family: 'Open Sans', sans-serif;">
                <section>
                    <h2 style="font-size:18px;">Product Description</h2>
                </section>
                <div>
                    <ul>
                        <li>{{ $product->description }}</li>
                   <!--     <li>Pwede sa tag-ulan, tag-araw, at kahit taghirap!</li>
                        <li>Walang kupas, pang-OOTD!</li>
                        <li>Authentic vintage feels, pang-classic look!</li>-->
                    </ul>
                </div>
            </div>
            <div class="container p-4 p-md-5 mt-3 mb-5" style="background: #ffffff;font-family: 'Open Sans', sans-serif;">
                <section>
                    <h2 style="font-size:18px;">Reviews</h2>
                </section>
                <div class="review-card mt-4 p-4" style="border-radius:8px;border:1px solid rgba(173,181,189,0.6);">
                    <div class="review-details">
                        <div class="d-flex align-items-xxl-center review-info gap-3"><img class="object-fit-cover review-profile" alt="woman standing near blue steel gate" style="border-radius:50%;border-bottom-width:6px;width:50px;height:50px;" src="{{asset('assets/img/photo-1517841905240-472988babdf9.jpg')}}">
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
                                <div class="d-flex customer-photos gap-2"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="{{asset('assets/img/photo-1606105954396-43576bb5a44d.jpg')}}" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="{{asset('assets/img/photo-1740564014446-f07ea2da269c.jpg')}}" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="{{asset('assets/img/photo-1529626455594-4ff0802cfb7e.jpg')}}" style="width:72px;height:72px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="review-pagination mt-3">
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
        </div>
    </section>
    
    <section id="all-products">
        <div class="new-arrival-heading" style="font-family: 'Open Sans', sans-serif;">
            <div class="container">
                <div class="row text-center text-md-start align-items-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <div>
                            <h4 style="font-weight: bold;">Similar Style</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-0 pt-0">
                <section class="photo-gallery py-4 mt-0 pt-4" style="padding: 50px 0px;">
                    <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                    @if($similarProducts->isEmpty())  
                        <p class="text-center text-muted">No similar style available.</p>
                    @else
                        <div class="row gx-2 gy-2 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 photos" data-bss-baguettebox="">
                        @foreach($similarProducts as $product)
                            <div class="col item">
                                <div class="card">
                                    <div class="card-body" style="padding: 10px;"><a class="text-decoration-none" href="{{ route('product.view', $product->id) }}"><img class="img-fluid object-fit-cover fixed-image" alt="gray and white adidas backpack"  src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100%" height="150px"></a>
                                        <h4 class="card-title" style="font-size:12px;margin-top:12px;margin-bottom:12px;">{{ $product->name }}</h4>
                                        <h3 style="font-size:16px;font-weight:bold;color:#d7ac4b;">₱<span id="price">{{ $product->price }}</span></h3>
                                    </div>
                                </div>
                            </div> @endforeach
                        </div> @endif
                    </div>
                </section>
                <nav>
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
        </div>
    </section>

    <!-- Success Modal -->
    <div id="addToCartMessage" class="modal fade custom-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: 100%;">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body custom-body">
                    <div class="success-message"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
            <circle class="checkmark-circle" cx="26" cy="26" r="16" fill="none"></circle>
            <path class="checkmark-check" fill="none" d="M16.1 28.2l7.1 5.1 10.7-12.8"></path>
        </svg>
                        <p class="success-text">Added to cart sucessfully!</p>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <!-- Already in Cart Modal -->
    <div id="alreadyInCartModal" class="modal fade custom-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: 100%;">
                <div class="modal-header">
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body custom-body">
                    <div class="success-message">
                        <p class="success-text">This item is already in your cart.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- will display the modals-->
    <script>
        window.addEventListener('load', function () {
            @if(session('cart_added'))
                new bootstrap.Modal(document.getElementById('addToCartMessage')).show();
            @endif

            @if(session('already_in_cart'))
                new bootstrap.Modal(document.getElementById('alreadyInCartModal')).show();
            @endif
        });
    </script>

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
    <div class="scrollTo-top"><button class="btn btn-primary scrollTop" id="scroll-top" type="button" style="background:#d7ac4b;border-style:none;"><i class="fas fa-chevron-up" style="color:var(--bs-light);"></i></button></div>
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