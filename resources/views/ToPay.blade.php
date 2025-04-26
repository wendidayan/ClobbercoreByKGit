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
                        <li class="nav-item"><a class="nav-link" href="{{ route('Clothing') }}" style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="PlaceOrder.html" style="font-size:13px;padding-right:20px;">
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
    
    
    <div class="container" style="margin-top: 120px;font-family: 'Open Sans', sans-serif;">
        <div>
            <h4>Checkout</h4>
        </div>
    </div>
    <div style="font-family: 'Open Sans', sans-serif;">
        <div class="container checkout-container mt-4" style="background: var(--bs-white);border-radius: 3px;">
            <div id="addressSection" class="address-section" style="font-family: 'Open Sans', sans-serif;">
                <div>
                    <div class="d-flex align-items-center address-header gap-2 mb-3" style="border-bottom:1px solid rgb(221,221,221);"><i class="fa fa-map-marker" style="color:rgb(215, 172, 75);"></i>
                        <h5 class="d-flex">Delivery Option</h5>
                        
                    </div>
                    <div class="d-flex delivery-btn gap-4 mt-4 mb-4"><a class="btn shipping-btn" role="button" id="shippingBTN" style="border-radius:3px;" href="#">Shipping</a><a class="btn meetup-btn" role="button" id="meetupBTN" style="border-radius:3px;" href="#">Meet- Up</a><a class="btn meetup-btn" role="button" id="pickupBTN" style="border-radius:3px;" href="#">Pick- Up</a></div>
                </div>
                <div class="d-flex justify-content-between user-address mb-4 gap-2"><strong>Max Collins</strong><strong>(+63) 9389462709</strong><span class="address">510-512 Honorio Lopez Blvd, Barangay 148, Tondo I / II, Metro Manila, Metro Manila 1012</span>
                    <div class="address-actions"><a class="text-decoration-none" href="#">Change</a></div>
                </div>
                <div id="meetupDIV" style="border-top: 1px dashed #ddd;font-family: 'Open Sans', sans-serif; display: none;">
                    <div class="meetup-options">
                        <div class="meetUp-progress-bar">
                            <div id="step1" class="meetupSTEP"><span>1</span></div>
                            <div id="step2" class="meetupSTEP"><span>2</span></div>
                            <div id="step3" class="meetupSTEP"><span>3</span></div>
                        </div>
                        <div id="selectionStep" class="form-step active">
                            <h5 style="font-size: 18px;">Step 1: Selection</h5>
                            <div class="form-group"><select id="city" style="width:100%;padding:8px;border-radius:3px;border-top-left-radius:-3px;border-style:solid;border-color:rgba(108,117,125,0.3);">
                                    <option value="" selected="">Select your city</option>
                                    <option value="Sorsogon City">Sorsogon City</option>
                                    <option value="Gubat">Gubat</option>
                                    <option value="Casiguran">Casiguran</option>
                                </select><select id="landmark" style="width:100%;border-radius:3px;border-style:solid;border-color:rgba(108,117,125,0.3); padding: 8px;">
                                    <option value="" selected="">Select a nearby landmark</option>
                                    <option value="Pier">Pier</option>
                                    <option value="Savemore">Savemore</option>
                                    <option value="Capitol Park">Capitol Park</option>
                                    <option value="SM Sorsogon">SM</option>
                                    <option value="Pamana">Pamana</option>
                                </select>
                                <div id="errorMessage" style="color: red; font-size: 10px;"></div><button class="btn btn-primary" type="button" style="border-radius: 3px;background: #d7ac4b;border-style: none;padding: 10px;" onclick="validateSelection()">Next</button>
                            </div>
                        </div>
                        <div class="form-step" id="confirmationStep">
                            <h5 style="font-size: 18px;">Step 2: Confirmation</h5>
                            <p id="confirmationMessage"></p>
                            <div class="text-nowrap d-flex confirmation-buttons gap-2"><button style="background: #d7ac4b;border: 1.8px solid #d7ac4b;border-radius: 3px;color: var(--bs-light);" onclick="confirmLocation()">Yes, Confirm</button><button style="background: rgba(215,172,75,0.14);border-radius: 3px;border-style: none;" onclick="goBack()">Change Location</button></div>
                        </div>
                        <div class="form-step" id="successStep">
                            <div class="d-flex align-items-center m-0">
                                <h5 class="m-0" style="font-size: 18px;">Step 3: Success</h5><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" color="#d7ac4b">
    <path d="M10.5858 13.4142L7.75735 10.5858L6.34314 12L10.5858 16.2427L17.6568 9.1716L16.2426 7.75739L10.5858 13.4142Z" fill="currentColor"></path>
</svg>
                            </div>
                            <p id="successMessage"></p>
                        </div>
                    </div>
                </div>
                <div id="pickupDIV" class="p-4" style="border-width: 2px;border-color: var(--bs-secondary);border-top: 1px dashed #ddd ; display: none;">
                    <div>
                        <h4 style="font-size: 22px;">Thank you for choosing "<em>Pick Up</em>"<span>!</span></h4>
                        <p style="font-size: 18px;color: var(--bs-secondary);">Your order will be ready for collection at our physical store:</p>
                        <div class="d-flex flex-column flex-wrap flex-md-row gap-4 mb-3 p-3">
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex align-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" style="color:#d7ac4b;">
                <path fill-rule="evenodd" d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z" fill="currentColor"></path>
                <path fill-rule="evenodd" d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z" fill="currentColor"></path>
            </svg>
                                    <h6 class="m-0">Central 2, Abuyog</h6>
                                </div>
                                <div class="d-flex align-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" style="color:#d7ac4b;">
                <path fill-rule="evenodd" d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z" fill="currentColor"></path>
                <path fill-rule="evenodd" d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z" fill="currentColor"></path>
            </svg>
                                    <h6 class="m-0">Sorsogon City</h6>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex align-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" style="color:#d7ac4b;">
                <path d="M5.45887 2L1 6.01478L2.33826 7.50107L6.79713 3.48629L5.45887 2Z" fill="currentColor"></path>
                <path d="M11 8H13V12H16V14H11V8Z" fill="currentColor"></path>
                <path fill-rule="evenodd" d="M3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12ZM5 12C5 8.13401 8.13401 5 12 5C15.866 5 19 8.13401 19 12C19 15.866 15.866 19 12 19C8.13401 19 5 15.866 5 12Z" fill="currentColor"></path>
                <path d="M18.5411 2L23 6.01478L21.6617 7.50107L17.2029 3.48629L18.5411 2Z" fill="currentColor"></path>
            </svg>
                                    <h6 class="m-0" style="font-weight: bold;">Store Hours:</h6>
                                    <h6 class="m-0">Mon-Sun 9:00 AM - 6:00 PM</h6>
                                </div>
                                <div class="d-flex align-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none" style="color:#d7ac4b;">
                <path d="M22 12C22 10.6868 21.7413 9.38647 21.2388 8.1731C20.7362 6.95996 19.9997 5.85742 19.0711 4.92896C18.1425 4.00024 17.0401 3.26367 15.8268 2.76123C14.6136 2.25854 13.3132 2 12 2V4C13.0506 4 14.0909 4.20703 15.0615 4.60889C16.0321 5.01099 16.914 5.60034 17.6569 6.34326C18.3997 7.08594 18.989 7.96802 19.391 8.93848C19.7931 9.90918 20 10.9495 20 12H22Z" fill="currentColor"></path>
                <path d="M2 10V5C2 4.44775 2.44772 4 3 4H8C8.55228 4 9 4.44775 9 5V9C9 9.55225 8.55228 10 8 10H6C6 14.4182 9.58173 18 14 18V16C14 15.4478 14.4477 15 15 15H19C19.5523 15 20 15.4478 20 16V21C20 21.5522 19.5523 22 19 22H14C7.37259 22 2 16.6274 2 10Z" fill="currentColor"></path>
                <path d="M17.5433 9.70386C17.8448 10.4319 18 11.2122 18 12H16.2C16.2 11.4485 16.0914 10.9023 15.8803 10.3928C15.6692 9.88306 15.3599 9.42017 14.9698 9.03027C14.5798 8.64014 14.1169 8.33081 13.6073 8.11963C13.0977 7.90869 12.5515 7.80005 12 7.80005V6C12.7879 6 13.5681 6.15527 14.2961 6.45679C15.024 6.7583 15.6855 7.2002 16.2426 7.75732C16.7998 8.31445 17.2418 8.97583 17.5433 9.70386Z" fill="currentColor"></path>
            </svg>
                                    <h6 class="m-0" style="font-weight:bold;">Contact Us:</h6>
                                    <h6 class="m-0">+63 903 485 449</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="m-0" style="color: var(--bs-dark);">Please bring your&nbsp;<strong style="color: var(--bs-dark);">order confirmation</strong>&nbsp;(via messenger or screenshot of e-invoice) for a smooth pickup process.</p>
                    <p style="color: var(--bs-secondary);">If you have any questions, feel free to reach out to us!</p>
                </div>
            </div>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="order-container">
                        <div class="label-section" style="border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;">
                            <div class="order-header">
                                <h5>Products Ordered</h5>
                            </div>
                            <div class="order-header">
                                <h5 style="color: rgb(215,172,75);">Unit Price</h5>
                            </div>
                        </div>
                        <div class="wrapper-abc" style="max-height: 250px; overflow-y: auto; scroll-behavior: smooth;">
                            @php
                            $totalPrice = collect($mineItems)->sum(fn($item) => $item['price']);
                            @endphp
                            @foreach ($mineItems as $item)
                            <div class="product-order"><img class="object-fit-cover"src="{{ asset($item['image']) }}" style="width: 80px;height: 80px;">
                                <div class="order-info"></div>
                                <p>{{ $item['name'] }}</p>
                                <h5>₱&nbsp;<span>{{ number_format($item['price'], 2) }}</span></h5>
                            </div>
                            @endforeach
                        </div>
                        <div class="divider"></div>
                        <div class="d-flex justify-content-end shipping">
                            <p style="color: rgb(51, 51, 51);">Shipping Option: Standard Local - ₱<span>36</span></p>
                        </div>
                        <div class="d-flex justify-content-end align-items-center totalamount gap-5">
                            @php
                            $totalAmount = $totalPrice + 36; // Adding the shipping fee
                            @endphp
                            <h4>Order Total ({{ count($mineItems) }} item{{ count($mineItems) > 1 ? 's' : '' }}):&nbsp;</h4>
                            <h2>₱ {{ number_format($totalAmount, 2) }}</h2>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
             <div class="final-placeorder">
                <form action="{{ route('order.place') }}" method="POST">
                @csrf
                @php
                    $totalAmount = $mineItems ? collect($mineItems)->sum('price') + 36 : 36;
                @endphp
            <input type="hidden" name="amount" value="{{ $totalAmount }}">


            <!-- Payment Method Card -->
            <div class="payment-method-card mt-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="font-size: 18px;">Payment Method</h4>
                    <select name="payment_method" required style="border-radius: 3px; font-size: 14px; width: 170px; border: 0.8px solid rgba(108,117,125,0.3);">
                        <option value="" selected>Select</option>
                        <option value="cod">Cash On Delivery</option>
                        <option value="gcash">Gcash</option>
                        <option value="paymaya">Paymaya</option>
                    </select>
                </div>
            </div>

            <div style="border-top: 1px dashed #ddd;"></div>

            <!-- Order Summary -->
            <div style="margin-top: 160px;">
                <div class="sub-info mb-3">
                    <div class="d-flex justify-content-end gap-5">
                        <h6 style="font-size: 14px; color: rgb(108,117,125);">Delivery fee</h6>
                        <h6>₱ 0</h6>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-5">
                        <h6 style="font-size: 14px; color: rgb(108,117,125);">Total Payment:&nbsp;</h6>
                        <h6 style="font-size: 24px; font-weight: bold; color: red;">₱{{ number_format($totalAmount, 2) }}</h6>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn checkout-btn" type="submit" style="border-radius: 3px;">Place Order</button>
                </div>
            </div>
        </form>
    </div>
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

</body>

</html>