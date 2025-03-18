<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ecommerce-Server-Side</title>
    <link rel="stylesheet" href="admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="admin/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/LoginStyle.css">
    <link rel="stylesheet" href="admin/assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="admin/assets/css/styles.css">
</head>

<body class="d-flex flex-column">
    <div class="sidebar hidden">
        <div class="logo mt-4">
            <h2>Clobbercore By K</h2>
            <ul class="nav-links mt-5" style="padding-left: 0px;">
                <li><a class="nav-link active" href="#" data-section="dashboard"><i class="fa fa-th-large p-2"></i>Dashboard</a></li>
                <li><a class="nav-link" href="#" data-section="new-arrival-sec"><i class="fa fa-star p-2"></i>New Arrivals</a></li>
                <li><a class="nav-link" href="#" data-section="bagsak-presyo-sec"><i class="fa fa-heart p-2"></i>Bagsak-Presyo</a></li>
                <li><a class="nav-link" href="#" data-section="all-out-sec"><i class="fa fa-th p-2"></i>All-Out Ukay</a></li>
                <li><a class="nav-link" href="#" data-section="orders"><i class="fa fa-shopping-cart p-2"></i>Orders</a></li>
                <li><a class="nav-link" href="#" data-section="my-account"><i class="fa fa-user p-2"></i>Account</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa fa-power-off p-2"></i>Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content full-width">
        <header class="heading-top"><button class="btn" id="menu-toggle" type="button" style="color:#d7ac4b;"><i class="fa fa-bars"></i></button>
            <div class="search-bar" style="border: 0.8px solid #d7ac4b ;"><i class="fa fa-search" style="color: #d7ac4b;"></i><input type="text" placeholder="Search here.."><button class="btn" type="button" style="color: var(--bs-secondary);">Go</button></div>
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
                            <h4 class="pt-3 pb-3" style="font-size: 16px;color: var(--bs-gray-dark);">Monthly Revenue</h4>
                            <div><canvas data-bss-chart="{&quot;type&quot;:&quot;bar&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;January&quot;,&quot;February&quot;,&quot;March&quot;,&quot;April&quot;,&quot;May&quot;,&quot;June&quot;,&quot;July&quot;,&quot;August&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:&quot;rgba(215,172,75,0.5)&quot;,&quot;borderColor&quot;:&quot;&quot;,&quot;data&quot;:[&quot;4500&quot;,&quot;5300&quot;,&quot;6250&quot;,&quot;7800&quot;,&quot;9800&quot;,&quot;15000&quot;,&quot;4500&quot;,&quot;5000&quot;,&quot;&quot;]},{&quot;label&quot;:&quot;&quot;,&quot;data&quot;:[]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;bold&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;ticks&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}],&quot;yAxes&quot;:[{&quot;ticks&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}]}}}"></canvas></div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="pt-3 pb-3" style="font-size: 16px;color: var(--bs-gray-dark);">Ukay-Ukay Sales Breakdown by Category</h4>
                            <div><canvas data-bss-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Men's Shirt&quot;,&quot;Women's Shirt&quot;,&quot;Kidswear&quot;,&quot;Women's denim short&quot;,&quot;Women's Denim Pants&quot;,&quot;Maxi Dress&quot;,&quot;Women top&quot;,&quot;Casual Dress&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Revenue&quot;,&quot;backgroundColor&quot;:[&quot;#d7ac4b&quot;,&quot;#7fbcaa&quot;,&quot;#076d54&quot;,&quot;rgb(94,153,170)&quot;,&quot;rgb(150,170,153)&quot;,&quot;#7796b2&quot;,&quot;rgb(0,107,119)&quot;,&quot;rgb(221,204,107)&quot;,&quot;#d7ac4b&quot;],&quot;borderColor&quot;:[&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;,&quot;#d5dcef&quot;],&quot;data&quot;:[&quot;4500&quot;,&quot;5300&quot;,&quot;6250&quot;,&quot;7800&quot;,&quot;9800&quot;,&quot;15000&quot;,&quot;1000&quot;,&quot;2000&quot;,&quot;&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:true,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;bold&quot;,&quot;fontFamily&quot;:&quot;'Open Sans', sans-serif&quot;,&quot;display&quot;:false}}}"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-2">
                <div class="recent-orders">
                    <h4 class="p-2" style="font-size: 16px;">Recent Orders</h4>
                    <div class="m-3">
                        <div class="order-item mb-2"><img src="assets/img/6.png">
                            <div class="order-details">
                                <p class="mb-0" style="font-size:14px;">Customer ID:&nbsp;<span style="font-weight:bold;">123348</span></p>
                                <p class="mb-0" style="font-size:14px;">Denim Jacket</p><small>₱50</small>
                                <div class="d-flex justify-content-end view-details-btn"><button class="btn" type="button" style="font-size: 14px;color: #d7ac4b;" data-bs-toggle="modal" data-bs-target="#viewDetailsModal">View Details</button></div>
                            </div>
                        </div>
                        <div class="order-item mb-2"><img src="assets/img/6.png">
                            <div class="order-details">
                                <p class="mb-0" style="font-size:14px;">Customer ID:&nbsp;<span style="font-weight:bold;">123348</span></p>
                                <p class="mb-0" style="font-size:14px;">Denim Jacket</p><small>₱50</small>
                                <div class="d-flex justify-content-end view-details-btn"><button class="btn" type="button" style="font-size: 14px;color: #d7ac4b;" data-bs-toggle="modal" data-bs-target="#viewDetailsModal">View Details</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="notifications">
                    <h4 class="p-2" style="font-size: 16px;">Notifications</h4>
                    <div class="notification-item"><i class="fa fa-exclamation"></i>
                        <p class="mb-0">New Message</p>
                    </div>
                    <div class="notification-item"><i class="fa fa-exclamation"></i>
                        <p class="mb-0">Payment Received from OrderID:&nbsp;<span style="font-weight: bold;">UKAY1234</span></p>
                    </div>
                    <div class="notification-item"><i class="fa fa-exclamation"></i>
                        <p class="mb-0">OrderID:&nbsp;<span style="font-weight: bold;">UKAY1234</span>&nbsp;cancelled their order.</p>
                    </div>
                </div>
            </div>
        </section>




<!--FOR NEW Arrival -->
        <section id="new-arrival-sec" class="dashboard-section">
            <div class="d-flex justify-content-end add-product">
            <!--FOR Adding NEW Arrival -->
            <button class="btn" type="button" style="background:#d7ac4b;color:var(--bs-light);border-radius:3px;font-size:14px;" data-bs-toggle="modal" data-bs-target="#addprodModal">
            <i class="fa fa-plus" style="margin-right:10px;"></i>Add Product</button></div>
            
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
                </select>
                <button class="btn btn-primary" id="applyFilters-1" type="button" style="background:var(--bs-white);border:1px solid #d7ac4b;">Apply Filters</button></div>
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
                    <div class="container mt-0 pt-0">
                        <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding:50px 0px;">
                            <div class="container" style="font-family:'Open Sans', sans-serif;padding:0px;">
                                <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-4" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-4">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-3" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-3">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-2" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-2">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-1" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-1">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>


        <!--For Thrift Deals -->
        <section id="bagsak-presyo-sec" class="dashboard-section">
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
                    <div class="container mt-0 pt-0">
                        <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding:50px 0px;">
                            <div class="container" style="font-family:'Open Sans', sans-serif;padding:0px;">
                                <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-5" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-5">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-9" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-9">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-8" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-8">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-7" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-7">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-pencil" onclick="openEditProdModal()" data-bs-toggle="modal" data-bs-target="#editProduct"></i><a href="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"><img class="img-fluid" src="assets/img/1.png"></a>
                                                <h4 id="product-name-6" class="card-title" style="font-size:16px;margin-top:12px;">Product Name</h4>
                                                <p class="card-text" style="font-size:16px;">Price:&nbsp;<span id="product-price-span-6">₱</span></p>
                                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;width:90%;height:30px;background:#d7ac4b;border-style:none;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);">Buy Now</a></button></div>
                                                    <div class="col" style="padding:0px 0px;"><button class="btn btn-primary" type="button" style="font-size:12px;padding:5px 10px;background:#d7ac4b;border-style:none;width:90%;height:30px;"><a class="text-decoration-none" href="#" style="color:var(--bs-light);font-size:12px;">Add to Cart</a></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>

<!--ALL OUT -->
        <section id="all-out-sec" class="dashboard-section" style="border-radius: 8px;">
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
                    <div class="container mt-0 pt-0">
                        <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding:50px 0px;">
                            <div class="container" style="font-family:'Open Sans', sans-serif;padding:0px;">
                                <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                    <div class="col item">
                                        <div class="card all-card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-all-icon" data-bs-toggle="modal" data-bs-target="#editProduct"></i><img class="img-fluid" src="assets/img/1.png">
                                                <h4 class="card-title" style="font-size:16px;margin-top:12px;margin-bottom:12px;">Product Descrip</h4>
                                                <h3 style="font-size:18px;font-weight:bold;color:#d7ac4b;">₱&nbsp;<span id="price-60">100</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card all-card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-all-icon" data-bs-toggle="modal" data-bs-target="#editProduct"></i><img class="img-fluid" src="assets/img/1.png">
                                                <h4 class="card-title" style="font-size:16px;margin-top:12px;margin-bottom:12px;">Product Descrip</h4>
                                                <h3 style="font-size:18px;font-weight:bold;color:#d7ac4b;">₱&nbsp;<span id="price-4">100</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card all-card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-all-icon" data-bs-toggle="modal" data-bs-target="#editProduct"></i><img class="img-fluid" src="assets/img/1.png">
                                                <h4 class="card-title" style="font-size:16px;margin-top:12px;margin-bottom:12px;">Product Descrip</h4>
                                                <h3 style="font-size:18px;font-weight:bold;color:#d7ac4b;">₱&nbsp;<span id="price-3">100</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card all-card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-all-icon" data-bs-toggle="modal" data-bs-target="#editProduct"></i><img class="img-fluid" src="assets/img/1.png">
                                                <h4 class="card-title" style="font-size:16px;margin-top:12px;margin-bottom:12px;">Product Descrip</h4>
                                                <h3 style="font-size:18px;font-weight:bold;color:#d7ac4b;">₱&nbsp;<span id="price-2">100</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col item">
                                        <div class="card all-card-prod" style="transition: transform 0.3s ease;">
                                            <div class="card-body"><i class="fa fa-pencil edit-all-icon" data-bs-toggle="modal" data-bs-target="#editProduct"></i><img class="img-fluid" src="assets/img/1.png">
                                                <h4 class="card-title" style="font-size:16px;margin-top:12px;margin-bottom:12px;">Product Descrip</h4>
                                                <h3 style="font-size:18px;font-weight:bold;color:#d7ac4b;">₱&nbsp;<span id="price-1">100</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>
        <section id="orders" class="dashboard-section pt-3" style="padding: 0px;">
            <div class="orders-container">
                <div class="d-flex justify-content-between p-3">
                    <h2 style="font-size: 22px;">Order Management</h2>
                    <div class="status-filter"><select class="status" style="border-radius: 6px;min-width: 0px;padding: 6px 12px;border-style: solid;border-color: rgba(108,117,125,0.6);color: var(--bs-secondary);">
                            <option value="status">Status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select></div>
                </div>
                <div class="table-responsive p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Customer Name</th>
                                <th>No. of Items</th>
                                <th>Delivery Method</th>
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
                                <td>Meet Up</td>
                                <td>COD</td>
                                <td id="status-1"><span id="order-status" class="status pending">PENDING</span></td>
                                <td><span class="toggle-btn" onclick="toggleDropdown(1)" style="font-size: 14px;">View&nbsp;</span><span class="complete-btn" onclick="updateStatus(&#39;completed&#39;)" style="font-size: 14px;">&nbsp;Completed</span><span class="cancelled-btn" onclick="updateStatus(&#39;cancelled&#39;)" style="font-size: 14px;">&nbsp;Cancelled</span></td>
                            </tr>
                            <tr id="dropdown-1" class="dropdown">
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
                    <p>Are you sure you want to log out?</p>
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
                <h4 class="modal-title p-2" id="addprodLabel" style="font-weight: bold;">Add Product</h4>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body custom-body m-3">
                <form class="addprod-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden input fields -->
                    <input type="hidden" name="is_new_arrival" id="is_new_arrival" value="1">
                    <input type="hidden" name="is_thrift_deal" id="is_thrift_deal" value="0">

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <input class="form-control" type="file" name="image" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Product Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="category_name" id="category" required>
                                <option value="">Select Category</option>
                                <option value="Men's Wear">Men's Wear</option>
                                <option value="Women's Wear">Women's Wear</option>
                                <option value="Kidswear">Kidswear</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sub-Category</label>
                            <select class="form-control" name="subcategory_name" required>
                                <option value="">Select Sub-Category</option>
                                <option value="Men's Shirt">Shirt</option>
                                <option value="Men's Short">Short</option>
                                <option value="Women's Shirt">Shirt</option>
                                <option value="Women's Denim Short">Denim Short</option>
                                <option value="Women's Top">Top</option>
                                <option value="Casual Dress">Casual Dress</option>
                                <option value="Maxi Dress">Maxi Dress</option>
                                <option value="KidsWear">KidsWear</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Size</label>
                            <select class="form-control" name="size" required>
                                <option value="">Select Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                <option value="XS-S">XS-S</option>
                                <option value="S-M">S-M</option>
                                <option value="M-L">M-L</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Color</label>
                            <input class="form-control" type="text" name="color" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input class="form-control" type="text" name="price" required required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Style</label>
                            <input class="form-control" type="text" name="style" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Material</label>
                            <input class="form-control" type="text" name="material" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Condition</label>
                            <input class="form-control" type="text" name="condition" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Product Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" style="color: var(--bs-light); background: #d7ac4b; border-style: none;">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

  <!---Adding Modal-->
    <!---This is for Thrift Deals-->

    <div id="addprodModal2" class="modal fade custom-modal" tabindex="-1" aria-labelledby="addprodLabel" aria-hidden="true" data-success-modal="add2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title p-2" id="addprodLabel" style="font-weight: bold;">Add Product</h4>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body custom-body m-3">
                <form class="addprod-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden input fields -->
                    <input type="hidden" name="is_new_arrival" id="is_new_arrival" value="0">
                    <input type="hidden" name="is_thrift_deal" id="is_thrift_deal" value="1">

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <input class="form-control" type="file" name="image" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Product Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="category_name" id="category" required>
                                <option value="">Select Category</option>
                                <option value="Men's Wear">Men's Wear</option>
                                <option value="Women's Wear">Women's Wear</option>
                                <option value="Kidswear">Kidswear</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sub-Category</label>
                            <select class="form-control" name="subcategory_name" required>
                                <option value="">Select Sub-Category</option>
                                <option value="Men's Shirt">Shirt</option>
                                <option value="Men's Short">Short</option>
                                <option value="Women's Shirt">Shirt</option>
                                <option value="Women's Denim Short">Denim Short</option>
                                <option value="Women's Top">Top</option>
                                <option value="Casual Dress">Casual Dress</option>
                                <option value="Maxi Dress">Maxi Dress</option>
                                <option value="KidsWear">KidsWear</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Size</label>
                            <select class="form-control" name="size" required>
                                <option value="">Select Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                <option value="XS-S">XS-S</option>
                                <option value="S-M">S-M</option>
                                <option value="M-L">M-L</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Color</label>
                            <input class="form-control" type="text" name="color" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input class="form-control" type="text" name="price" required required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Style</label>
                            <input class="form-control" type="text" name="style" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Material</label>
                            <input class="form-control" type="text" name="material" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Condition</label>
                            <input class="form-control" type="text" name="condition" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Product Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" style="color: var(--bs-light); background: #d7ac4b; border-style: none;">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!---Adding Modal-->
    <!---This is for All Out Ukay-->

    <div id="addprodModal3" class="modal fade custom-modal" tabindex="-1" aria-labelledby="addprodLabel" aria-hidden="true" data-success-modal="add3">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title p-2" id="addprodLabel" style="font-weight: bold;">Add Product</h4>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body custom-body m-3">
                <form class="addprod-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden input fields -->
                    <input type="hidden" name="is_new_arrival" id="is_new_arrival" value="1">
                    <input type="hidden" name="is_thrift_deal" id="is_thrift_deal" value="1">

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Upload Image</label>
                            <input class="form-control" type="file" name="image" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Product Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="category_name" id="category" required>
                                <option value="">Select Category</option>
                                <option value="Men's Wear">Men's Wear</option>
                                <option value="Women's Wear">Women's Wear</option>
                                <option value="Kidswear">Kidswear</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sub-Category</label>
                            <select class="form-control" name="subcategory_name" required>
                                <option value="">Select Sub-Category</option>
                                <option value="Men's Shirt">Shirt</option>
                                <option value="Men's Short">Short</option>
                                <option value="Women's Shirt">Shirt</option>
                                <option value="Women's Denim Short">Denim Short</option>
                                <option value="Women's Top">Top</option>
                                <option value="Casual Dress">Maxi Dress</option>
                                <option value="Maxi Dress">Casual Dress</option>
                                <option value="KidsWear">KidsWear</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Size</label>
                            <select class="form-control" name="size" required>
                                <option value="">Select Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                <option value="XS-S">XS-S</option>
                                <option value="S-M">S-M</option>
                                <option value="M-L">M-L</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Color</label>
                            <input class="form-control" type="text" name="color" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input class="form-control" type="text" name="price" required required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Style</label>
                            <input class="form-control" type="text" name="style" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Material</label>
                            <input class="form-control" type="text" name="material" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Condition</label>
                            <input class="form-control" type="text" name="condition" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Product Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" style="color: var(--bs-light); background: #d7ac4b; border-style: none;">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--Success Modal For New Arrivals -->
<div id="add" class="modal fade" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addLabel" style="color: #d7ac4b;">Successfully added!</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body m-3">
                    <p style="font-size: 14px;margin: 10px;margin-bottom: 0px;">Success! Your product has been successfully added to the New Arrivals section. Customers can now browse and purchase it from the latest collection.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d7ac4b;color: var(--bs-light);">Close</button></div>
            </div>
        </div>
    </div>

<!--Success Modal For Thrift Deals -->
    <div id="add2" class="modal fade" tabindex="-1" aria-labelledby="addLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addLabel" style="color: #d7ac4b;">Successfully added!</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body m-3">
                    <p style="font-size: 14px;margin: 10px;margin-bottom: 0px;">Success! Your product has been successfully added to the Bagsak section. Customers can now browse and purchase it from the latest collection.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d7ac4b;color: var(--bs-light);">Close</button></div>
            </div>
        </div>
    </div>

<!--Success Modal For All Out Ukay -->
<div id="add3" class="modal fade" tabindex="-1" aria-labelledby="addLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addLabel" style="color: #d7ac4b;">Successfully added!</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body m-3">
                    <p style="font-size: 14px;margin: 10px;margin-bottom: 0px;">Success! Your product has been successfully added to the All Out Ukay section. Customers can now browse and purchase it from the latest collection.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="background: #d7ac4b;color: var(--bs-light);">Close</button></div>
            </div>
        </div>
    </div>

    <div id="viewDetailsModal" class="modal fade" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title p-2" style="color: #d7ac4b;">Order Details</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body m-3">
                    <div class="row">
                        <div class="col-md-6 orderdetails-list">
                            <div class="d-flex align-items-center border-bottom p-2"><img class="object-fit-cover" style="width: 80px;height: 80px;" src="assets/img/7.png">
                                <div style="margin-left: 20px;">
                                    <p class="mb-0">Denim Jacket</p>
                                    <p class="text-muted">&nbsp;₱&nbsp;<span>50</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom p-2"><img class="object-fit-cover" style="width: 80px;height: 80px;" src="assets/img/4.png">
                                <div style="margin-left: 20px;">
                                    <p class="mb-0">Denim Jacket</p>
                                    <p class="text-muted">&nbsp;₱&nbsp;<span>50</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom p-2"><img class="object-fit-cover" style="width: 80px;height: 80px;" src="assets/img/5.png">
                                <div style="margin-left: 20px;">
                                    <p class="mb-0">Denim Jacket</p>
                                    <p class="text-muted">&nbsp;₱&nbsp;<span>50</span></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom p-2"><img class="object-fit-cover" style="width: 80px;height: 80px;" src="assets/img/6.png">
                                <div style="margin-left: 20px;">
                                    <p class="mb-0">Denim Jacket</p>
                                    <p class="text-muted">&nbsp;₱&nbsp;<span>50</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 orderdetails-right">
                            <div class="p-4">
                                <p>CustomerID:&nbsp;<span>MINER123456</span></p>
                                <p>OrderID:&nbsp;<span>UKAY1223456</span></p>
                                <p>Total Items:&nbsp;<span>4</span></p>
                                <p>Mode of Delivery:&nbsp;<span>Meet-Up</span></p>
                                <p>Payment Status:&nbsp;<span>PAID</span></p>
                            </div>
                            <div class="p-4" style="border-top: 0.8px dashed rgba(108,117,125,0.7) ;">
                                <p>Total Payment:&nbsp;<span style="color: var(--bs-form-invalid-border-color);font-size: 18px;">300.00</span></p>
                            </div>
                        </div>
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
    <script src="admin/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/chart.min.js"></script>
    <script src="admin/assets/js/bs-init.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>
    <script src="admin/assets/js/datetime.js"></script>
    <script src="admin/assets/js/tabfunction.js"></script>

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