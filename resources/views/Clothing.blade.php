<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ecommerce-Client-Side</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/LoginStyle.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/test.css">
</head>

<body style="background: #f5f5f5;">
    <div id="hero-top" style="font-family: Montserrat, sans-serif;font-size: 16px;overflow: visible;">
        <nav class="navbar navbar-expand-md fixed-top d-md-flex justify-content-md-end mt-0" style="border-bottom-right-radius: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;border-top-right-radius: 0;margin-top: 0px;margin-right: 0px;margin-left: 0px;background: #ede6d2;" data-bs-theme="light">
            <div class="container-fluid main-nav-header" style="margin:8px;"><a class="navbar-brand d-flex justify-content-center align-items-center" href="#" style="color: var(--bs-gray-900);--bs-body-font-weight: normal;font-weight: bold;font-size: 25px;height: 60px;margin-right: 16px;"><img class="logo-2" src="assets/img/logo-2.svg">
                    <div class="main-nav-title">
                        <h1 class="d-flex justify-content-center align-items-center" style="font-weight:bold;font-family:'Open Sans', sans-serif;">CLOBBER<span>CORE&nbsp;</span><span class="by-k" style="font-family: 'Alex Brush', serif;">by K</span></h1>
                    </div>
                </a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-center justify-content-lg-end me-0 pe-0 ms-0" id="navcol-2">
                    <ul class="navbar-nav" style="border-top-style: none;">
                        <li class="nav-item"><a class="nav-link" href="{{ route('ShoppingPage') }}" style="color:var(--bs-gray-dark);font-size:13px;">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('Clothing') }}"style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('PrivacyPolicy') }}"style="color:var(--bs-gray-dark);font-size:13px;">MORE</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('cart.view') }}"  style="font-size:13px;padding-right:20px;">
                                <div class="notification-nav" id="notif-5"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 4H19C19.5523 4 20 4.44771 20 5V19C20 19.5523 19.5523 20 19 20H5C4.44772 20 4 19.5523 4 19V5C4 4.44772 4.44771 4 5 4ZM2 5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V5ZM12 12C9.23858 12 7 9.31371 7 6H9C9 8.56606 10.6691 10 12 10C13.3309 10 15 8.56606 15 6H17C17 9.31371 14.7614 12 12 12Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" style="background:rgba(108,117,125,0.6);">{{ $cartCount }}</span>
                                    <div class="notif-box" id="notif-content-3">
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
                                <div class="notification-nav" id="notif-7"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor" fill-rule="evenodd"></path><path d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor" fill-rule="evenodd"></path></svg></div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="search-bar-main" class="search-div m-3" style="font-family: 'Open Sans', sans-serif;">
            <div class="main-search" style="border: 0.8px solid rgba(33,37,41,0.3) ;"><i class="fa fa-search"></i><input type="text" placeholder="Search here..."><button class="btn" type="button">Go</button></div>
        </div>
    </div>
    <section id="main-clothingSec">
        <div id="thankYouMessage" class="hidden-confirmation-message" style="font-family: 'Open Sans', sans-serif;">
            <div class="d-flex justify-content-center align-items-center" style="flex-direction:column;text-align:center;margin:40px auto;"><svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" viewBox="0 0 24 24" fill="none" color="#d7ac4b">
            <path fill-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor"></path>
        </svg>
                <h4 class="p-3" style="color: var(--bs-dark);font-weight: bold;">Thank you for your order!</h4>
                <p class="p-2" style="color:var(--bs-secondary);">We are currently processing your order and we will send a confirmation notification shortly.</p>
                <div class="d-flex align-items-center gap-2 p-2">
                    <p class="m-0" style="color:var(--bs-secondary);">Please keep an eye on your <strong>Notification Inbox </strong>for updates. If you have questions or need assistance, feel free to reach out — we're here to help!</p>
                </div>
                <div><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24" fill="none" color="#d7ac4b">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00977 5.83789C3.00977 5.28561 3.45748 4.83789 4.00977 4.83789H20C20.5523 4.83789 21 5.28561 21 5.83789V17.1621C21 18.2667 20.1046 19.1621 19 19.1621H5C3.89543 19.1621 3 18.2667 3 17.1621V6.16211C3 6.11449 3.00333 6.06765 3.00977 6.0218V5.83789ZM5 8.06165V17.1621H19V8.06199L14.1215 12.9405C12.9499 14.1121 11.0504 14.1121 9.87885 12.9405L5 8.06165ZM6.57232 6.80554H17.428L12.7073 11.5263C12.3168 11.9168 11.6836 11.9168 11.2931 11.5263L6.57232 6.80554Z" fill="currentColor"></path>
</svg>
                    <p class="m-0 p-2" style="color:var(--bs-secondary);">Thank you for shopping with us!</p>
                </div>
                <p class="p-2" style="color:var(--bs-secondary);">We appreciate your trust in&nbsp;<span style="font-weight:bold;color:var(--bs-dark);">Clobbercore by K</span>.</p><a class="btn btn-primary" role="button" style="border-radius: 2px;background: rgba(215,172,75,0.5);border-style: none;color: var(--bs-dark);font-size: 14px;padding: 8px 16px;" href="{{ route('ShoppingPage') }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                        <path d="M20.3284 11.0001V13.0001L7.50011 13.0001L10.7426 16.2426L9.32842 17.6568L3.67157 12L9.32842 6.34314L10.7426 7.75735L7.49988 11.0001L20.3284 11.0001Z" fill="currentColor"></path>
                    </svg>&nbsp;Back to Home</a>
            </div>
        </div>

        <div class="main-page">
            <div class="container p-4">
                <ul class="nav nav-tabs" id="ukayTabs" style="background: var(--bs-white);">
                    <li class="nav-item"><a class="nav-link active" data-category="new-arrival" href="#" style="border-radius: 0px;border-style: none;">New Arrival</a></li>
                    <li class="nav-item"><a class="nav-link" data-category="bagsak-presyo" href="#" style="border-radius: 0px;border-style: none;">Bagsak Presyo</a></li>
                    <li class="nav-item"><a class="nav-link" data-category="all-out-ukay" href="#" style="border-radius: 0px;border-style: none;">All-Out Ukay</a></li>
                </ul>   
               
               <!--Display Products-->
                <div class="product-container new-arrival show">
                    <div class="filter-section mt-3"><select class="form-select" id="filterCategory-new">
                        <optgroup label="Select Category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </optgroup>
                    </select><select class="form-select" id="filterSize-new">
                        <optgroup label="Select Size">
                            <option value="">Select Size</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size }}">{{ ucfirst($size) }}</option>
                            @endforeach
                        </optgroup>
                    </select><select class="form-select" id="filterColor-new">
                        <optgroup label="Select Color">
                            <option value="">Select Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <div class="d-flex price-range col-md-4 col-12 gap-2 col-lg-2">
                        <input type="number" class="form-control" min="0" id="minPrice-new" placeholder="Min">
                        <input type="number" class="form-control" min="0"  id="maxPrice-new" placeholder="Max">
                    </div>
                    <button class="btn btn-primary" id="applyFilters-new" type="button" style="background: #d7ac4b;border: 1px solid #d7ac4b;padding: 9px 14px;color: var(--bs-light);">Apply Filters</button>
                </div>
                    
                
                <section id="new-arrival" class="photo-gallery py-4 mt-0 pt-4" style="padding: 50px 0px;">
                        <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                            <div class="row gx-2 gy-2 row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5 photos" data-bss-baguettebox="">
                            @if ($newArrivals->isEmpty())
                                <p>No new arrivals found.</p>
                            @else
                            @foreach ($newArrivals as $product)
                            <div class="col item">
                                    <div class="card" style="height: 280px;">
                                        <div class="card-body"><a href="{{ route('product.view', $product->id) }}"><img class="img-fluid fixed-image" src="{{ asset($product->image) }}"></a>
                                            <h4 class="card-title" style="font-size:14px;margin-top:12px;">{{$product->name }}</h4>
                                            <div class="d-flex justify-content-between all-out-ukay-price">
                                                <p style="font-size:16px;font-weight:bold;color:#d7ac4b;">₱{{$product->price }}</p>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
               
                <div class="product-container bagsak-presyo">
                 <div class="filter-section mt-3"><select class="form-select" id="filterCategory-bagsak">
                        <optgroup label="Select Category">
                            <option value="">Select Category</option>
                            @foreach ($categories1 as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </optgroup>
                    </select><select class="form-select" id="filterSize-bagsak">
                        <optgroup label="Select Size">
                            <option value="">Select Size</option>
                            @foreach ($sizes1 as $size)
                                <option value="{{ $size }}">{{ ucfirst($size) }}</option>
                            @endforeach
                        </optgroup>
                    </select><select class="form-select" id="filterColor-bagsak">
                        <optgroup label="Select Color">
                            <option value="">Select Color</option>
                            @foreach ($colors1 as $color)
                                <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                        <div class="d-flex price-range col-md-4 col-12 gap-2 col-lg-2">
                            <input type="number" class="form-control" min="0" id="minPrice-bagsak" placeholder="Min">
                            <input type="number" class="form-control" min="0"  id="maxPrice-bagsak" placeholder="Max">
                        </div>
                        <button class="btn btn-primary" id="applyFilters-bagsak" type="button" style="background: #d7ac4b;border: 1px solid #d7ac4b;padding: 9px 14px;color: var(--bs-light);">Apply Filters</button>
                    </div>
                    
                
                <section id="bagsak-presyo" class="photo-gallery py-4 mt-0 pt-4" style="padding: 50px 0px;">
                        <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                            <div class="row gx-2 gy-2 row-cols-2 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                            @if ($thriftDeals->isEmpty())
                                <p>No thrift deals found.</p>
                            @else
                            @foreach ($thriftDeals as $product)
                                <div class="col item">
                                    <div class="card" style="height: 280px;">
                                        <div class="card-body"><a href="{{ route('product.view', $product->id) }}"><img class="img-fluid fixed-image" src="{{ asset($product->image) }}"></a>
                                            <h4 class="card-title" style="font-size:14px;margin-top:12px;">{{$product->name }}</h4>
                                            <div class="d-flex justify-content-between all-out-ukay-price">
                                                <p style="font-size:16px;font-weight:bold;color:#d7ac4b;">₱{{$product->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
                <div class="product-container all-out-ukay">
                <div class="filter-section mt-3"><select class="form-select" id="filterCategory-all">
                        <optgroup label="Select Category">
                            <option value="">Select Category</option>
                            @foreach ($categories2 as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </optgroup>
                    </select><select class="form-select" id="filterSize-all">
                        <optgroup label="Select Size">
                            <option value="">Select Size</option>
                            @foreach ($sizes2 as $size)
                                <option value="{{ $size }}">{{ ucfirst($size) }}</option>
                            @endforeach
                        </optgroup>
                    </select><select class="form-select" id="filterColor-all">
                        <optgroup label="Select Color">
                            <option value="">Select Color</option>
                            @foreach ($colors2 as $color)
                                <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <div class="d-flex price-range col-md-4 col-12 gap-2 col-lg-2">
                        <input type="number" class="form-control" min="0" id="minPrice-all" placeholder="Min">
                        <input type="number" class="form-control" min="0"  id="maxPrice-all" placeholder="Max">
                    </div>
                    <button class="btn btn-primary" id="applyFilters-all" type="button" style="background: #d7ac4b;border: 1px solid #d7ac4b;padding: 9px 14px;color: var(--bs-light);">Apply Filters</button>
                </div>


                    <section id="all-products" class="photo-gallery py-4 mt-0 pt-4" style="padding: 50px 0px;">
                        <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                            <div class="row gx-2 gy-2 row-cols-2 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                            @if ($allProducts->isEmpty())
                            <p>No products found.</p>
                            @else
                            @foreach ($allProducts as $product)
                            <div class="col item">
                                    <div class="card" style="height: 280px;">
                                        <div class="card-body"><a href="{{ route('product.view', $product->id) }}"><img class="img-fluid fixed-image" src="{{ asset($product->image) }}"></a>
                                            <h4 class="card-title" style="font-size:14px;margin-top:12px;">{{$product->name }}</h4>
                                            <div class="d-flex justify-content-between all-out-ukay-price">
                                                <p style="font-size:16px;font-weight:bold;color:#d7ac4b;">₱{{$product->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    @if(session('order_success'))
        <script>
            function placeOrder() {
                localStorage.setItem('orderPlaced', 'true');
                console.log("Order placed flag set in localStorage.");
            }

            // Call placeOrder only if the order_success message exists
            placeOrder();
        </script>
    @endif

    

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
    <div class="scrollTo-top"><button class="btn btn-primary scrollTop" id="scroll-top" type="button" style="background: #d7ac4b;border-style: none;"><i class="fa fa-chevron-up" style="color: var(--bs-light);"></i></button></div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/emojiJs.js"></script>
    <script src="assets/js/chatbox.js"></script>
    <script src="assets/js/forgotpass.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/hover-notif.js"></script>
    <script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="assets/js/Lightbox-Gallery.js"></script>
    <script src="assets/js/my-profileJS.js"></script>
    <script src="assets/js/my-purchaseTab.js"></script>
    <script src="assets/js/scrolltotop.js"></script>
    <script src="assets/js/steps.js"></script>
    <script src="assets/js/tabDelivery.js"></script>
    <script src="assets/js/tabfunction.js"></script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    let currentCategory = 'new-arrival'; // default active tab

    // When clicking tabs (New Arrival, Bagsak Presyo, etc.)
    document.querySelectorAll('#ukayTabs .nav-link').forEach(function(tab) {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('#ukayTabs .nav-link').forEach(function(t) {
                t.classList.remove('active');
            });
            this.classList.add('active');

            currentCategory = this.getAttribute('data-category');

            document.querySelectorAll('.product-container').forEach(function(container) {
                container.classList.remove('show');
            });

            if (currentCategory === 'new-arrival') {
                document.querySelector('.new-arrival').classList.add('show');
            } else if (currentCategory === 'bagsak-presyo') {
                document.querySelector('.bagsak-presyo').classList.add('show');
            } else if (currentCategory === 'all-out-ukay') {
                document.querySelector('.all-out-ukay').classList.add('show');
            }
        });
    });

    // For each Apply Filters button
    document.getElementById('applyFilters-new').addEventListener('click', function() {
        applyFilters('new-arrival', 'new');
    });

    document.getElementById('applyFilters-bagsak').addEventListener('click', function() {
        applyFilters('bagsak-presyo', 'bagsak');
    });

    document.getElementById('applyFilters-all').addEventListener('click', function() {
        applyFilters('all-out-ukay', 'all');
    });

    function applyFilters(categorySlug, suffix) {
    const size = document.getElementById(`filterSize-${suffix}`).value;
    const color = document.getElementById(`filterColor-${suffix}`).value;
    const categoryFilter = document.getElementById(`filterCategory-${suffix}`).value; // Get category filter
    const minPrice = document.getElementById(`minPrice-${suffix}`).value; // Ensure unique IDs for price inputs
    const maxPrice = document.getElementById(`maxPrice-${suffix}`).value;

    // Validate minPrice and maxPrice
    if (!isNaN(minPrice) && !isNaN(maxPrice) && parseFloat(maxPrice) < parseFloat(minPrice)) {
        alert('Maximum price must be greater than or equal to minimum price.');
        return;
    }

    fetch(`/clothing/filter?category=${categorySlug}&size=${size}&color=${color}&min_price=${minPrice}&max_price=${maxPrice}&category_filter=${categoryFilter}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let containerSelector = '';
            if (categorySlug === 'new-arrival') {
                containerSelector = '.new-arrival .photos';
            } else if (categorySlug === 'bagsak-presyo') {
                containerSelector = '.bagsak-presyo .photos';
            } else if (categorySlug === 'all-out-ukay') {
                containerSelector = '.all-out-ukay .photos';
            }

            const container = document.querySelector(containerSelector);
            container.innerHTML = ''; // Clear existing products

            if (data.products.length === 0) {
                container.innerHTML = '<p>No products found.</p>';
            } else {
                data.products.forEach(function(product) {
                    container.innerHTML += `
                        <div class="col item">
                            <div class="card" style="height: 280px;">
                                <div class="card-body">
                                    <a href="/product/${product.id}">
                                        <img class="img-fluid fixed-image" src="/${product.image}">
                                    </a>
                                    <h4 class="card-title" style="font-size:14px;margin-top:12px;">${product.name}</h4>
                                    <div class="d-flex justify-content-between all-out-ukay-price">
                                        <p style="font-size:16px;font-weight:bold;color:#d7ac4b;">₱${product.price}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
            }

            // Reset form inputs after applying filters
            document.getElementById(`filterSize-${suffix}`).value = '';
            document.getElementById(`filterColor-${suffix}`).value = '';
            document.getElementById(`filterCategory-${suffix}`).value = '';
            document.getElementById(`minPrice-${suffix}`).value = '';
            document.getElementById(`maxPrice-${suffix}`).value = '';
        }
    })
    .catch(error => {
        console.error('Error fetching filtered products:', error);
    });
}

});

</script>

            
</body>

</html>