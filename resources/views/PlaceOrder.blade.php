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
    </div>
    <div>
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
        <div style="margin-top: 20px; font-family: 'Open Sans', sans-serif;">
    <div class="container checkout-container mt-4" style="background: var(--bs-white); border-radius: 3px;">
        <div class="table-responsive table p-2">
            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="select-all-checkbox"></th> <!-- working, just fix css for button-->
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    @foreach($cartItems as $cartItem)
                        <tr class="cart-item">
                            <td><input type="checkbox" class="cart-item-checkbox" data-cart-id="{{ $cartItem->id }}"></td>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>₱{{ number_format($cartItem->price, 2) }}</td>
                            <td>1</td> 
                            <td>
                                <form action="{{ route('cart.remove', ['cartItemId' => $cartItem->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between checkout-footer">
            <div class="voucher-section"><span style="margin-right: 10px;">Platform Voucher</span><a href="#">Select or Enter Code</a></div>
            <div class="bottom-section" style="border-top: 2px dashed #f0f0f0 ;">
                <div class="actions">
                    <input type="checkbox" class="select-all-checkbox">
                    <h4 style="font-size: 18px;">Select All</h4>
                </div>

                <div class="checkout-section">
                <h4 style="font-size: 18px;">
                    Total (<span id="total-checked-items"> 0</span>item{{ count($cartItems) > 1 ? 's' : '' }}):  
                    <span id="total-price" style="font-size: 24px;">
                        ₱<span id="total-price-amount">0.00</span>
                    </span>
                </h4>
                    
                    <!-- Button appears when checkbox is checked -->
                    <form action="{{ route('cart.placeOrder') }}" method="POST" id="place-order-form" style="display: none;">
                        @csrf
                      <!--  <input type="hidden" name="cart_items[]" id="selected-cart-items" value="">-->
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </form>

                    @if(session('success'))
                        <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div id="error-alert" class="alert alert-danger">{{ session('error') }}</div>
                    @endif

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
                        document.getElementById('total-checked-items').textContent = totalCheckedItems;
                        document.getElementById('total-price-amount').textContent = totalPrice.toFixed(2);

                        // Show or hide the Place Order button
                        togglePlaceOrderButton(totalCheckedItems);
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
                        togglePlaceOrderButton(document.querySelectorAll('.cart-item-checkbox:checked').length);
                    }

                    // Show or hide the Place Order button
                    function togglePlaceOrderButton(totalCheckedItems) {
                        const placeOrderButton = document.getElementById('place-order-form');
                        placeOrderButton.style.display = totalCheckedItems > 0 ? 'block' : 'none';
                    }
                </script>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/my-profileJS.js"></script>
<script src="assets/js/my-purchaseTab.js"></script>
<script src="assets/js/tabfunction.js"></script>
</body>

</html>