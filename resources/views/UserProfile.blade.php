<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ecommerce-Client-Side</title>
    <!-- CSS Files -->
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

    <!-- Required for Bootstrap Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</head>

<body style="font-family: 'Open Sans', sans-serif;background: #f5f5f5;">
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
                        <li class="nav-item"><a class="nav-link"href="{{ route('Clothing') }}"  style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('PrivacyPolicy') }}"  style="color:var(--bs-gray-dark);font-size:13px;">MORE</a></li>
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
                                        <div id="viewAll" class="end-box p-3" style="background:rgba(215,172,75,0.1);  color: #d7ac4b;       font-weight: bold;" href="UserProfile.html#notifications"><span>View All Notifications</span></div>
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
    <div style="margin-top: 120px;">
        <div class="container mt-3 mb-5">
            <div class="row">
                <div class="col-md-3" id="left-sidebar">
                    <div class="my-account-section pt-3" style="font-family: 'Open Sans', sans-serif;"><a class="list-group-item list-group-item-action active" href="#profile" onclick="showSection(event, &#39;profile&#39;)" style="font-weight: bold;border-bottom: 0.5px solid rgba(33,37,41,0.1) ;"><i class="fa fa-user p-3" style="font-size: 18px;color: rgb(215,172,75);"></i>My Account</a>
                        <ul class="list-unstyled ps-5 pt-3">
                            <li class="pb-2"><a class="list-group-item list-group-item-action" href="#profile" onclick="showSection(event, &#39;profile&#39;)" style="text-align: left;">Profile</a></li>
                            <li class="pb-2"><a class="list-group-item list-group-item-action" href="#addresses" onclick="showSection(event, &#39;addresses&#39;)" style="text-align: left;">Addresses</a></li>
                            <li class="pb-2"><a class="list-group-item list-group-item-action" href="#passwords" onclick="showSection(event, &#39;passwords&#39;)">Change Password</a></li>
                        </ul>
                    </div>
                    <div class="other-lists pb-3"><a class="list-group-item list-group-item-action" href="#my-purchases" onclick="showSection(event, &#39;my-purchases&#39;)" style="border-top: 0.5px solid rgba(33,37,41,0.1) ;border-bottom: 0.5px solid rgba(33,37,41,0.1) ;"><i class="fa fa-cart-arrow-down p-3" style="font-size: 18px;color: rgb(215,172,75);"></i>My Purchase</a><a class="list-group-item list-group-item-action" href="#notifications" onclick="showSection(event, &#39;notifications&#39;)" style="border-bottom: 0.5px solid rgba(33,37,41,0.1) ;"><i class="fa fa-bell p-3" style="font-size: 18px;color: rgb(215,172,75);"></i>Notifications</a><a class="list-group-item list-group-item-action" href="#badges" onclick="showSection(event, &#39;badges&#39;)" style="border-bottom: 0.5px none rgba(33,37,41,0.1) ;"><i class="fa fa-star p-3" style="font-size: 18px;color: rgb(215,172,75);"></i>Earned Badges</a></div>
                </div>
                <div class="col offset-xxl-0 cold-md-9" style="background: var(--bs-light);">
                    <div id="profile" class="p-3 profile-section">
                        <h4 class="pt-3" style="font-size: 16px;font-weight: bold;">My Profile</h4>
                        <p style="font-size: 14px;color: rgba(33,37,41,0.7);">Manage and Protect your account</p>
                        <form class="ps-1 pt-2" style="font-size: 14px;">
                            <div class="d-flex justify-content-between mb-3 gap-3"><label class="form-label">Username</label>
                                <p>karylle_031</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3 gap-3"><label class="form-label">Name</label><input class="form-control" type="text" value="karylle" style="width: 50%;"></div>
                            <div class="d-flex justify-content-between mb-3 gap-3"><label class="form-label">Email</label>
                                <p class="d-flex gap-3"><span id="emailContent" class="email-editable">do***********@gmail.com</span><a class="text-decoration-none" id="emailToggle" href="#" onclick="toggleEdit(event, &#39;email&#39;)" style="font-size: 12px;">Change</a></p>
                            </div>
                            <div class="d-flex justify-content-between mb-3 gap-3"><label class="form-label">Phone Number</label>
                                <p class="d-flex gap-3"><span id="phoneContent" class="email-editable">********09</span><a class="text-decoration-none" id="phoneToggle" href="#" onclick="toggleEdit(event, &#39;phone&#39;)" style="font-size: 12px;">Change</a></p>
                            </div>
                            <div class="d-flex justify-content-between mb-3 gap-3"><label class="form-label">Gender</label>
                                <div class="d-flex gap-2">
                                    <div class="form-check d-flex gap-2" id="male" name="gender"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Male</label></div>
                                    <div class="form-check d-flex gap-2" id="female" name="gender"><input class="form-check-input d-flex gap-2" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Female</label></div>
                                    <div class="form-check d-flex gap-2" id="Other" name="gender"><input class="form-check-input" type="radio" id="formCheck-3"><label class="form-check-label" for="formCheck-3">Other</label></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-3"><label class="form-label">Date of Birth</label>
                                <div class="d-flex"><select class="form-select me-2" style="border-radius: 3px;font-size: 12px;">
                                        <option value="Date" selected="">Date</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="5">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="19">18</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="Date">Date</option>
                                    </select><select class="form-select me-2" style="border-radius: 3px;font-size: 12px;">
                                        <option value="Date" selected="">Month</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="5">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select><select class="form-select me-2" style="border-radius: 3px;font-size: 12px;">
                                        <option value="Year" selected="">Year</option>
                                        <option value="2025">2025</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1994">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                    </select></div>
                            </div><a class="btn checkout-btn float-end mb-3" role="button" style="border-radius: 3px;font-size: 14px;padding: 10px 30px;" data-bs-toggle="modal" data-bs-target="#savedEditSucess">Save</a>
                        </form>
                    </div>
                    <div id="passwords" class="p-3 profile-section" style="display: none;">
                        <h4 class="pt-3" style="font-size: 16px;font-weight: bold;">Change Password</h4>
                        <p style="font-size: 14px;color: rgba(33,37,41,0.7);">Update your account security</p>
                        <form class="ps-1 pt-2" style="font-size: 14px;">
                            <div class="mb-3 gap-3"><label class="form-label">Current Password</label><input class="form-control" type="password" style="border-radius: 3px;"></div>
                            <div class="mb-3 gap-3"><label class="form-label">New Password</label><input class="form-control" type="password" style="border-radius: 3px;"></div>
                            <div class="mb-3 gap-3"><label class="form-label">Confirm Password</label><input class="form-control" type="password" style="border-radius: 3px;"></div><a class="btn checkout-btn float-end mb-3" role="button" style="border-radius: 3px;font-size: 14px;padding: 10px 30px;" href="#" data-bs-target="#updatePasswordSucess" data-bs-toggle="modal">Save</a>
                        </form>
                    </div>
                    <div id="addresses" class="p-3 profile-section" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center pb-3">
                            <h4 class="pt-3" style="font-size:16px;font-weight:bold;">My Addresses</h4><button class="btn btn-primary" id="addAddressBtn" type="button" style="border-radius:3px;background:#d7ac4b;font-size:14px;border-style:none;" data-bs-toggle="modal" data-bs-target="#addressModal"><i class="fa fa-plus p-2"></i>Add Address</button>
                        </div>
                        <div class="mt-3" style="font-size:14px;">
                            <div class="card-body-address">
                                <h6 class="fw-bold pb-2">Address</h6>
                                <div class="pb-3 mb-3 border-bottom address-block" data-fname="Karylle" data-phone="(+63) 903 483 449" data-street="Central 2, Abuyog" data-city="Abuyog, Sorsogon City" data-province="Sorsogon" data-region="South Luzon" data-zip="4700" data-lname="Dolly">
                                    <h6 class="fw-bold">Karylle Dolly&nbsp;<span class="text-muted">(+63) 903 483 449</span></h6>
                                    <p class="mb-1">Central 2, Abuyog</p>
                                    <p class="mb-1">Abuyog, Sorsogon City, Sorsogon, South Luzon,&nbsp;<span>4700</span></p>
                                    <div class="d-flex justify-content-end align-items-center mt-3"><a class="text-decoration-none action-links edit-address me-2" data-bs-toggle="modal" data-bs-target="#editAddressModal" style="cursor: pointer;">Edit</a><button class="btn btn-outline-secondary btn-custom" type="button">Set as Default</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="notifications" class="p-3 notification-container profile-section" style="display: none;">
                        <div class="notif-top-bar" style="border-bottom: 0.8px solid rgba(33,37,41,0.1) ;"><a class="text-decoration-none d-flex justify-content-end" href="#" style="padding: 10px;color: #d7ac4b;font-size: 14px;">Mark all as Read</a></div>
                        <div class="d-flex align-items-center notification mb-2" style="padding:15px;border-top-width:0.8px;border-top-color:rgba(33,37,41,0.1);border-bottom:0.8px solid rgba(33,37,41,0.1); flex-wrap: wrap;"><img class="object-fit-cover" style="width:60px;height:60px;margin-right:15px;" src="assets/img/3.png">
                            <div class="notification-content">
                                <p><strong>Order Completed</strong></p>
                                <p>Order&nbsp;<span style="font-weight:bold;">2502024FYRQUJH</span>&nbsp;is completed. Your feedback matters!</p>
                                <p style="font-size:12px;color:var(--bs-secondary);">02/14/2025&nbsp;<span>08:30</span></p>
                            </div><a class="btn mt-2 view-details-btn" role="button" style="background:rgba(215,172,75,0.6);border-radius:3px;color:white;font-size:12px; padding: 8px 12px; cursor: pointer;" href="Notif-View-Details.html">View Details</a>
                        </div>
                    </div>
                    <div id="my-purchases" class="p-3 profile-section" style="display: none;">
                        <div class="container mt-4">
                            <ul class="nav nav-tabs" id="purchaseTabs" style="background:var(--bs-white);">
                                <li class="nav-item"><a class="nav-link active" data-category="all" href="all" style="border-radius:0px;border-style:none;">All</a></li>
                                <li class="nav-item"><a class="nav-link" data-category="to-deliver" href="to-deliver" style="border-radius:0px;border-style:none;">To Deliver</a></li>
                                <li class="nav-item"><a class="nav-link" data-category="to-receive" href="to-receive" style="border-radius:0px;border-style:none;">To Receive</a></li>
                                <li class="nav-item"><a class="nav-link" data-category="completed" href="completed" style="border-radius:0px;border-style:none;">Completed</a></li>
                                <li class="nav-item"><a class="nav-link" data-category="cancelled" href="cancelled" style="border-radius:0px;border-style:none;">Cancelled</a></li>
                            </ul>
                            
                            <div id="all" class="tab-content-div" style="display: none;">
                                <div id="search-bar-main" class="search-div m-3" style="font-family: 'Open Sans', sans-serif;">
                                    <div class="main-search" style="border: 0.8px solid rgba(33,37,41,0.3) ;"><i class="fa fa-search"></i><input type="text" placeholder="Search here..."><button class="btn" type="button">Go</button></div>
                                </div>
                                <!--
                                
                                <div class="p-2 mb-2" style="border-bottom-width: 0.8px;border-bottom-color: rgba(33,37,41,0.1);">
                                    <div class="d-flex justify-content-end">
                                        <h6 style="font-size: 14px;color: #d7ac4b;">Completed</h6>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/1.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/5.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                            <p class="d-flex justify-content-end"><span>2&nbsp;</span>Items</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center p-2 order-total" style="border-top: 0.8px solid rgba(33,37,41,0.1);border-bottom: 0.8px dashed rgba(33,37,41,0.1);">
                                        <p class="p-2 pt-0 pb-0 mb-0" style="font-size: 12px;color: var(--bs-black);">Order Total:&nbsp;<span>₱100</span></p><button class="btn" type="button" style="padding: 8px 16px;width: 80px;height: 40px;border-radius: 3px;background: #d7ac4b;border-style: none;border-top-style: none;color: var(--bs-light);" data-bs-toggle="modal" data-bs-target="#toRateModal">Rate</button>
                                    </div>
                                </div>
                                -->

                                
                                <div class="p-2 mb-2" style="border-bottom-width: 0.8px;border-bottom-color: rgba(33,37,41,0.1);">
                                    <div class="d-flex justify-content-end">
                                        <h6 style="font-size: 14px;color: #d7ac4b;">Cancelled</h6>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/1.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/5.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                            <p class="d-flex justify-content-end"><span>2&nbsp;</span>Items</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center p-2 order-total" style="border-top: 0.8px solid rgba(33,37,41,0.1) ;border-bottom: 0.8px dashed rgba(33,37,41,0.1) ;">
                                        <p class="p-2 pt-0 pb-0 mb-0" style="font-size: 12px;color: var(--bs-black);">Order Total:&nbsp;<span>₱100</span></p>
                                    </div>
                                </div>
                            </div>
                            <div id="to-deliver" class="tab-content-div" style="background: var(--bs-light); display: none;">
                                <div class="p-2 mb-2" style="border-bottom-width: 0.8px;border-bottom-color: rgba(33,37,41,0.1);">
                                    <div class="d-flex justify-content-end p-3" style="display: none;">
                                        <h6 style="font-size: 14px;color: #d7ac4b;">To deliver</h6>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/1.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/5.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                            <p class="d-flex justify-content-end"><span>2&nbsp;</span>Items</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between" style="color: rgba(33,37,41,0.7);font-size: 12px;">
                                        <p>Order ID</p>
                                        <p>UKAY23058294</p>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center p-2 order-total gap-2" style="border-top: 0.8px solid rgba(33,37,41,0.1);border-bottom: 0.8px dashed rgba(33,37,41,0.1);"><a class="btn btn-primary" role="button" style="padding: 8px 20px;border-radius: 2px; font-size; 16px;background: #d7ac4b;border-style: none;font-size: 14px;" onclick="toggleTrackDetails()">View Details</a>
                                        <p class="p-2 pt-0 pb-0 mb-0" style="font-size: 12px;color: var(--bs-black);">Order Total:&nbsp;<span style="font-size: 18px;">₱100</span></p>
                                    </div>
                                </div>
                                <div id="details-abc" class="track-details-abc m-2">
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <h5 style="color: var(--bs-secondary);font-size: 14px;">Payment Method</h5>
                                            <h5 style="font-size: 14px;">COD</h5>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h5 style="color: var(--bs-secondary);font-size: 14px;">Delivery Method</h5>
                                            <h5 style="font-size: 14px;">Meet-Up</h5>
                                        </div><a class="text-decoration-none" href="E-Invoice.html">
                                            <h5 class="d-flex justify-content-end" style="cursor: pointer;color: #d7ac4b;font-size: 14px;">See e-invoice</h5>
                                        </a>
                                    </div>
                                    <h5>Order Tracking</h5>
                                    <div class="d-flex flex-wrap p-2">
                                        <div class="d-flex tracking-item active gap-3 p-2">
                                            <div class="circle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color:red;">
                
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"></path>
            </svg></div>
                                            <div class="track-content">
                                                <p class="track-title" style="margin-bottom:0px;font-weight:bold;">Delivered</p>
                                                <p class="track-date" style="margin-bottom:0px;color:var(--bs-secondary);">03/15/2025&nbsp;<span>&nbsp;10:00</span></p>
                                            </div>
                                        </div>
                                        <div class="d-flex tracking-item active gap-3 p-2">
                                            <div class="circle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color:black;">
                
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"></path>
            </svg></div>
                                            <div class="track-content">
                                                <p class="track-title" style="margin-bottom:0px;font-weight:bold;">Out for Delivery</p>
                                                <p class="track-date" style="margin-bottom:0px;color:var(--bs-secondary);">03/15/2025&nbsp;<span>&nbsp;10:00</span></p>
                                            </div>
                                        </div>
                                        <div class="d-flex tracking-item active gap-3 p-2">
                                            <div class="circle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color:black;">
                
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"></path>
            </svg></div>
                                            <div class="track-content">
                                                <p class="track-title" style="margin-bottom:0px;font-weight:bold;">Order Processing</p>
                                                <p class="track-date" style="margin-bottom:0px;color:var(--bs-secondary);">03/15/2025&nbsp;<span>&nbsp;10:00</span></p>
                                            </div>
                                        </div>
                                        <div class="d-flex tracking-item active gap-3 p-2">
                                            <div class="circle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color:black;">
                
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"></path>
            </svg></div>
                                            <div class="track-content">
                                                <p class="track-title" style="margin-bottom:0px;font-weight:bold;">Order Confirmation</p>
                                                <p class="track-date" style="margin-bottom:0px;color:var(--bs-secondary);">03/15/2025&nbsp;<span>&nbsp;10:00</span></p>
                                            </div>
                                        </div>
                                        <div class="d-flex tracking-item active gap-3 p-2">
                                            <div class="circle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color:black;">
                
                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"></path>
            </svg></div>
                                            <div class="track-content">
                                                <p class="track-title" style="margin-bottom:0px;font-weight:bold;">Order Placed</p>
                                                <p class="track-date" style="margin-bottom:0px;color:var(--bs-secondary);">03/15/2025&nbsp;<span>&nbsp;10:00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="to-receive" class="tab-content-div" style="background: var(--bs-light); display: none;">
                                <div class="p-2 mb-2" style="border-bottom-width: 0.8px;border-bottom-color: rgba(33,37,41,0.1);">
                                    <div class="d-flex justify-content-end p-3">
                                        <h6 style="font-size: 14px;color: #d7ac4b;">To receive</h6>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/1.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/5.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                            <p class="d-flex justify-content-end"><span>2&nbsp;</span>Items</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between" style="color: rgba(33,37,41,0.7);font-size: 12px;">
                                        <p>Order ID</p>
                                        <p>UKAY23058294</p>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center p-2 order-total gap-2" style="border-top: 0.8px solid rgba(33,37,41,0.1) ;border-bottom: 0.8px dashed rgba(33,37,41,0.1) ;"><a class="btn btn-primary" role="button" style="background: #d7ac4b;border-style: none;font-size: 14px;padding: 8px 20px;border-radius: 2px;" href="Notif-View-Details.html">Order Received</a>
                                        <p class="p-2 pt-0 pb-0 mb-0" style="font-size: 12px;color: var(--bs-black);">Order Total:&nbsp;<span>₱100</span></p>
                                    </div>
                                </div>
                            </div>


                         <!-- Display for Completed -->
                        <div id="completed" class="tab-content-div" style="display: none;">
                            <div class="p-2 mb-2" style="border-bottom-width: 0.8px; border-bottom-color: rgba(33,37,41,0.1);">
                                <div class="d-flex justify-content-end p-3">
                                    <h6 style="font-size: 14px; color: #d7ac4b;">Completed</h6>
                                </div>

                                @if($completedOrders->isEmpty())
                                    <p>No completed orders found.</p>
                                @else
                                    @foreach($completedOrders as $order)
                                        @foreach($order->orderItems as $orderItem)
                                            <div class="d-flex align-items-center purchase mb-2" style="padding: 15px; border-top-width: 0.8px; border-top-color: rgba(33,37,41,0.1); border-bottom: 0.8px none rgba(33,37,41,0.1);">
                                                <img class="object-fit-cover" style="width: 60px; height: 60px; margin-right: 15px;" src="{{ asset($orderItem->product->image ?? 'assets/img/default.png') }}">
                                                <div class="all-content">
                                                    <p><strong>{{ $orderItem->product->name ?? 'Product Not Available' }}</strong></p>
                                                    <p>{{ $orderItem->product->size ?? 'N/A' }}</p>
                                                    <p class="mb-2" style="text-align: right;">₱{{ $orderItem->product->price ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                        <!-- Total Items Count -->
                                        <p class="d-flex justify-content-end" style="padding: 0 15px; font-size: 14px;">
                                            <span>{{ count($order->orderItems) }}</span>&nbsp;
                                            {{ count($order->orderItems) === 1 ? 'Item' : 'Items' }}
                                        </p>


                                        <!-- Rate Button -->
                                        <div class="d-flex justify-content-end align-items-center p-2 order-total gap-2" style="border-top: 0.8px solid rgba(33,37,41,0.1); border-bottom: 0.8px dashed rgba(33,37,41,0.1);">
                                            <p class="p-2 pt-0 pb-0 mb-0" style="font-size: 12px; color: var(--bs-black);">
                                                Order Total:&nbsp;<span>₱{{ $order->total_price ?? 'N/A' }}</span>
                                            </p>
                                            <button class="btn" type="button"
                                                    style="padding: 8px 20px; width: 80px; height: 40px; border-radius: 2px; background: #d7ac4b; border-style: none; color: var(--bs-light);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#toRateModal-{{ $order->id }}">Rate</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                       

                            <div id="cancelled" class="tab-content-div" style="display: none;">
                                <div class="p-2 mb-2" style="border-bottom-width: 0.8px;border-bottom-color: rgba(33,37,41,0.1);">
                                    <div class="d-flex justify-content-end p-3">
                                        <h6 style="font-size: 14px;color: #d7ac4b;">Cancelled</h6>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/1.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center purchase mb-2" style="padding: 15px;border-top-width: 0.8px;border-top-color: rgba(33,37,41,0.1);border-bottom: 0.8px none rgba(33,37,41,0.1) ;"><img class="object-fit-cover" style="width: 60px;height: 60px;margin-right: 15px;" src="assets/img/5.png">
                                        <div class="all-content">
                                            <p><strong>Rose Jeans Shirt</strong></p>
                                            <p>Small, Black</p>
                                            <p class="mb-2" style="text-align: right;">₱50</p>
                                            <p class="d-flex justify-content-end"><span>2&nbsp;</span>Items</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center p-2 order-total" style="border-top: 0.8px solid rgba(33,37,41,0.1) ;border-bottom: 0.8px dashed rgba(33,37,41,0.1) ;">
                                        <p class="p-2 pt-0 pb-0 mb-0" style="font-size: 12px;color: var(--bs-black);">Order Total:&nbsp;<span>₱100</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="badges" class="profile-section p-3" style="display: none;">
                        <div>
                            <h3 class="d-flex justify-content-center" style="padding: 15px;color: var(--bs-secondary);font-size: 18px;">Coming Soon..</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
    
<!--Rating Modal-->
@foreach($completedOrders as $order)
<div class="modal fade modal-xl" role="dialog" tabindex="-1" id="toRateModal-{{ $order->id }}" style="padding: 30px 30px 0;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable scr" role="document">
        <div class="modal-content">
            <div class="main-review-rate-form">
                <div class="modal-header">
                    <h4 class="modal-title">Rate and Review</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="overflow-y: auto;">
                    <form action="{{ route('order.rate', ['orderId' => $order->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="review-main-body">
                            @foreach($order->orderItems as $orderItem)
                            <div class="review-rate-popup" style="padding: 10px 0px 0px;">
                                <div class="review-rate-img">
                                    <img alt="{{ $orderItem->product->name ?? 'Product Image' }}" src="{{ asset($orderItem->product->image ?? 'assets/img/default.png') }}" width="56" height="56">
                                </div>
                                <div class="review-rate-title">
                                    <p>{{ $orderItem->product->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            @endforeach

                            <div style="margin: 20px 0px;">
                                <div class="product-quality">
                                    <div class="product-quality-title">
                                        <h5>Product Quality</h5>
                                    </div>
                                    <div style="padding-left: 5px; display: flex; align-items: center;">
                                        @for ($i = 1; $i <= 5; $i++)
                                        <div style="position: relative; width: 26px; height: 26px;">
                                            <label>
                                                <input type="radio" name="product_quality_rating_{{ $order->id }}" value="{{ $i }}" class="visually-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor" style="color: #d7ac4b;width: 26px;height: 26px;">
                                                    <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                                                </svg>
                                            </label>
                                        </div>
                                        @endfor
                                        <span style="margin-left: 5px; color: #d7ac4b; min-width: 100px; font-size: 14px;">&nbsp;Amazing</span>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-box-main" style="background: rgba(215,172,75,0.1);">
                                <div class="comment-box">
                                    <div class="comment">
                                        <div class="comment-title">
                                            <h6>Review</h6>
                                            <textarea class="comment-text" name="comment_{{ $order->id }}" placeholder="Share your thoughts on the product"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="upload-box">
                                    <label class="d-flex align-items-center custom-upload">
                                        <i class="fa fa-camera" style="color: var(--bs-danger);"></i>
                                        <span style="font-size: 10px;font-weight: 400;line-height: 14px;margin-left: 6px;color: var(--bs-danger);">Upload a photo</span>
                                        <input type="file" class="hidden-file-input"  name="review_images_{{ $order->id }}[]" multiple accept="image/*" onchange="previewImages(event)">
                                    </label>
                                    <div id="image-preview-abc"></div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center username-wrapper">
                                <div class="form-check">
                                    <input type="hidden" name="show_username_{{ $order->id }}" value="0">
                                    <input class="form-check-input" type="checkbox" name="show_username_{{ $order->id }}" id="formCheck-{{ $order->id }}" value="1" {{ old("show_username_{$order->id}", 0) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="formCheck-{{ $order->id }}"></label>
                                </div>
                                <div style="margin-left: 4px;">
                                    <div class="username-hint">
                                        <h6 style="color: var(--bs-secondary);">Show Username on your review</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5 style="font-size: 16px;">About Service</h5>
                            </div>

                            <div class="about-service-list">
                                <div class="seller-service-box" style="margin-top: 15px;">
                                    <div class="seller-service">
                                        <h5>Seller Service</h5>
                                    </div>
                                    <div style="padding-left: 5px; display: flex; align-items: center;">
                                        @for ($i = 1; $i <= 5; $i++)
                                        <div style="position: relative; width: 26px; height: 26px;">
                                            <label>
                                                <input type="radio" name="seller_service_rating_{{ $order->id }}" value="{{ $i }}" class="visually-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor" style="color: #d7ac4b;width: 26px;height: 26px;">
                                                    <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                                                </svg>

                                            </label>
                                        </div>
                                        @endfor
                                        <span style="margin-left: 5px; color: #d7ac4b; min-width: 100px; font-size: 14px;">&nbsp;Amazing</span>
                                    </div>
                                </div>

                                <div class="seller-service-box" style="margin-top: 15px;">
                                    <div class="seller-service">
                                        <h5>Delivery Service</h5>
                                    </div>
                                    <div style="padding-left: 5px; display: flex; align-items: center;">
                                        @for ($i = 1; $i <= 5; $i++)
                                        <div style="position: relative; width: 26px; height: 26px;">
                                            <label>
                                                <input type="radio" name="delivery_service_rating_{{ $order->id }}" value="{{ $i }}" class="visually-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor" style="color: #d7ac4b;width: 26px;height: 26px;">
                                                    <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"></path>
                                                </svg>
                                            </label>
                                        </div>
                                        @endfor
                                        <span style="margin-left: 5px; color: #d7ac4b; min-width: 100px; font-size: 14px;">&nbsp;Amazing</span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-light" type="button" data-bs-dismiss="modal" style="border-radius: 3px;padding: 8px 20px;">Cancel</button>
                                <button class="btn btn-primary" type="submit" style="border-radius: 3px;background: #d7ac4b;border-style: none;padding: 8px 20px;">Submit</button>
                            </div>       
                        </div>
                    </form>
                </div> <!-- /.modal-body -->
            </div> <!-- /.main-review-rate-form -->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endforeach


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
    <div class="modal fade" role="dialog" tabindex="-1" id="savedEditSucess">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="width:50px;height:50px;color:#d7ac4b;">
        <path d="M10.2426 16.3137L6 12.071L7.41421 10.6568L10.2426 13.4853L15.8995 7.8284L17.3137 9.24262L10.2426 16.3137Z" fill="currentColor"></path>
        <path fill-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z" fill="currentColor"></path>
    </svg>
                    <p class="mt-3" style="margin: 5px 0;text-align: center;font-size: 16px;">Your updates have been saved successfully.</p>
                    <p style="margin: 5px 0;text-align: center;font-size: 14px;">We appreciate you keeping your information up to date!</p>
                </div>
                <div class="modal-footer"><a class="btn" role="button" data-bs-dismiss="modal" href="UserProfile.html" style="border-radius: 3px;border-style: none;border-color: #d7ac4b;background: #d7ac4b;color: var(--bs-light);padding: 8px 20px;">Okay</a></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="addressModal" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3" id="addressForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressModalLabel">Add Address</h5><button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body"><input type="hidden" id="editIndex">
                    <div class="row g-3">
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">First Name</label><input type="text" id="editFName-1" class="form-control" placeholder="First Name"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Last Name</label><input type="text" id="editLName-1" class="form-control" placeholder="Last Name"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Phone Number</label><input type="text" id="editPhone-1" class="form-control" placeholder="Phone"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Street</label><input type="text" id="editStreet-1" class="form-control" placeholder="Street"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">City</label><input type="text" id="editCity-1" class="form-control" placeholder="City"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Province</label><input type="text" id="editProvince-1" class="form-control" placeholder="Province"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Region</label><input type="text" id="editRegion-1" class="form-control" placeholder="Region"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Zip Code</label><input type="text" id="editZip-1" class="form-control" placeholder="Zip Code"></div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-success" type="submit" style="border-radius: 3px;background: #d7ac4b;border-style: none;" data-bs-target="#addAddressSuccess" data-bs-toggle="modal">Add Address</button><button class="btn" data-bs-dismiss="modal" type="button" style="border-radius: 3px;border-style: solid;border-color: #d7ac4b;">Cancel</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="editAddressModal" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Address</h5><button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">First Name</label><input type="text" id="editFName" class="form-control" placeholder="First Name"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Last Name</label><input type="text" id="editLName" class="form-control" placeholder="Last Name"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Phone Number</label><input type="text" id="editPhone" class="form-control" placeholder="Phone"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Street</label><input type="text" id="editStreet" class="form-control" placeholder="Street"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">City</label><input type="text" id="editCity" class="form-control" placeholder="City"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Province</label><input type="text" id="editProvince" class="form-control" placeholder="Province"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Region</label><input type="text" id="editRegion" class="form-control" placeholder="Region"></div>
                        <div class="col-6"><label class="form-label" style="font-size: 12px;">Zip Code</label><input type="text" id="editZip" class="form-control" placeholder="Zip Code"></div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-success" type="submit" style="border-radius: 3px;background: #d7ac4b;border-style: none;" data-bs-target="#savedEditSucess" data-bs-toggle="modal">Save Edit</button><button class="btn" data-bs-dismiss="modal" type="button" style="border-radius: 3px;border-style: solid;border-color: #d7ac4b;">Cancel</button></div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" role="dialog" tabindex="-1" id="review-thank-you" style="text-align: center;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-center align-items-center"><i class="far fa-heart" style="font-size: 50px;width: 60px;padding: 5px;color: #d7ac4b;"></i>
                        <p class="m-0 p-1" style="font-size: 16px;font-weight: bold;">Thank you for your feedback!</p>
                        <p style="font-size: 12px;">We truly appreciate you taking the time to share your thoughts with us.&nbsp;Your feedback helps us improve our services and ensures we continue to meet your expectations.</p>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="addAddressSuccess">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-center align-items-center"><i class="far fa-check-circle" style="font-size: 50px;padding: 5px;color: #d7ac4b;"></i>
                        <h2 class="m-0 p-1" style="font-size: 16px;">Address Successfully Added!</h2>
                        <p class="m-0 p-1" style="text-align: center;font-size: 12px;">Your address has been saved successfully. You can now use it for future orders or deliveries.</p>
                        <p class="p-1" style="text-align: center;font-size: 12px;">If you need to update your address later, you can do so from your account settings.</p>
                    </div>
                </div>
                <div class="modal-footer"><a class="btn btn-primary" role="button" style="border-radius: 3px;background: #d7ac4b;border-style: none;" href="UserProfile.html">Okay</a></div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" role="dialog" tabindex="-1" id="updatePasswordSucess">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-center align-items-center"><i class="far fa-check-circle" style="font-size: 50px;padding: 5px;color: #d7ac4b;"></i>
                        <h2 class="m-0 p-1" style="font-size: 16px;">Password updated successfully!</h2>
                        <p class="m-0 p-1" style="text-align: center;font-size: 12px;">You're all set. Don't forget to keep your password safe</p>
                    </div>
                </div>
                <div class="modal-footer"><a class="btn btn-primary" role="button" style="border-radius: 3px;background: #d7ac4b;border-style: none;" href="UserProfile.html">Okay</a></div>
            </div>
        </div>
    </div>

    <script>
    window.addEventListener('load', function () {
        const rateAdded = @json(session('rate_added'));
        if (rateAdded) {
            const modal = new bootstrap.Modal(document.getElementById('review-thank-you'));
            modal.show();
        }
    });
</script>




    <!-- JS Files -->
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
    document.addEventListener('DOMContentLoaded', function () {
        // Get all radio inputs inside rating widgets
        const ratingInputs = document.querySelectorAll('input[type="radio"]');

        ratingInputs.forEach(input => {
            input.addEventListener('change', function () {
                const name = this.name; // e.g., product_quality_rating_5
                const allInGroup = document.querySelectorAll(`input[name="${name}"]`);

                allInGroup.forEach(star => {
                    const svg = star.nextElementSibling;
                    if (star.checked || parseInt(star.value) <= parseInt(this.value)) {
                        svg.style.color = '#ffc107'; // highlighted star
                    } else {
                        svg.style.color = '#d7ac4b'; // default star
                    }
                });
            });
        });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ratingInputs = document.querySelectorAll('input[type="radio"]');

    ratingInputs.forEach(input => {
        input.addEventListener('change', function () {
            const name = this.name;
            const allInGroup = document.querySelectorAll(`input[name="${name}"]`);

            allInGroup.forEach(star => {
                const svg = star.nextElementSibling; // get the SVG icon
                if (star.checked || parseInt(star.value) <= parseInt(this.value)) {
                    svg.setAttribute('fill', '#ffc107'); // highlighted star
                } else {
                    svg.setAttribute('fill', '#d7ac4b'); // default star
                }
            });
        });
    });
});
</script>
    

   

    


</body>

</html>