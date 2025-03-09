<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EcommerceFinalNaTalaga (Backup 1741367607420)</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: #f5f5f5;">
    <div id="hero-top" style="font-family: Montserrat, sans-serif;font-size: 16px;overflow: visible;">
        <nav class="navbar navbar-expand-md sticky-top d-md-flex justify-content-md-end mt-0" style="border-bottom-right-radius: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;border-top-right-radius: 0;margin-top: 0px;margin-right: 0px;margin-left: 0px;background: #ede6d2;" data-bs-theme="light">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="color: var(--bs-gray-900);--bs-body-font-weight: normal;font-weight: bold;">Clobbercore by K</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-center justify-content-lg-end me-0 pe-0 ms-0" id="navcol-2">
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

    <section id="main-clothingSec">
        <div class="main-page">
            <div class="container mt-4">
                <ul class="nav nav-tabs" id="ukayTabs" style="background: var(--bs-white);">
                    <li class="nav-item"><a class="nav-link active" data-category="new-arrival" href="#" style="border-radius: 0px;border-style: none;">New Arrival</a></li>
                    <li class="nav-item"><a class="nav-link" data-category="bagsak-presyo" href="#" style="border-radius: 0px;border-style: none;">Bagsak Presyo</a></li>
                    <li class="nav-item"><a class="nav-link" data-category="all-out-ukay" href="#" style="border-radius: 0px;border-style: none;">All-Out Ukay</a></li>
                </ul>
                <div class="filter-section mt-3"><select class="form-select" id="filterCategory-1">
                        <optgroup label="Select Category">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
                        </optgroup>
                    </select><select id="filterSubcategory-2" class="form-select">
                        <optgroup label="Select Category">
                            <option value="">Select Subcategory</option>
                        </optgroup>
                    </select><select class="form-select" id="filterSize">
                        <optgroup label="Select Size">
                            <option value="">Select Size</option>
                            @foreach($sizes as $size)
            <option value="{{ $size->size }}">{{ $size->size }}</option>
        @endforeach
                        </optgroup>
                    </select><select class="form-select" id="filterColor">
                        <optgroup label="Select Color">
                            <option value="">Select Color</option>
                            @foreach($colors as $color)
            <option value="{{ $color->color }}">{{ $color->color }}</option>
        @endforeach
                        </optgroup>
                    </select><button class="btn btn-primary" id="applyFilters" type="submit" style="background: var(--bs-white);border: 1px solid #d7ac4b;">Apply Filters</button></div>

                    <div id="productList">   </div>
      
                    <div class="product-container new-arrival show">
                    <section id="new-arrival">
                        <div class="new-arrival-heading" style="font-family: 'Open Sans', sans-serif;">
                            <div class="container">
                                <div class="row text-center text-md-start align-items-center">
                                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                                        <div>
                                            <h4 style="font-weight: bold;">New&nbsp;<span style="font-style: italic;color: #d7ac4b;">Arrivals</span>&nbsp;- Get yours for Only&nbsp;<span class="price-tag">₱50</span>!</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-end d-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end mt-2 mt-md-0">
                                        <div class="justify-content-center"><button class="btn d-flex justify-content-center col-12 col-md-6 text-md-end btn-outline-secondary rounded-pill align-items-center" type="button" style="width: 175px;height: 40px;padding: 10px 20px;font-weight: bold;background: #d7ac4b;color: var(--bs-black);border-style: none;font-family: 'Open Sans', sans-serif;font-size: small;"><a class="text-decoration-none" href="#" style="color: var(--bs-light);">All&nbsp;Collection<i class="fa fa-long-arrow-right" style="margin-left: 8px;"></i>&nbsp;</a></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-0 pt-0">
                                <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding: 50px 0px;">
                                    <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                                        <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                        @foreach ( $newArrivals as $product) 
                                            <div class="col item">
                                                <div class="card">
                                                    <div class="card-body"><a href="{{ route('product.view', $product->id) }}"><img class="img-fluid" src="{{ asset($product->image) }}"></a>
                                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;">{{ $product->name }}</h4>
                                                        <p class="card-text" style="font-size: 16px;">Price:&nbsp;<span>₱{{ $product->price }}</span></p>
                                                        <div class="row text-center d-flex justify-content-between buy-add-button">
                                                            <div class="col" style="padding: 0px 0px;"><button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;width: 90%;height: 30px;background: #d7ac4b;border-style: none;"><a class="text-decoration-none" href="#" style="color: var(--bs-light);">Buy Now</a></button></div>
                                                            <div class="col" style="padding: 0px 0px;"><button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;background: #d7ac4b;border-style: none;width: 90%;height: 30px;"><a class="text-decoration-none" href="#" style="color: var(--bs-light);font-size: 12px;">Add to Cart</a></button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>@endforeach
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="product-container bagsak-presyo">
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
                                <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding: 50px 0px;">
                                    <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                                        <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                        @foreach ($thriftDeals as $product)
                                            <div class="col item">
                                                <div class="card">
                                                    <div class="card-body"><a href="{{ route('product.view', $product->id) }}"><img class="img-fluid" src="{{ asset($product->image) }}"></a>
                                                        <h4 class="card-title" style="font-size: 16px;margin-top: 12px;">{{ $product->name }}</h4>
                                                        <p class="card-text" style="font-size: 16px;">Price:&nbsp;<span>₱{{ $product->price }}</span></p>
                                                        <div class="row text-center d-flex justify-content-between buy-add-button">
                                                            <div class="col" style="padding: 0px 0px;"><button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;width: 90%;height: 30px;background: #d7ac4b;border-style: none;"><a class="text-decoration-none" href="#" style="color: var(--bs-light);">Mine</a></button></div>
                                                            <div class="col" style="padding: 0px 0px;"><button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;background: #d7ac4b;border-style: none;width: 90%;height: 30px;"><a class="text-decoration-none" href="#" style="color: var(--bs-light);font-size: 12px;">Add to Cart</a></button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>@endforeach
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="product-container all-out-ukay">
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
                                        <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">
                                        @foreach ( $allProducts as $product)  
                                            <div class="col item">
                                            <a href="{{ route('product.view', $product->id) }}" style="text-decoration: none; color: inherit;">
                                                <div class="card">
                                                    <div class="card-body"><img class="img-fluid" src="{{ asset($product->image) }}">
                                                        <h4 class="card-title" style="font-size:16px;margin-top:12px;margin-bottom:12px;">{{ $product->name }}</h4>
                                                        <h3 style="font-size:18px;font-weight:bold;color:#d7ac4b;">₱&nbsp;<span id="price">{{ $product->price }}</span></h3>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>@endforeach
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
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
// Apply Filters
document.getElementById('applyFilters').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default button behavior

    let category = document.getElementById('filterCategory-1').value;
    let subcategory = document.getElementById('filterSubcategory-2').value;
    let size = document.getElementById('filterSize').value;
    let color = document.getElementById('filterColor').value;

    // Construct query string
    const queryString = new URLSearchParams({
        category: category,
        subcategory: subcategory,
        size: size,
        color: color
    }).toString();

    fetch(`/apply-filters?${queryString}`)
    .then(response => response.json())
    .then(data => {
        let products = data.products;
        let productListHtml = `
            <div class="container mt-0 pt-0">
                <section class="photo-gallery py-4 py-xl-5 mt-0 pt-4" style="padding: 50px 0px;">
                    <div class="container" style="font-family: 'Open Sans', sans-serif;padding: 0px;">
                        <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-5 photos" data-bss-baguettebox="">`;

        if (products.length > 0) {
            products.forEach(product => {
                productListHtml += `
                    <div class="col item">
                        <div class="card">
                            <div class="card-body">
                                <a href="/product/view/${product.id}">
                                    <img class="img-fluid" src="${product.image}" alt="${product.name}">
                                </a>
                                <h4 class="card-title" style="font-size: 16px;margin-top: 12px;">${product.name}</h4>
                                <p class="card-text" style="font-size: 16px;">Price:&nbsp;<span>₱${product.price}</span></p>
                                <div class="row text-center d-flex justify-content-between buy-add-button">
                                    <div class="col" style="padding: 0px 0px;">
                                        <button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;width: 90%;height: 30px;background: #d7ac4b;border-style: none;">
                                            <a class="text-decoration-none" href="#" style="color: var(--bs-light);">Buy Now</a>
                                        </button>
                                    </div>
                                    <div class="col" style="padding: 0px 0px;">
                                        <button class="btn btn-primary" type="button" style="font-size: 12px;padding: 5px 10px;background: #d7ac4b;border-style: none;width: 90%;height: 30px;">
                                            <a class="text-decoration-none" href="#" style="color: var(--bs-light);font-size: 12px;">Add to Cart</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
            });
        } else {
            productListHtml += `<p class="text-center">No products found with the selected filters.</p>`;
        }

        productListHtml += `</div></div></section></div>`;

        document.getElementById('productList').innerHTML = productListHtml;
    })
    .catch(error => console.error('Error:', error));
});

// Dynamically Load Subcategories Based on Category Selection
document.getElementById('filterCategory-1').addEventListener('change', function() {
    let categoryId = this.value;

    if (categoryId) {
        fetch(`/get-subcategories?category_id=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                let subcategoryDropdown = document.getElementById('filterSubcategory-2');
                subcategoryDropdown.innerHTML = '<option value="">Select Subcategory</option>';

                data.subcategories.forEach(subcategory => {
                    subcategoryDropdown.innerHTML += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                });
            })
            .catch(error => console.error('Error:', error));
    }
});
</script>

</body>

</html>