<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EcommerceFinalNaTalaga (Backup 1741367607420)</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">


</head>

<body style="background: #f5f5f5;">
    <div id="hero-top" style="font-family: Montserrat, sans-serif;font-size: 16px;overflow: visible;">
        <nav class="navbar navbar-expand-md sticky-top d-md-flex justify-content-md-end mt-0" style="border-bottom-right-radius: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;border-top-right-radius: 0;margin-top: 0px;margin-right: 0px;margin-left: 0px;background: #ede6d2;" data-bs-theme="light">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="color: var(--bs-gray-900);--bs-body-font-weight: normal;font-weight: bold;">Clobbercore by K</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-center justify-content-lg-end me-0 pe-0 ms-0" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="Homepage.html" style="color: var(--bs-gray-dark);font-size: 13px;">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="#categories" style="color: var(--bs-gray-dark);font-size: 13px;">COLLECTIONS</a></li>
                        <li class="nav-item"><a class="nav-link" href="ShoppingPage.html" style="color: var(--bs-gray-dark);font-size: 13px;">SHOP</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" style="font-size: 13px;">NOTIFICATIONS&nbsp;<span>(5)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="PlaceOrder.html" style="font-size: 13px;color: rgba(0, 0, 0, 0.65);">MY CART&nbsp;<span>(5)</span></a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="#" style="color: rgba(0,0,0,0.65);font-size: 13px;">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="UserProfile.html" style="color: var(--bs-gray-dark);font-size: 13px;font-weight: bold;"><i class="fa fa-user p-1"></i>&nbsp;username</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="search-bar-main" class="search-div m-3" style="font-family: 'Open Sans', sans-serif;">
            <div class="main-search" style="border: 0.8px solid rgba(33,37,41,0.3) ;"><i class="fa fa-search"></i><input type="text" placeholder="Search here..."><button class="btn" type="button">Go</button></div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row p-4 p-md-5" style="background: var(--bs-body-bg);font-family: 'Open Sans', sans-serif;">
            <div class="col-12 col-md-12 col-lg-5 mb-4 mt-4">
                <div class="productView-image"><img class="img-fluid w-100 pb-2" id="mainImage" alt="Product Image" src="{{ asset($product->image) }}">
                    <div class="small-img-group">
                        <div class="small-img-col"><img class="small-img" width="100%" src="{{ asset('assets/img/1.png') }}" onclick="changeMainImage(this)"></div>
                        <div class="small-img-col" onclick="changeMainImage(this)"><img class="small-img" width="100%" src="{{ asset('assets/img/5.png') }}"></div>
                        <div class="small-img-col" onclick="changeMainImage(this)"><img class="small-img" width="100%" src="{{ asset('assets/img/6.png') }}"></div>
                        <div class="small-img-col" onclick="changeMainImage(this)"><img class="small-img" width="100%" src="{{ asset('assets/img/7.png') }}"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 mb-4 mt-4">
                <p class="text-muted">Category:&nbsp;<a class="text-decoration-none" href="#"> {{ $product->category->name }}&gt; {{ $product->subcategory->name }}</a></p>
                <h3 class="mb-3">{{ $product->name }}</h3>
                <h2 class="fw-bold mb-3" style="font-weight:bold;">₱&nbsp;<span>{{ $product->price }}</span></h2>
                <ul class="list-unstyled mb-3">
                    <li>Color:&nbsp;<span>{{ $product->color }}</span></li>
                    <li>Size:&nbsp;<span>{{ $product->size }}</span></li>
                </ul>
                <p class="fw-bold text-success mt-3 mb-3">Only 1 piece available</p>
                
                <div class="row text-center d-flex justify-content-between buy-add-button mt-5">
                    <div class="col" style="padding:0px 0px;height:50px;">
                    
                    <!--Adding To Cart (done) -->
                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" data-product-id="{{ $product->id }}" type="submit" style="font-size:12px;padding:5px 10px;background:rgba(215,172,75,0.14);width:90%;height:50px;border-style:solid;border-color:#d7ac4b;"><a class="text-decoration-none" style="color:#d7ac4b;font-size:14px;">Add To Cart&nbsp;</a></button></div>
                    <div class="col-6" style="padding:0px 0px;height:50px;">
                    </form>
                  
                    <!-- Mine Method (done) -->
                    <form action="{{ route('order.mine', ['productId' => $product->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit" style="font-size:12px;padding:5px 10px;width:90%;height:50px;background:#d7ac4b;border-style:none;">
                        <span style="color:var(--bs-light);font-size:14px;">Mine</span>
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
                                    <h3 style="font-size:14px;"> {{ $product->category->name }} &gt; {{ $product->subcategory->name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex spec1">
                                <h3 style="font-size: 14px;color: var(--bs-gray);">Color</h3>
                                <div>
                                    <h3 style="font-size:14px;">{{ $product->color }}</h3>
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
                    <!--    <li>Pwede sa tag-ulan, tag-araw, at kahit taghirap!</li>
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
                        <div class="d-flex align-items-xxl-center review-info gap-3"><img class="object-fit-cover review-profile" alt="woman standing near blue steel gate" style="border-radius:50%;border-bottom-width:6px;width:50px;height:50px;" src="{{ asset('assets/img/photo-1517841905240-472988babdf9.jpg') }}">
                            <h6 class="username">Username</h6>
                        </div>
                        <div class="d-flex mt-3 date-time" style="font-size:smaller;color:rgba(108,117,125,0.76);">
                            <h6>2025-03-25&nbsp;</h6>
                            <h6>9:30</h6>
                        </div>
                        <div class="comment-card mt-3">
                            <div>
                                <p><span style="color:rgba(0, 0, 0, 0.87);">Matagal ko na ginagamit mga to. Will definitely buy again. Thank you seller at kay kuya na nag deliver. Well packed din yung mga item.</span></p>
                                <div class="d-flex customer-photos gap-2"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="{{ asset('assets/img/photo-1740564014446-f07ea2da269c.jpg') }}" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate"src="{{ asset('assets/img/photo-1517841905240-472988babdf9.jpg') }}" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1529626455594-4ff0802cfb7e.jpg" style="width:72px;height:72px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-card mt-4 p-4" style="border-radius:8px;border:1px solid rgba(173,181,189,0.6);">
                    <div class="review-details">
                        <div class="d-flex align-items-xxl-center review-info gap-3"><img class="object-fit-cover review-profile" alt="woman standing near blue steel gate" style="border-radius:50%;border-bottom-width:6px;width:50px;height:50px;" src="{{ asset('assets/img/photo-1740564014446-f07ea2da269c.jpg') }}">
                            <h6 class="username">Username</h6>
                        </div>
                        <div class="d-flex mt-3 date-time" style="font-size:smaller;color:rgba(108,117,125,0.76);">
                            <h6>2025-03-25&nbsp;</h6>
                            <h6>9:30</h6>
                        </div>
                        <div class="comment-card mt-3">
                            <div>
                                <p><span style="color:rgba(0, 0, 0, 0.87);">Matagal ko na ginagamit mga to. Will definitely buy again. Thank you seller at kay kuya na nag deliver. Well packed din yung mga item.</span></p>
                                <div class="d-flex customer-photos gap-2"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1517841905240-472988babdf9.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1492562080023-ab3db95bfbce.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1529626455594-4ff0802cfb7e.jpg" style="width:72px;height:72px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-card mt-4 p-4" style="border-radius:8px;border:1px solid rgba(173,181,189,0.6);">
                    <div class="review-details">
                        <div class="d-flex align-items-xxl-center review-info gap-3"><img class="object-fit-cover review-profile" alt="woman standing near blue steel gate" style="border-radius:50%;border-bottom-width:6px;width:50px;height:50px;" src="assets/img/photo-1517841905240-472988babdf9.jpg">
                            <h6 class="username">Username</h6>
                        </div>
                        <div class="d-flex mt-3 date-time" style="font-size:smaller;color:rgba(108,117,125,0.76);">
                            <h6>2025-03-25&nbsp;</h6>
                            <h6>9:30</h6>
                        </div>
                        <div class="comment-card mt-3">
                            <div>
                                <p><span style="color:rgba(0, 0, 0, 0.87);">Matagal ko na ginagamit mga to. Will definitely buy again. Thank you seller at kay kuya na nag deliver. Well packed din yung mga item.</span></p>
                                <div class="d-flex customer-photos gap-2"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1517841905240-472988babdf9.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1492562080023-ab3db95bfbce.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1529626455594-4ff0802cfb7e.jpg" style="width:72px;height:72px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-card mt-4 p-4" style="border-radius:8px;border:1px solid rgba(173,181,189,0.6);">
                    <div class="review-details">
                        <div class="d-flex align-items-xxl-center review-info gap-3"><img class="object-fit-cover review-profile" alt="woman standing near blue steel gate" style="border-radius:50%;border-bottom-width:6px;width:50px;height:50px;" src="assets/img/photo-1517841905240-472988babdf9.jpg">
                            <h6 class="username">Username</h6>
                        </div>
                        <div class="d-flex mt-3 date-time" style="font-size:smaller;color:rgba(108,117,125,0.76);">
                            <h6>2025-03-25&nbsp;</h6>
                            <h6>9:30</h6>
                        </div>
                        <div class="comment-card mt-3">
                            <div>
                                <p><span style="color:rgba(0, 0, 0, 0.87);">Matagal ko na ginagamit mga to. Will definitely buy again. Thank you seller at kay kuya na nag deliver. Well packed din yung mga item.</span></p>
                                <div class="d-flex customer-photos gap-2"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1517841905240-472988babdf9.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1492562080023-ab3db95bfbce.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1529626455594-4ff0802cfb7e.jpg" style="width:72px;height:72px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-card mt-4 p-4" style="border-radius:8px;border:1px solid rgba(173,181,189,0.6);">
                    <div class="review-details">
                        <div class="d-flex align-items-xxl-center review-info gap-3"><img class="object-fit-cover review-profile" alt="woman standing near blue steel gate" style="border-radius:50%;border-bottom-width:6px;width:50px;height:50px;" src="assets/img/photo-1517841905240-472988babdf9.jpg">
                            <h6 class="username">Username</h6>
                        </div>
                        <div class="d-flex mt-3 date-time" style="font-size:smaller;color:rgba(108,117,125,0.76);">
                            <h6>2025-03-25&nbsp;</h6>
                            <h6>9:30</h6>
                        </div>
                        <div class="comment-card mt-3">
                            <div>
                                <p><span style="color:rgba(0, 0, 0, 0.87);">Matagal ko na ginagamit mga to. Will definitely buy again. Thank you seller at kay kuya na nag deliver. Well packed din yung mga item.</span></p>
                                <div class="d-flex customer-photos gap-2"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1517841905240-472988babdf9.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1492562080023-ab3db95bfbce.jpg" style="width:72px;height:72px;"><img class="object-fit-cover" alt="woman standing near blue steel gate" src="assets/img/photo-1529626455594-4ff0802cfb7e.jpg" style="width:72px;height:72px;"></div>
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
            <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding: 50px 0px;">
                <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                    @if($similarProducts->isEmpty())  
                        <p class="text-center text-muted">No similar style available.</p>
                    @else
                        <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                            @foreach($similarProducts as $product)
                                <div class="col item">
                                    <div class="card">
                                        <div class="card-body">
                                            <img class="img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                            <h4 class="card-title" style="font-size:16px;margin-top:12px;margin-bottom:12px;">{{ $product->name }}</h4>
                                            <h3 style="font-size:18px;font-weight:bold;color:#d7ac4b;">₱&nbsp;<span id="price">{{ $product->price }}</span></h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        </div>
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
    <section id="footer">
        <div>
            <footer style="background: #ede6d2;">
                <div class="container py-4 py-lg-5">
                    <div class="row justify-content-between">
                        <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="font-family: 'Open Sans', sans-serif;">
                            <h3 class="fs-6">Services</h3>
                            <ul class="list-unstyled">
                                <li><a class="text-decoration-none link-secondary" href="#services" style="color: rgb(108, 117, 125);">Curated Thrift Selection</a></li>
                                <li><a class="text-decoration-none link-secondary" href="#services">Meet-Up &amp; Local Shipping (Sorsogon only)</a></li>
                                <li><a class="text-decoration-none link-secondary" href="#services">Custumer Support</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item" style="font-family: 'Open Sans', sans-serif;">
                            <h3 class="fs-6">About Us</h3>
                            <ul class="list-unstyled">
                                <li><a class="text-decoration-none link-secondary" href="#aboutus">Our Mission</a></li>
                                <li><a class="text-decoration-none link-secondary" href="#aboutus">What We Offer</a></li>
                                <li><a class="text-decoration-none link-secondary" href="#aboutus">Why Choose Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social" style="font-family: 'Open Sans', sans-serif;">
                            <div class="fw-bold d-flex align-items-center mb-2"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"></path>
                                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                                    </svg></span><span>Clobbercore by K</span></div>
                            <p class="text-muted copyright">Sustainable Styles, Affordable Finds.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center pt-3">
                        <footer class="text-center" style="width: 1329px;">
                            <div class="container text-muted py-4 py-lg-5">
                                <ul class="list-inline">
                                    <li class="list-inline-item me-4"></li>
                                    <li class="list-inline-item me-4"><a class="text-decoration-none link-secondary">Visit and follow us on:</a></li>
                                    <li class="list-inline-item"></li>
                                </ul>
                                <ul class="list-inline">
                                    <li class="list-inline-item me-4"><a href="#"><i class="fa fa-facebook-square" style="width: 16px;color: rgba(33,37,41,0.75);"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" style="width: 16px;color: rgba(33,37,41,0.75);"></i></a></li>
                                </ul>
                                <p class="mb-0">© 2024 Clobbercore By K. All right reserved. Clobbercore By K, Sorsogon, Philippines. For&nbsp;inquiries, request our business details via email or message us on Facebook.</p>
                            </div>
                        </footer>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <div class="scrollTo-top"><button class="btn btn-primary scrollTop" id="scroll-top" type="button" style="background: #d7ac4b;border-style: none;"><i class="fa fa-chevron-up" style="color: var(--bs-light);"></i></button></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/my-profileJS.js"></script>
    <script src="assets/js/my-purchaseTab.js"></script>
    <script src="assets/js/tabfunction.js"></script>


    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".add-to-cart").forEach(button => {
        button.addEventListener("click", function () {
            let productId = this.getAttribute("data-product-id");

            fetch(`/cart/add/${productId}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                loadCartItems(); // Reload cart after adding
            })
            .catch(error => console.error("Error:", error));
        });
    });
});

// Function to load cart items dynamically
function loadCartItems() {
    fetch("/cart")
        .then(response => response.json())
        .then(data => {
            let cartBody = document.getElementById("cart-items");
            cartBody.innerHTML = ""; // Clear existing cart items
            
            let totalPrice = 0;
            data.cartItems.forEach(item => {
                totalPrice += parseFloat(item.price);
                cartBody.innerHTML += `
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>${item.product.name}</td>
                        <td>₱${item.price}</td>
                        <td>1</td>
                        <td>
                            <button class="btn btn-danger remove-from-cart" data-cart-id="${item.id}">Remove</button>
                        </td>
                    </tr>
                `;
            });

            document.getElementById("total-price").innerText = `₱${totalPrice}`;
        });
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    loadCartItems();
});
</script>


</body>

</html>