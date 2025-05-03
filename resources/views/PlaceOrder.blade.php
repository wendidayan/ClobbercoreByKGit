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
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
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
                <div class="collapse navbar-collapse d-md-flex justify-content-md-center justify-content-lg-end me-0 pe-0 ms-0" id="navcol-1">
                    <ul class="navbar-nav" style="border-top-style: none;">
                    <li class="nav-item"><a class="nav-link" href="{{ route('ShoppingPage') }}"  style="color:var(--bs-gray-dark);font-size:13px;">HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('Clothing') }}" style="color:var(--bs-gray-dark);font-size:13px;">COLLECTIONS</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('cart.view') }}" style="font-size:13px;padding-right:20px;">
                                <div class="notification-nav" id="notif-1"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 4H19C19.5523 4 20 4.44771 20 5V19C20 19.5523 19.5523 20 19 20H5C4.44772 20 4 19.5523 4 19V5C4 4.44772 4.44771 4 5 4ZM2 5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V5ZM12 12C9.23858 12 7 9.31371 7 6H9C9 8.56606 10.6691 10 12 10C13.3309 10 15 8.56606 15 6H17C17 9.31371 14.7614 12 12 12Z" fill="currentColor" fill-rule="evenodd"></path></svg><span class="badge" style="background:rgba(108,117,125,0.6);">{{ $cartCount }}</span>
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('UserProfile') }}" style="font-size:13px;">
                                <div class="notification-nav" id="notif-2"><svg fill="none" height="1em" style="width:20px;height:20px;color:var(--bs-dark-text-emphasis);" viewbox="0 0 24 24" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor" fill-rule="evenodd"></path><path d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor" fill-rule="evenodd"></path></svg></div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div style="margin-top: 120px;">
        <div class="container mt-3">
            <div class="row text-center text-md-start align-items-center" style="font-family: 'Open Sans', sans-serif;">
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                    <div>
                        <h4>Ukay Cart</h4>
                    </div>
                </div>
                <div class="col-md-6 text-md-end d-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end mt-2 mt-md-0" style="padding: 0px;">
                    <div class="search-bar" style="border: 0.8px solid rgba(33,37,41,0.3) ;"><i class="fa fa-search"></i><input type="text" placeholder="Search Here.."><button class="btn" type="button" onclick="performSearch()">Go</button></div>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;font-family: 'Open Sans', sans-serif;">
            <div class="container checkout-container mt-4" style="background: var(--bs-white);border-radius: 3px;">
                <div class="table-responsive table p-2">
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="select-all-checkbox"></th>
                                <th>Product</th>
                                <th style="background:rgba(215, 172, 75, 0.14);">Unit Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                        @foreach($cartItems as $cartItem)
                            <tr style="font-size: 14px;">
                                <td><input type="checkbox" class="cart-item-checkbox" data-cart-id="{{ $cartItem->id }}"></td>
                                <td class="product-cart-info">
                                    <div class="product-wrapper" style="margin: 5px;"><img class="object-fit-cover cart-image" src="{{ $cartItem->product->image }}" width="50px" height="50px"><span class="text-break cart-abc" style="margin-left: 20px;text-align: left;">{{ $cartItem->product->name }}</span></div>
                                </td>
                                <td>
                                    <h6>₱<span>{{ number_format($cartItem->price, 2) }}</span></h6>
                                </td>
                                <td>
                                    <h6>1</h6>
                                </td>
                                <td><button  class="btn delete-btn" type="button" style="color: var(--bs-light);font-size: 18px;" data-id="{{ $cartItem->id }}" data-bs-toggle="modal" data-bs-target="#toDeleteItem"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: var(--bs-danger);">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. -->
                                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                        </svg></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between checkout-footer">
                    <div class="voucher-section"><span style="margin-right: 10px;">Platform Discount</span><a href="#">Select or Enter Code</a></div>
                    <div class="bottom-section" style="border-top: 2px dashed #f0f0f0 ;">
                        <div class="actions"><input type="checkbox" class="select-all-checkbox">
                            <h4 style="font-size: 16px;">Select All</h4>
                        </div>
                        <div class="checkout-section">
                        <h4 style="font-size: 16px;">
                            Total (<span id="total-checked-items" style="font-size: 16px; color: inherit;"> 0</span> <span id="item-text" style="font-size: 16px; color: inherit;" >item</span>):&nbsp;
                            <span id="total-price-amount">₱0.00</span>
                        </h4>
                            <form action="{{ route('cart.placeOrder') }}" method="POST" id="place-order-form">
                            @csrf
                            <button type="submit" class="btn checkout-btn" style="border-radius: 3px;">CheckOut</button>
                        </form>
                       
                        @if(session('success'))
                        <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
                        @endif


                        @if(session('error'))
                            <div id="error-alert" class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="toDeleteItem">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <p style="font-size: 18px; padding: 10px;">Are you sure you want to remove this item from your cart?</p>
                </div>
                <div class="modal-footer"><button class="btn" type="button" data-bs-dismiss="modal" style="border-radius: 3px;background: #d7ac4b;border-style: none;border-color: #d7ac4b;color: var(--bs-light);">Keep It</button>
                <form id="delete-form" method="POST">
                                    @csrf
                                    @method('DELETE')
                <button class="btn" type="submit" style="border-radius: 3px;border-style: solid;border-color: #d7ac4b;">Remove</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div id="deleteItem" class="modal fade custom-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: 100%;">
                <div class="modal-header"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body custom-body">
                    <div class="success-message"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
            <circle class="checkmark-circle-1" cx="26" cy="26" r="16" fill="none"></circle>
            <path class="checkmark-check-1" fill="none" d="M16.1 28.2l7.1 5.1 10.7-12.8"></path>
        </svg>
                        <p class="success-text">Item successfully deleted.</p>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
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
    const deleteForm = document.getElementById('delete-form');

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const cartItemId = this.getAttribute('data-id');
                deleteForm.action = `/cart/remove/${cartItemId}`; // this sets the correct URL
            });
        });
    </script>

    <!-- will display the modals-->
    <script>
            window.addEventListener('load', function () {
                @if(session('cart_deleted'))
                    new bootstrap.Modal(document.getElementById('deleteItem')).show();
                @endif
            });
    </script>


    <script>
    // Auto-hide alert messages after 3 seconds
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        });
    }, 3000);


    // Select all checkbox functionality
    document.querySelectorAll('.select-all-checkbox').forEach(selectAll => {
            selectAll.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.cart-item-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });


                // Ensure both "Select All" checkboxes stay in sync
                document.querySelectorAll('.select-all-checkbox').forEach(otherCheckbox => {
                    if (otherCheckbox !== this) {
                        otherCheckbox.checked = this.checked;
                    }
                });


                updateTotal();
                updateSelectedCartItems();
            });
        });
    // Listen for individual item checkboxes being checked or unchecked
    document.querySelectorAll('.cart-item-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateTotal();
            updateSelectedCartItems();
        });
    });


    // Function to update total checked items and price
    function updateTotal() {
        const checkedItems = document.querySelectorAll('.cart-item-checkbox:checked');
        const totalCheckedItems = checkedItems.length;
        const totalPrice = Array.from(checkedItems).reduce((total, checkbox) => {
            const row = checkbox.closest('tr');
            const price = parseFloat(row.querySelector('td:nth-child(3)').textContent.replace('₱', '').replace(',', ''));
            return total + price;
        }, 0);


        // Update UI
        document.getElementById('total-checked-items').textContent = ` ${totalCheckedItems}`;

        // Handle pluralization of "item"
        let itemText = 'items'; // Default to plural
        if (totalCheckedItems === 0 || totalCheckedItems === 1) {
            itemText = 'item'; // Singular for 0 or 1
        }
        document.getElementById('item-text').textContent = itemText;

        document.getElementById('total-price-amount').textContent = `₱${totalPrice.toFixed(2)}`;
        
    }


    // Function to dynamically add hidden inputs for selected cart items
    function updateSelectedCartItems() {
        const form = document.getElementById('place-order-form');


        // Remove existing hidden inputs
        document.querySelectorAll('.selected-cart-item-input').forEach(input => input.remove());


        // Get checked items and create hidden inputs
        document.querySelectorAll('.cart-item-checkbox:checked').forEach(item => {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'cart_items[]'; // Laravel will receive an array
            input.value = item.getAttribute('data-cart-id');
            input.classList.add('selected-cart-item-input');
            form.appendChild(input);
        });


        // Update visibility of Place Order button
        //togglePlaceOrderButton(document.querySelectorAll('.cart-item-checkbox:checked').length);
    }


    
</script>
</body>

</html>