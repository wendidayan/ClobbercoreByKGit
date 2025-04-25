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

<body class="d-flex flex-column" style="font-family: 'Open Sans', sans-serif;">
    <div class="sidebar hidden">
        <div class="logo mt-4">
            <h2><strong><span style="color: rgb(212, 124, 8);">Clobber</span>core by K</strong></h2>
            <ul class="nav-links mt-5" style="padding-left: 0px;">
                <li><a class="nav-link active" href="#" data-section="dashboard"><i class="fa fa-th-large p-2"></i>Dashboard</a></li>
                <li><a class="nav-link" href="#" data-section="new-arrival-sec"><i class="fa fa-star p-2"></i>New Arrivals</a></li>
                <li><a class="nav-link" href="#" data-section="bagsak-presyo-sec"><i class="fa fa-heart p-2"></i>Bagsak-Presyo</a></li>
                <li><a class="nav-link" href="#" data-section="all-out-sec"><i class="fa fa-th p-2"></i>All-Out Ukay</a></li>
                <li><a class="nav-link" href="#" data-section="orders"><i class="fa fa-shopping-cart p-2"></i>Orders</a></li>
                <li><a class="nav-link" href="#" data-section="paymentHistory"><i class="fa fa-credit-card-alt p-2"></i>Payment History</a></li>
                <li><a class="nav-link" href="#" data-section="my-account"><i class="fa fa-user p-2"></i>Account</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa fa-power-off p-2"></i>Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content full-width">
        <header class="heading-top"><button class="btn" id="menu-toggle" type="button" style="color:#d7ac4b;"><i class="fa fa-bars"></i></button>
            <div style="display: flex; align-items: center; margin-left: auto;">
                <div id="message-icon" class="message-icon" style="cursor: pointer;"><i class="fa fa-envelope"></i><span class="message-count">5</span></div>
            </div>
            <div class="search-bar" style="border: 0.8px solid #d7ac4b;"><i class="fa fa-search" style="color: #d7ac4b;"></i><input type="text" placeholder="Search here.."><button class="btn" type="button" style="color: var(--bs-secondary);">Go</button></div>
        </header>
        <section id="dashboard" class="dashboard-section active-section pt-3" style="padding: 0px;">
            <div>
                <h3 class="mb-2" style="font-size: 18px;">Dashboard</h3>
            </div>
            <div class="datetime"><span id="current-date"></span><span id="current-time" class="ps-1"></span></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card dashboard-card p-4" style="border-style: solid;border-color: #d7ac4b;background: rgba(215,172,75,0.14);box-shadow: 2px 5px 5px 0px rgba(0,0,0,0.1);">
                        <h3 style="font-weight: bold;">35</h3>
                        <h5 style="font-size: 12px;color: var(--bs-secondary);">Total Website Views</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-4" style="border-style: solid;border-color: #d7ac4b;background: rgba(215,172,75,0.3);box-shadow: 2px 5px 5px 0px rgba(0,0,0,0.1);">
                        <h3 style="font-weight: bold;">₱&nbsp;<span>5, 500</span></h3>
                        <h5 style="font-size: 12px;color: var(--bs-secondary);">Total Earnings</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-4" style="border-color: #d7ac4b;background: rgba(215,172,75,0.4);box-shadow: 2px 5px 5px rgba(0,0,0,0.1);">
                        <h3 style="font-weight: bold;">65</h3>
                        <h5 style="font-size: 12px;color: var(--bs-secondary);">Total Orders</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-4" style="border-color: #d7ac4b;background: rgba(215,172,75,0.6);box-shadow: 2px 5px 5px rgba(0,0,0,0.1);">
                        <h3 style="font-weight: bold;">45</h3>
                        <h5 style="font-size: 12px;color: var(--bs-secondary);">Total Users</h5>
                    </div>
                </div>
            </div>
            <div class="mb-3 p-3" style="background: var(--bs-light);box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);border-radius: 10px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-2 gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 8H19V20H5V10H9V4H15V8ZM13 6H11V18H13V6ZM15 10V18H17V10H15ZM9 12V18H7V12H9Z" fill="currentColor"></path>
                                </svg>
                                <h4 class="m-0" style="font-size: 16px;color: var(--bs-gray-dark);">Monthly Revenue</h4>
                            </div>
                            <div><canvas data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;January&quot;,&quot;February&quot;,&quot;March&quot;,&quot;April&quot;,&quot;May&quot;,&quot;June&quot;,&quot;July&quot;,&quot;August&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;rgba(215,172,75,0.5)&quot;,&quot;borderColor&quot;:&quot;&quot;,&quot;data&quot;:[&quot;4500&quot;,&quot;5300&quot;,&quot;6250&quot;,&quot;7800&quot;,&quot;9800&quot;,&quot;15000&quot;,&quot;4500&quot;,&quot;5000&quot;,&quot;&quot;]},{&quot;label&quot;:&quot;&quot;,&quot;data&quot;:[]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;bold&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;ticks&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}],&quot;yAxes&quot;:[{&quot;ticks&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}]}}}"></canvas></div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center gap-2 p-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.775 8C22.9242 8.65461 23 9.32542 23 10H14V1C14.6746 1 15.3454 1.07584 16 1.22504C16.4923 1.33724 16.9754 1.49094 17.4442 1.68508C18.5361 2.13738 19.5282 2.80031 20.364 3.63604C21.1997 4.47177 21.8626 5.46392 22.3149 6.55585C22.5091 7.02455 22.6628 7.5077 22.775 8ZM20.7082 8C20.6397 7.77018 20.5593 7.54361 20.4672 7.32122C20.1154 6.47194 19.5998 5.70026 18.9497 5.05025C18.2997 4.40024 17.5281 3.88463 16.6788 3.53284C16.4564 3.44073 16.2298 3.36031 16 3.2918V8H20.7082Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 14C1 9.02944 5.02944 5 10 5C10.6746 5 11.3454 5.07584 12 5.22504V12H18.775C18.9242 12.6546 19 13.3254 19 14C19 18.9706 14.9706 23 10 23C5.02944 23 1 18.9706 1 14ZM16.8035 14H10V7.19648C6.24252 7.19648 3.19648 10.2425 3.19648 14C3.19648 17.7575 6.24252 20.8035 10 20.8035C13.7575 20.8035 16.8035 17.7575 16.8035 14Z" fill="currentColor"></path>
                                </svg>
                                <h4 class="m-0" style="font-size: 16px;color: var(--bs-gray-dark);">Ukay-Ukay Sales Breakdown by Category</h4>
                            </div>
                            <div><canvas data-bss-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Men's Shirt&quot;,&quot;Women's Shirt&quot;,&quot;Kidswear&quot;,&quot;Women's denim short&quot;,&quot;Women's Denim Pants&quot;,&quot;Maxi Dress&quot;,&quot;Women top&quot;,&quot;Casual Dress&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:[&quot;#d7ac4b&quot;,&quot;#7fbcaa&quot;,&quot;#076d54&quot;,&quot;rgb(94,153,170)&quot;,&quot;rgb(150,170,153)&quot;,&quot;#7796b2&quot;,&quot;rgb(0,107,119)&quot;,&quot;rgb(221,204,107)&quot;,&quot;#d7ac4b&quot;],&quot;borderColor&quot;:[&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;],&quot;data&quot;:[&quot;4500&quot;,&quot;5300&quot;,&quot;6250&quot;,&quot;7800&quot;,&quot;9800&quot;,&quot;15000&quot;,&quot;1000&quot;,&quot;2000&quot;,&quot;&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;bold&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;,&quot;display&quot;:false}}}"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-2">
                <div class="shadow-sm recent-orders" style="border-radius: 10px; overflow: hidden; background-color: #fff;">
                    <div class="d-flex align-items-center gap-2" style="background-color: rgba(215,172,75,0.14); padding: 20px 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
            <path d="M13 7H7V5H13V7Z" fill="currentColor"></path>
            <path d="M13 11H7V9H13V11Z" fill="currentColor"></path>
            <path d="M7 15H13V13H7V15Z" fill="currentColor"></path>
            <path fill-rule="evenodd" d="M3 19V1H17V5H21V23H7V19H3ZM15 17V3H5V17H15ZM17 7V19H9V21H19V7H17Z" fill="currentColor"></path>
        </svg>
                        <h4 class="m-0" style="font-size:16px;">Recent Orders</h4>
                    </div>
                    <div class="m-3 recent-orders-wrapper" style="max-height:300px;overflow-y:auto; background-color: white; padding: 15px;">
                        <div class="order-item mb-2">
                            <div class="order-details">
                                <p class="mb-0" style="font-size:14px;">CustomerID:&nbsp;<span style="font-weight:bold;">123348</span></p>
                                <p class="mb-0" style="font-size:14px;">OrderID:&nbsp;<span style="font-weight:bold;">123348</span></p>
                                <div class="d-flex justify-content-end view-details-btn"><button class="btn" type="button" style="font-size: 14px;color: #d7ac4b;text-align: right;border-radius: 3px;" onclick="document.getElementById(&#39;invoiceModal&#39;).style.display=&#39;flex&#39;">View Details</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-sm notifications" style="border-radius: 10px; overflow: hidden; background-color: #fff;">
                    <div class="d-flex align-items-center gap-2" style="background-color: rgba(215,172,75,0.14); padding: 20px 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="width: 16px;height: 16px;">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3V3.28988C16.8915 4.15043 19 6.82898 19 10V17H20V19H4V17H5V10C5 6.82898 7.10851 4.15043 10 3.28988V3C10 1.89543 10.8954 1 12 1C13.1046 1 14 1.89543 14 3ZM7 17H17V10C17 7.23858 14.7614 5 12 5C9.23858 5 7 7.23858 7 10V17ZM14 21V20H10V21C10 22.1046 10.8954 23 12 23C13.1046 23 14 22.1046 14 21Z" fill="currentColor"></path>
                        </svg>
                        <h4 class="m-0" style="font-size:16px;">Notifications</h4>
                    </div>
                    <ul class="list-unstyled nav-tabs notif-tab" id="notificationTabs" style="border-bottom-style: none; padding: 15px;">
                        <li class="nav-item active" data-tab="all">All</li>
                        <li class="nav-item" data-tab="direct-message">Direct Message</li>
                        <li class="nav-item" data-tab="payment">Payment</li>
                        <li class="nav-item" data-tab="cancel-order">Cancelled Order</li>
                    </ul>
                    <div class="tab-content p-2" style="max-height: 300px; overflow-y: auto;">
                        <div id="all" class="tab-pane show active pb-3">
                            <div class="notification-item">
                                <p class="mb-0">New Message</p>
                            </div>
                            <div class="notification-item">
                                <p class="mb-0">Payment Received from OrderID:&nbsp;<span style="font-weight:bold;">UKAY1234</span></p>
                            </div>
                            <div class="notification-item">
                                <p class="mb-0">OrderID:&nbsp;<span style="font-weight:bold;">UKAY1234</span>&nbsp;cancelled their order.</p>
                            </div>
                            <div class="notification-item">
                                <p class="mb-0">CustomerID:&nbsp;<span style="font-weight:bold;">UKAY1234</span>&nbsp;placed an order.</p>
                            </div>
                        </div>
                        <div id="direct-message" class="tab-pane">
                            <div class="notification-item">
                                <p class="mb-0">New Message</p>
                            </div>
                        </div>
                        <div id="payment" class="tab-pane">
                            <div class="notification-item">
                                <p class="mb-0">Payment Received from OrderID:&nbsp;<span style="font-weight:bold;">UKAY1234</span></p>
                            </div>
                        </div>
                        <div id="cancel-order" class="tab-pane">
                            <div class="notification-item">
                                <p class="mb-0">OrderID:&nbsp;<span style="font-weight:bold;">UKAY1234</span>&nbsp;cancelled their order.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--FOR NEW Arrival -->
        <section id="new-arrival-sec" class="dashboard-section mt-2">
            <div class="d-flex justify-content-end add-product">
            <!--FOR Adding NEW Arrival -->
            <button class="btn" type="button" style="background:#d7ac4b;color:var(--bs-light);border-radius:3px;font-size:14px;" data-bs-toggle="modal" data-bs-target="#addprodModal"><i class="fa fa-plus" style="margin-right:10px;"></i>Add Product</button></div>
             <!--Filtering NEW Arrival -->
            <div class="filter-section mt-3"><select class="form-select" id="filterCategory-2">
                    <optgroup label="Select Category">
                        <option value="">Select Category</option>
                        <option value="women's shirt">Women's Shirt</option>
                        <option value="women's short">Women's Short</option>
                        <option value="kidwears">Kidswear</option>
                        <option value="dress">Dress</option>
                    </optgroup>
                </select><select class="form-select" id="filterSubcategory-1">
                    <optgroup label="Select Category">
                        <option value="">Select Category</option>
                        <option value="women's shirt">Women's Shirt</option>
                        <option value="women's short">Women's Short</option>
                        <option value="kidwears">Kidswear</option>
                        <option value="dress">Dress</option>
                    </optgroup>
                </select><select class="form-select" id="filterSize-1">
                    <optgroup label="Select Size">
                        <option value="">Select Size</option>
                        <option value="small">Small</option>
                        <option value="large">Large</option>
                        <option value="medium">Medium</option>
                    </optgroup>
                </select><select class="form-select" id="filterColor-1">
                    <optgroup label="Select Color">
                        <option value="">Select Color</option>
                        <option value="black">Black</option>
                        <option value="red">Red</option>
                        <option value="white">White</option>
                        <option value="blue">Blue</option>
                    </optgroup>
                </select><button class="btn btn-primary" id="applyFilters-1" type="button" style="background:var(--bs-white);border:1px solid #d7ac4b;">Apply Filters</button></div>
            <section id="new-arrival">
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
                        </div>
                    </div>
                    <!-- Display New Arrivals -->
                    <div class="container mt-0 pt-0">
                        <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding:50px 0px;">
                            <div class="container" style="font-family:'Open Sans', sans-serif;padding:0px;">
                            <div class="row gx-2 gy-2 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-5 photos" data-bss-baguettebox="">
                                @foreach ($newArrivals as $product)  
                                    <div class="col item">
                                        <div class="card card-prod" style="transition:transform 0.3s ease;">
                                            <div class="card-body">
                                                <i class="fa fa-pencil edit-pencil" data-bs-toggle="modal" data-bs-target="#editProduct"></i>
                                                <a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                    <img class="img-fluid" alt="gray and white adidas backpack" src="{{ asset($product->image) }}" style="width: 100%; height: 180px; object-fit: cover; border-radius: 3px;">
                                                </a>
                                                <h4 id="product-name" class="card-title mt-2 p-1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100%; display: block; font-size: 16.5px;">
                                                    {{ $product->name }}
                                                </h4>
                                                <p class="card-text p-1" style="font-weight: bold; color: #d7ac4b;">
                                                    ₱<span id="product-price-span">{{ $product->price }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>
        
        <!--For Thrift Deals -->
        <section id="bagsak-presyo-sec" class="dashboard-section mt-2">
            <!--Working on #addprodModal2 -->
            <div class="d-flex justify-content-end add-product"><button class="btn" type="button" style="background:#d7ac4b;color:var(--bs-light);border-radius:3px;font-size:14px;" data-bs-toggle="modal" data-bs-target="#addprodModal2"><i class="fa fa-plus" style="margin-right:10px;"></i>Add Product</button></div>
            <div class="filter-section mt-3"><select class="form-select" id="filterCategory-1">
                    <optgroup label="Select Category">
                        <option value="">Select Category</option>
                        <option value="women's shirt">Women's Shirt</option>
                        <option value="women's short">Women's Short</option>
                        <option value="kidwears">Kidswear</option>
                        <option value="dress">Dress</option>
                    </optgroup>
                </select><select class="form-select" id="filterSubcategory-2">
                    <optgroup label="Select Category">
                        <option value="">Select Category</option>
                        <option value="women's shirt">Women's Shirt</option>
                        <option value="women's short">Women's Short</option>
                        <option value="kidwears">Kidswear</option>
                        <option value="dress">Dress</option>
                    </optgroup>
                </select><select class="form-select" id="filterSize-2">
                    <optgroup label="Select Size">
                        <option value="">Select Size</option>
                        <option value="small">Small</option>
                        <option value="large">Large</option>
                        <option value="medium">Medium</option>
                    </optgroup>
                </select><select class="form-select" id="filterColor-2">
                    <optgroup label="Select Color">
                        <option value="">Select Color</option>
                        <option value="black">Black</option>
                        <option value="red">Red</option>
                        <option value="white">White</option>
                        <option value="blue">Blue</option>
                    </optgroup>
                </select><button class="btn btn-primary" id="applyFilters-2" type="button" style="background:var(--bs-white);border:1px solid #d7ac4b;">Apply Filters</button></div>
            <section id="bagsak-presyo-1">
                <div class="new-arrival-heading" style="font-family:'Open Sans', sans-serif;">
                    <div class="container">
                        <div class="row text-center text-md-start align-items-center">
                            <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                                <div>
                                    <h4 style="font-weight:bold;">Bagsak Presyo&nbsp;<span style="font-style:italic;color:#d7ac4b;">Thrift Deals:</span></h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end d-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end mt-2 mt-md-0">
                                <div class="justify-content-center"><button class="btn btn-outline-secondary text-md-end d-flex justify-content-center align-items-center col-12 col-md-6 rounded-pill" type="button" style="width:120px;height:40px;padding:10px 20px;font-weight:bold;background:#d7ac4b;color:var(--bs-black);border-style:none;font-family:'Open Sans', sans-serif;font-size:small;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);text-align:center;">See All<i class="fa fa-angle-right" style="margin-left:8px;font-size:16px;"></i></a></button></div>
                            </div>
                        </div>
                    </div>
                    <!-- Display Thrift Deals -->
                    <div class="container mt-0 pt-0">
                        <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding:50px 0px;">
                            <div class="container" style="font-family:'Open Sans', sans-serif;padding:0px;">
                                <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                @foreach ($thriftDeals as $product)  
                                    <div class="col item">
                                        <div class="card card-prod" style="transition:transform 0.3s ease;">
                                            <div class="card-body">
                                                <i class="fa fa-pencil edit-pencil" data-bs-toggle="modal" data-bs-target="#editProduct"></i>
                                                <a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                    <img class="img-fluid" alt="gray and white adidas backpack" src="{{ asset($product->image) }}" style="width: 100%; height: 180px; object-fit: cover; border-radius: 3px;">
                                                </a>
                                                <h4 id="product-name" class="card-title mt-2 p-1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100%; display: block; font-size: 16.5px;">
                                                    {{ $product->name }}
                                                </h4>
                                                <p class="card-text p-1" style="font-weight: bold; color: #d7ac4b;">
                                                    ₱<span id="product-price-span">{{ $product->price }}</span>
                                                </p>
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
        </section>

        <!--ALL OUT -->
        <section id="all-out-sec" class="dashboard-section mt-2" style="border-radius: 8px;">
            <!--Working on addprodModal3 -->
            <div class="d-flex justify-content-end add-product"><button class="btn" type="button" style="background:#d7ac4b;color:var(--bs-light);border-radius:3px;font-size:14px;" data-bs-toggle="modal" data-bs-target="#addprodModal3"><i class="fa fa-plus" style="margin-right:10px;"></i>Add Product</button></div>
            <div class="filter-section mt-3"><select class="form-select" id="filterCategory-3">
                    <optgroup label="Select Category">
                        <option value="">Select Category</option>
                        <option value="women's shirt">Women's Shirt</option>
                        <option value="women's short">Women's Short</option>
                        <option value="kidwears">Kidswear</option>
                        <option value="dress">Dress</option>
                    </optgroup>
                </select><select class="form-select" id="filterSubcategory-3">
                    <optgroup label="Select Category">
                        <option value="">Select Category</option>
                        <option value="women's shirt">Women's Shirt</option>
                        <option value="women's short">Women's Short</option>
                        <option value="kidwears">Kidswear</option>
                        <option value="dress">Dress</option>
                    </optgroup>
                </select><select class="form-select" id="filterSize-3">
                    <optgroup label="Select Size">
                        <option value="">Select Size</option>
                        <option value="small">Small</option>
                        <option value="large">Large</option>
                        <option value="medium">Medium</option>
                    </optgroup>
                </select><select class="form-select" id="filterColor-3">
                    <optgroup label="Select Color">
                        <option value="">Select Color</option>
                        <option value="black">Black</option>
                        <option value="red">Red</option>
                        <option value="white">White</option>
                        <option value="blue">Blue</option>
                    </optgroup>
                </select><button class="btn btn-primary" id="applyFilters-3" type="button" style="background:var(--bs-white);border:1px solid #d7ac4b;">Apply Filters</button></div>
            <section id="all-products-2" style="font-family: 'Open Sans', sans-serif;">
                <div class="new-arrival-heading" style="font-family:'Open Sans', sans-serif;">
                    <div class="container">
                        <div class="row text-center text-md-start align-items-center">
                            <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                                <div>
                                    <h4 style="font-weight:bold;">All-Out Ukay&nbsp;</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end d-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end mt-2 mt-md-0">
                                <div class="justify-content-center"><button class="btn btn-outline-secondary text-md-end d-flex justify-content-center align-items-center col-12 col-md-6 rounded-pill" type="button" style="width:120px;height:40px;padding:10px 20px;font-weight:bold;background:#d7ac4b;color:var(--bs-black);border-style:none;font-family:'Open Sans', sans-serif;font-size:small;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);text-align:center;">See All<i class="fa fa-angle-right" style="margin-left:8px;font-size:16px;"></i></a></button></div>
                            </div>
                        </div>
                    </div>
                    <!-- Display All Out Ukay -->
                    <div class="container mt-0 pt-0">
                        <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding:50px 0px;">
                            <div class="container" style="font-family:'Open Sans', sans-serif;padding:0px;">
                                <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                @foreach ( $allProducts as $product)  
                                    <div class="col item">
                                        <div class="card card-prod" style="transition:transform 0.3s ease;">
                                            <div class="card-body">
                                                <i class="fa fa-pencil edit-pencil" data-bs-toggle="modal" data-bs-target="#editProduct"></i>
                                                <a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                                    <img class="img-fluid" alt="gray and white adidas backpack" src="{{ asset($product->image) }}" style="width: 100%; height: 180px; object-fit: cover; border-radius: 3px;">
                                                </a>
                                                <h4 id="product-name" class="card-title mt-2 p-1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100%; display: block; font-size: 16.5px;">
                                                    {{ $product->name }}
                                                </h4>
                                                <p class="card-text p-1" style="font-weight: bold; color: #d7ac4b;">
                                                    ₱<span id="product-price-span">{{ $product->price }}</span>
                                                </p>
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
        </section>
        
        <!-- For Orders -->
        <section id="orders" class="dashboard-section pt-3" style="padding: 0px;">
            <div class="shadow-sm orders-container" style="border-radius: 10px; overflow: hidden; background-color: #fff;">
                <div style="background-color: rgba(215,172,75,0.14);padding: 20px 20px;">
                    <h2 style="font-size: 22px;text-align: left;">Order Management</h2>
                </div>
                <div>
                    <div class="d-flex justify-content-end status-filter p-3"><select class="status" style="border-radius: 3px;min-width: 0px;padding: 6px 12px;border-style: solid;border-color: rgba(108,117,125,0.6);color: var(--bs-secondary);">
                            <option value="status">Status</option>
                            <option value="pending">Pending</option>
                            <option value="pending">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select></div>
                    <div class="table-responsive p-3">
                        <table class="table payment-table">
                            <thead style="background: #f9f9f9;">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>OrderId</th>
                                    <th>No. of Items</th>
                                    <th>Delivery Method</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td> {{ $order->user->fullname }}</td>
                                    <td> #{{ $order->id }}</td>
                                    <td> {{ $order->orderItems->count() }}</td>
                                    <td> Meet Up</td> 
                                    <td> {{ $order->paymentMethod->name ?? 'N/A' }}</td>
                                    <td id="status-1"><span id="order-status" class="status pending"> {{ $order->status }}</span></td>
                                    <td><span class="toggle-btn" onclick="toggleDropdown({{ $loop->index }})" style="font-size: 14px;">View&nbsp;</span><span class="complete-btn" onclick="updateStatus(&#39;completed&#39;)" style="font-size: 14px;">&nbsp;Completed</span><span class="cancelled-btn" onclick="updateStatus(&#39;cancelled&#39;)" style="font-size: 14px;">&nbsp;Cancelled</span></td>
                                </tr>
                                <tr id="dropdown-{{ $loop->index }}" class="dropdown">
                                    <td colspan="8">
                                        <div style="max-height: 200px; overflow-y: auto;"><strong class="p-3">Product Ordered:</strong>
                                            <ul class="list-unstyled d-flex flex-column gap-2">
                                            @foreach ($order->orderItems as $item)
                                                <li class="d-flex align-items-center p-3"><img class="object-fit-cover" style="width: 50px;height: 50px;margin-right: 15px;"  src="{{ asset($item->product->image ?? 'assets/img/default.png') }}" alt="Product Image">
                                                {{ $item->product->name ?? 'Unnamed Product' }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3" style="margin-top: 20px;       text-align: right;       font-size: 16px;       font-weight: bold;">
                        <h3 style="font-size: 16px;font-weight: bold;color: var(--bs-secondary);">Total Orders:&nbsp;<span>{{ $orders->count() }}</span></h3>
                    </div>
                </div>
            </div>
        </section>
        <section id="paymentHistory" class="dashboard-section pt-3" style="padding: 0px;">
            <div class="shadow-sm orders-container" style="border-radius: 10px; overflow: hidden; background-color: #fff;">
                <div style="background-color: rgba(215,172,75,0.14);padding: 20px 20px;">
                    <h2 style="font-size: 22px;text-align: left;">Payment History</h2>
                </div>
                <div>
                    <div class="d-flex justify-content-end status-filter p-3"><select class="status" style="border-radius: 3px;min-width: 0px;padding: 6px 12px;border-style: solid;border-color: rgba(108,117,125,0.6);color: var(--bs-secondary);">
                            <option value="status">Status</option>
                            <option value="pending">Pending</option>
                            <option value="Paid">Paid</option>
                        </select></div>
                    <div class="table-responsive p-3">
                        <table class="table payment-table">
                            <thead>
                                <tr>
                                    <th>TransactionID</th>
                                    <th>OrderId</th>
                                    <th>Customer Name</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#UKAY123</td>
                                    <td>Mary Jane</td>
                                    <td>3</td>
                                    <td>COD</td>
                                    <td id="status-4"><span id="order-status-3" class="status pending">PAID</span></td>
                                    <td><span class="toggle-btn" onclick="toggleDropdown(1)" style="font-size: 14px;"></span><span class="complete-btn" onclick="updateStatus(&#39;completed&#39;)" style="font-size: 14px;">&nbsp;PAID</span><span class="cancelled-btn" onclick="updateStatus(&#39;cancelled&#39;)" style="font-size: 14px;">&nbsp;PENDING</span></td>
                                </tr>
                                <tr id="dropdown-3" class="dropdown">
                                    <td colspan="8">
                                        <div style="max-height: 200px; overflow-y: auto;"><strong class="p-3">Product Ordered:</strong>
                                            <ul class="list-unstyled d-flex flex-column gap-2">
                                                <li class="d-flex align-items-center p-3"><img class="object-fit-cover" style="width: 50px;height: 50px;margin-right: 15px;" src="assets/img/3.png">Della Gao Laptop Backpack</li>
                                                <li class="d-flex align-items-center p-3"><img class="object-fit-cover" style="width: 50px;height: 50px;margin-right: 15px;" src="assets/img/3.png">Della Gao Laptop Backpack</li>
                                                <li class="d-flex align-items-center p-3"><img class="object-fit-cover" style="width: 50px;height: 50px;margin-right: 15px;" src="assets/img/4.png">Della Gao Laptop Backpack</li>
                                                <li class="d-flex align-items-center p-3"><img class="object-fit-cover" style="width: 50px;height: 50px;margin-right: 15px;" src="assets/img/6.png">Della Gao Laptop Backpack</li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3" style="margin-top: 20px;       text-align: right;       font-size: 16px;       font-weight: bold;">
                        <h3 style="font-size: 16px;font-weight: bold;color: var(--bs-secondary);">Grand total:&nbsp;<span>7, 000</span></h3>
                    </div>
                </div>
            </div>
        </section>
        <section id="my-account" class="dashboard-section" style="padding:0px;">
            <div class="my-account-container">
                <h2 class="pt-4 pb-2" style="font-size:18px;font-weight:bold;">My Profile</h2>
                <div class="profile-card"><img alt="man wearing Henley top portrait" class="profile-image" src="assets/img/photo-1500648767791-00dcc994a43e.jpg">
                    <div class="profile-info">
                        <h3>Jane Copper</h3>
                        <p>Administrator</p>
                    </div><button class="btn edit-button" type="button">Edit<i class="fa fa-pencil"></i></button>
                </div>
            </div>
            <div class="personal-info-card pt-3">
                <h3 class="p-3" style="font-size: 18px;font-weight: bold;">Personal Information</h3>
                <div class="info pb-3">
                    <div>
                        <h6>First Name</h6>
                        <h5>Jane</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div>
                        <h6>Last Name</h6>
                        <h5>Copper</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div>
                        <h6>Email</h6>
                        <h5>janecopper@gmail.com</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div>
                        <h6>Phone Number</h6>
                        <h5>092342537534</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                </div>
            </div>
            <div class="personal-info-card pt-3">
                <h3 class="p-3" style="font-size: 18px;font-weight: bold;">Address</h3>
                <div class="info pb-3">
                    <div>
                        <h6>Country</h6>
                        <h5>Philippines</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div>
                        <h6>Region</h6>
                        <h5>Region V, Bicol</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div>
                        <h6>City/Barangay</h6>
                        <h5>Sorsogon, Abuyog</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                    <div>
                        <h6>Postal Code</h6>
                        <h5>4700</h5><span class="edit-icon"><i class="fa fa-pencil"></i></span>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="logoutModal" class="modal fade" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="logoutModalLabel" class="modal-title">Confirm Log out</h5><button class="btn btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" data-bs-dismiss="modal">
                    <p style="font-size: 16px;">Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer"><a class="btn btn-secondary" role="button" href="DashBoard.html">No</a><a class="btn btn-danger" role="button" id="confirmLogout" href="ToLogin.html">Yes</a></div>
            </div>
        </div>
    </div>

    <!---Adding Modal-->
    <!---This is for NEW ARRIVAL-->
    <div id="addprodModal" class="modal fade custom-modal" tabindex="-1" aria-labelledby="addprodLabel" aria-hidden="true" data-success-modal="add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title p-2" id="addprodLabel" style="font-weight: bold;">Add Product</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body custom-body m-3">
                    <form class="addprod-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden input fields -->
                        <input type="hidden" name="is_new_arrival" id="is_new_arrival" value="1">
                        <input type="hidden" name="is_thrift_deal" id="is_thrift_deal" value="0">
                        <!--to figure out how to multi-upload -->
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Upload Image\s</label><input class="form-control" type="file" name="image" id="multiImageUpload" multiple="" accept="image/*" required>
                                <div id="imagePreviewContainer" class="image-preview"></div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group"><label class="form-label">Product Name</label><input class="form-control" type="text" name="name" required></div>
                        </div>
                        <div class="form-row">
                        <div class="form-group"><label class="form-label">Brand</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="brand" required>
                                    <option value="">Select Brand</option>
                                    <option value="NIKE">NIKE</option>
                                    <option value="UNIQLO">UNIQLO</option>
                                    <option value="ZARA">ZARA</option>
                                    <option value="PUMA">PUMA</option>
                                    <option value="LEVI'S">LEVI'S</option>
                                    <option value="GAP">GAP</option>
                                    <option value="ADIDAS">ADIDAS</option>
                                    <option value="CHANNEL">CHANNEL</option>
                                    <option value="Local-Brand">Local Brand</option>
                                    <option value="Not-Specified">Not Specified</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Category</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="category_name" id="category" required>
                                    <option value="">Select Category</option>
                                    <option value="men-wear">Men's Wear</option>
                                    <option value="women-wear">Women's Wear</option>
                                    <option value="kidswear">Kidswear</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Sub-Category</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="subcategory_name" required>
                                    <option value="">Select Sub-Category</option>
                                    <option value="shirt">Shirt</option>
                                    <option value="shorts">Shorts</option>
                                    <option value="denim-shorts">Denim Shorts</option>
                                    <option value="pants">Pants</option>
                                    <option value="top">Top</option>
                                    <option value="casual-dress">Casual Dress</option>
                                    <option value="maxi-dress">Maxi Dress</option>
                                    <option value="kidswear">KidsWear</option>
                                </select></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Size</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="size" required>
                                    <option value="">Select Size</option>
                                    <option value="xs">XS</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="xxl">XXL</option>
                                    <option value="xs-s">XS-S</option>
                                    <option value="s-m">S-M</option>
                                    <option value="m-l">M-L</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Color</label><input class="form-control" type="text"  name="color" required></div>
                            <div class="form-group"><label class="form-label">Price</label><input class="form-control" type="text" name="price" required ></div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Style</label><input class="form-control form-control form-control" type="text"  name="style" required></div>
                            <div class="form-group"><label class="form-label">Material</label><input class="form-control form-control form-control" type="text" name="material" required></div>
                            <div class="form-group"><label class="form-label">Condition</label><input class="form-control form-control form-control" type="text" name="condition" required></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Product Description</label><textarea class="form-control" name="description" required></textarea></div>
                        </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary"  type="submit" style="color: var(--bs-light);background: #d7ac4b;border-style: none;">Add</button></div>
                </form>
            </div>
        </div>
    </div>


    <!---Adding Modal-->
    <!---This is for THRIFT DEALS-->
    <div id="addprodModal2" class="modal fade custom-modal" tabindex="-1" aria-labelledby="addprodLabel" aria-hidden="true" data-success-modal="add2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title p-2" id="addprodLabel" style="font-weight: bold;">Add Product</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body custom-body m-3">
                    <form class="addprod-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden input fields -->
                        <input type="hidden" name="is_new_arrival" id="is_new_arrival" value="0">
                        <input type="hidden" name="is_thrift_deal" id="is_thrift_deal" value="1">
                        <!--to figure out how to multi-upload -->
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Upload Image\s</label><input class="form-control" type="file" name="image" id="multiImageUpload2" multiple="" accept="image/*" required>
                                <div id="imagePreviewContainer2" class="image-preview"></div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group"><label class="form-label">Product Name</label><input class="form-control" type="text" name="name" required></div>
                        </div>
                        <div class="form-row">
                        <div class="form-group"><label class="form-label">Brand</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);"  name="brand" required>
                                    <option value="">Select Brand</option>
                                    <option value="NIKE">NIKE</option>
                                    <option value="UNIQLO">UNIQLO</option>
                                    <option value="ZARA">ZARA</option>
                                    <option value="PUMA">PUMA</option>
                                    <option value="LEVI'S">LEVI'S</option>
                                    <option value="GAP">GAP</option>
                                    <option value="ADIDAS">ADIDAS</option>
                                    <option value="CHANNEL">CHANNEL</option>
                                    <option value="Local-Brand">Local Brand</option>
                                    <option value="Not-Specified">Not Specified</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Category</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="category_name" id="category" required>
                                    <option value="">Select Category</option>
                                    <option value="men-wear">Men's Wear</option>
                                    <option value="women-wear">Women's Wear</option>
                                    <option value="kidswear">Kidswear</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Sub-Category</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="subcategory_name" required>
                                    <option value="">Select Sub-Category</option>
                                    <option value="shirt">Shirt</option>
                                    <option value="shorts">Shorts</option>
                                    <option value="denim-shorts">Denim Shorts</option>
                                    <option value="pants">Pants</option>
                                    <option value="top">Top</option>
                                    <option value="casual-dress">Casual Dress</option>
                                    <option value="maxi-dress">Maxi Dress</option>
                                    <option value="kidswear">KidsWear</option>
                                </select></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Size</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="size" required>
                                    <option value="">Select Size</option>
                                    <option value="xs">XS</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="xxl">XXL</option>
                                    <option value="xs-s">XS-S</option>
                                    <option value="s-m">S-M</option>
                                    <option value="m-l">M-L</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Color</label><input class="form-control" type="text"  name="color" required></div>
                            <div class="form-group"><label class="form-label">Price</label><input class="form-control" type="text" name="price" required ></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Style</label><input class="form-control form-control form-control" type="text"  name="style" required></div>
                            <div class="form-group"><label class="form-label">Material</label><input class="form-control form-control form-control" type="text" name="material" required></div>
                            <div class="form-group"><label class="form-label">Condition</label><input class="form-control form-control form-control" type="text" name="condition" required></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Product Description</label><textarea class="form-control" name="description" required></textarea></div>
                        </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary"  type="submit" style="color: var(--bs-light);background: #d7ac4b;border-style: none;">Add</button></div>
                </form>
            </div>
        </div>
    </div>


    <!---Adding Modal-->
    <!---This is for ALL OUT UKAY-->
    <div id="addprodModal3" class="modal fade custom-modal" tabindex="-1" aria-labelledby="addprodLabel" aria-hidden="true" data-success-modal="add3">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title p-2" id="addprodLabel" style="font-weight: bold;">Add Product</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body custom-body m-3">
                    <form class="addprod-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden input fields -->
                        <input type="hidden" name="is_new_arrival" id="is_new_arrival" value="1">
                        <input type="hidden" name="is_thrift_deal" id="is_thrift_deal" value="1">
                        <!--to figure out how to multi-upload -->
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Upload Image\s</label><input class="form-control" type="file" name="image" id="multiImageUpload3" multiple="" accept="image/*" required>
                                <div id="imagePreviewContainer3" class="image-preview"></div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group"><label class="form-label">Product Name</label><input class="form-control" type="text" name="name" required></div>
                        </div>
                        <div class="form-row">
                        <div class="form-group"><label class="form-label">Brand</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);"  name="brand" required>
                                    <option value="">Select Brand</option>
                                    <option value="NIKE">NIKE</option>
                                    <option value="UNIQLO">UNIQLO</option>
                                    <option value="ZARA">ZARA</option>
                                    <option value="PUMA">PUMA</option>
                                    <option value="LEVI'S">LEVI'S</option>
                                    <option value="GAP">GAP</option>
                                    <option value="ADIDAS">ADIDAS</option>
                                    <option value="CHANNEL">CHANNEL</option>
                                    <option value="Local-Brand">Local Brand</option>
                                    <option value="Not-Specified">Not Specified</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Category</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="category_name" id="category" required>
                                    <option value="">Select Category</option>
                                    <option value="men-wear">Men's Wear</option>
                                    <option value="women-wear">Women's Wear</option>
                                    <option value="kidswear">Kidswear</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Sub-Category</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="subcategory_name" required>
                                    <option value="">Select Sub-Category</option>
                                    <option value="shirt">Shirt</option>
                                    <option value="shorts">Shorts</option>
                                    <option value="denim-shorts">Denim Shorts</option>
                                    <option value="pants">Pants</option>
                                    <option value="top">Top</option>
                                    <option value="casual-dress">Casual Dress</option>
                                    <option value="maxi-dress">Maxi Dress</option>
                                    <option value="kidswear">KidsWear</option>
                                </select></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Size</label><select class="form-control" style="font-size: 12px;color: var(--bs-secondary);" name="size" required>
                                    <option value="">Select Size</option>
                                    <option value="xs">XS</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="xxl">XXL</option>
                                    <option value="xs-s">XS-S</option>
                                    <option value="s-m">S-M</option>
                                    <option value="m-l">M-L</option>
                                </select></div>
                            <div class="form-group"><label class="form-label">Color</label><input class="form-control" type="text"  name="color" required></div>
                            <div class="form-group"><label class="form-label">Price</label><input class="form-control" type="text" name="price" required ></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Style</label><input class="form-control form-control form-control" type="text"  name="style" required></div>
                            <div class="form-group"><label class="form-label">Material</label><input class="form-control form-control form-control" type="text" name="material" required></div>
                            <div class="form-group"><label class="form-label">Condition</label><input class="form-control form-control form-control" type="text" name="condition" required></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group"><label class="form-label">Product Description</label><textarea class="form-control" name="description" required></textarea></div>
                        </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary"  type="submit" style="color: var(--bs-light);background: #d7ac4b;border-style: none;">Add</button></div>
                </form>
            </div>
        </div>
    </div>

    <!--Success Modal For New Arrivals -->
    <div id="add" class="modal fade" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body m-3">
                    <div class="d-flex flex-column justify-content-center align-items-center"><i class="far fa-check-circle" style="font-size: 50px;padding: 5px;color: #d7ac4b;"></i>
                        <p style="text-align: center;font-size: 14px;">Success! Your product has been successfully added to the New Arrivals section. Customers can now browse and purchase it from the latest collection.</p>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d7ac4b;color: var(--bs-light);">Close</button></div>
            </div>
        </div>
    </div>

    <!--Success Modal For Thrift Deals -->
    <div id="add2" class="modal fade" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body m-3">
                    <div class="d-flex flex-column justify-content-center align-items-center"><i class="far fa-check-circle" style="font-size: 50px;padding: 5px;color: #d7ac4b;"></i>
                        <p style="text-align: center;font-size: 14px;">Success! Your product has been successfully added to the Thrift Deals section. Customers can now browse and purchase it from the latest collection.</p>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d7ac4b;color: var(--bs-light);">Close</button></div>
            </div>
        </div>
    </div>

    <!--Success Modal For Thrift Deals -->
    <div id="add3" class="modal fade" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body m-3">
                    <div class="d-flex flex-column justify-content-center align-items-center"><i class="far fa-check-circle" style="font-size: 50px;padding: 5px;color: #d7ac4b;"></i>
                        <p style="text-align: center;font-size: 14px;">Success! Your product has been successfully added to the All Out Ukay section. Customers can now browse and purchase it from the latest collection.</p>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d7ac4b;color: var(--bs-light);">Close</button></div>
            </div>
        </div>
    </div>


    <div id="editProduct" class="modal fade" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h4 class="modal-title" style="color:#d7ac4b;">Edit Product Details</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4"><label class="form-label" id="edit-prodName">Product Name</label><input type="text" class="form-control mb-2" style="font-size: 14px;"><label class="form-label" id="edit-prodName-1">Price</label><input type="number" id="edit-prodPrice" class="form-control mb-2" style="font-size: 14px;"></div>
                <div class="modal-footer p-4"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d7ac4b;color: var(--bs-light);" data-bs-toggle="modal" data-bs-target="#saveChanges">Save</button></div>
            </div>
        </div>
    </div>
    <div id="saveChanges" class="modal fade" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered p-4">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #d7ac4b;font-size: 18px;">Save Changes</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 16px;">Product details have been updated successfully.</p>
                </div>
                <div class="modal-footer"><button class="btn" type="button" style="background: #d7ac4b;border-style: none;border-top-style: none;color: white;" data-bs-dismiss="modal">Okay</button></div>
            </div>
        </div>
    </div>
    <div id="invoiceModal" class="modal-abc"><span class="close-btn close-btn-mno" onclick="document.getElementById(&#39;invoiceModal&#39;).style.display=&#39;none&#39;">×</span>
        <div class="container modal-content-abc">
            <div class="d-flex justify-content-center align-items-center" style="flex-direction: column;text-align: center;">
                <h3 class="mb-3" style="font-size: 16px;font-weight: bold;">OrderID#&nbsp;<span>UKAY1234</span></h3>
            </div>
            <div class="row p-3">
                <div class="col-md-6">
                    <div class="info-grid-abc">
                        <div class="row">
                            <div class="col">
                                <div class="info-abc" style="background: rgba(215,172,75,0.1);">
                                    <div class="section-label"><span>Customer ID</span></div><span style="font-weight: bold;">Customer12345</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-abc">
                                    <div class="section-label"><span>Order Date</span></div><span style="font-weight: bold;"> 16/04/2025</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-list-wrapper-abc">
                        <div class="order-list-abc">
                            <div class="order-item-abc"><img alt="gray and white adidas backpack" src="assets/img/photo-1613130061126-fae9b27545f9-1.jpg">
                                <div class="order-details-abc">
                                    <p>Floral Maxi Dress</p>
                                    <p>₱<span>50</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="auto-fill">
                        <div class="section-label"><span>Payment Method</span></div><span style="color: var(--bs-dark);"> Cash on Delivery</span>
                    </div>
                    <div class="auto-fill">
                        <div class="section-label"><span>Delivery Method</span></div><span style="color: var(--bs-dark);">Meet-Up</span>
                    </div>
                    <div class="auto-fill">
                        <div class="section-label"><span>Delivery Location</span></div><span style="color: var(--bs-dark);">SM Sorsogon, Sorsogon City</span>
                    </div>
                    <div class="summary-abc">
                        <p style="font-size: 14px;"><span style="font-size: 14px;">Subtotal</span><span style="font-size: 14px;">₱600</span></p>
                        <p style="font-size: 14px;"><span>Delivery Fee</span><span>₱10</span></p>
                        <p class="bold" style="color: var(--bs-black);font-size: 18px;"><span style="font-size: 18px;font-weight: bold;">Total Amount</span><span style="font-weight: bold;">₱630</span></p>
                    </div><a class="btn confirm-order-btn" role="button" style="border-radius: 3px;background: #d7ac4b; color: #fff;" href="GenerateInvoice.html">Confirm Order &amp; Generate E-Invoice</a>
                </div>
            </div>
        </div>
    </div>
    <div id="chat-container-abc" class="chat-container-abc">
        <div class="chat-box-def">
            <div id="message-box" class="message-box">
                <div class="d-flex justify-content-between align-items-center chat-box-def-header">
                    <h4>All Messages</h4><button class="btn mobile-only" id="chat-close-btn-def" type="button" style="padding: 2px 6px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                            <path d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z" fill="currentColor"></path>
                        </svg></button>
                </div>
                <div class="inbox-messages-wrapper" style="overflow-y: auto; height: 350px;">
                    <div class="message-preview active" data-user="Customer A"><span>Customer A</span>
                        <p class="pb-1">Hi, I need help with my order.fdfdfsfdfvxcv eefsdfdsdfsdfsdfsdfdv</p><span class="text-muted" style="font-size:8px;">10:00 AM</span>
                    </div>
                    <div class="message-preview" data-user="Customer B"><span>Customer B</span>
                        <p>Can you check my payment? dfdf heheh wow jsn jadhabdc</p><span class="text-muted" style="font-size:8px;">10:00 AM</span>
                    </div>
                    <div class="message-preview" data-user="Customer C"><span>Customer C</span>
                        <p>Thanks for the fast delivery!</p><span class="text-muted" style="font-size:8px;">10:00 AM</span>
                    </div>
                </div>
            </div>
            <div id="conversation-column" class="conversation-column">
                <div class="conversation-header"><button class="btn mobile-only" id="back-btn-convo" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                            <path d="M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z" fill="currentColor"></path>
                        </svg></button>
                    <h4 id="current-user" class="m-0">Customer A</h4><button class="btn close-chatBOX" id="close-chatBOX" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                            <path d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z" fill="currentColor"></path>
                        </svg></button>
                </div>
                <div class="conversation-body">
                    <div class="message sender"><span>Hello</span></div>
                    <div class="message receiver">
                        <div class="message-text"><span>Hi there!</span></div>
                    </div>
                </div>
                <div class="conversation-footer"><textarea id="message-input-abc" placeholder="Type your message..." required="" style="font-size: 12px;"></textarea>
                    <div class="chatBOX-controls">
                        <div class="file-upload-wrapper"><input type="file" id="file-input" class="d-none" accept="images/*"><button class="btn" id="file-upload" type="button"><i class="fas fa-paperclip" style="color:#d7ac4b;font-size:12px;"></i></button></div><button class="btn" id="send-message-abc" type="button"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
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

        <!-- Script For Adding Products by Section -->

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".addprod-form").forEach(form => {
                form.addEventListener("submit", function (e) {
                    e.preventDefault(); // Prevent default form submission

                    let formData = new FormData(this);
                    let modalElement = this.closest(".modal"); // Get the parent modal dynamically
                    let successModalId = modalElement.dataset.successModal; // Get success modal ID from data attribute

                    // AJAX request using Fetch API
                    fetch(this.action, {
                        method: this.method,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Hide the current modal
                            let modalInstance = bootstrap.Modal.getInstance(modalElement);
                            if (modalInstance) {
                                modalInstance.hide();
                            }

                            // Wait for modal animation to finish before showing the correct success modal
                            setTimeout(() => {
                                let successModal = new bootstrap.Modal(document.getElementById(successModalId));
                                successModal.show();
                            }, 500);

                            // Reset the form after a short delay
                            setTimeout(() => this.reset(), 500);
                        } else {
                            alert("Failed to add product. Please try again.");
                        }
                    })
                    .catch(error => console.error("Error:", error));
                });
            });
        });
</script>

</body>

</html>