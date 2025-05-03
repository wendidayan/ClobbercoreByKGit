<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ecommerce-Client-Side</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/LoginStyle.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/test.css">
</head>

<body style="display: flex;       justify-content: center;       align-items: center;       height: 100vh;       margin: 0; background: #f4f4f4;">
    <div id="hero-top" style="font-family: Montserrat, sans-serif;font-size: 16px;overflow: visible;">
        <nav class="navbar navbar-expand-md fixed-top d-md-flex justify-content-md-end mt-0" style="border-bottom-right-radius: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;border-top-right-radius: 0;margin-top: 0px;margin-right: 0px;margin-left: 0px;background: #ede6d2;" data-bs-theme="light">
            <div class="container-fluid main-nav-header" style="margin:8px;"><a class="navbar-brand d-flex justify-content-center align-items-center" href="#" style="color: var(--bs-gray-900);--bs-body-font-weight: normal;font-weight: bold;font-size: 18px;height: 60px;margin-right: 16px;"><span style="color: rgb(212, 124, 8);">Clobber</span>core By K</a><button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse d-md-flex me-0 pe-0 ms-0" id="navcol-1">
                    <ul class="navbar-nav" style="border-top-style: none;"></ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container forgot-container-abc">
        <h2>Reset Your Password</h2>
        <div id="step1" class="stepXY active">
            <p class="pt-2 pb-2" style="color: #555;font-size: 14px;">Please enter your email address you used to create the account, and we will send a verification code to reset your password.</p><label for="email">Email Address</label><input type="email" id="email" placeholder="you@example.com">
            <div id="error1" class="error-box-xy"></div><button onclick="goToStep2()">Send Code</button>
        </div>
        <div id="step2" class="stepXY"><label for="code">Verification Code</label><input type="text" id="code" placeholder="Enter the code">
            <div id="error2" class="error-box-xy"></div><button onclick="goToStep3()">Verify Code</button>
        </div>
        <div id="step3" class="stepXY">
            <div class="position-relative"><label for="newPassword">New Password</label><input type="password" id="newPassword" placeholder="New password"></div>
            <div class="position-relative"><label for="confirmPassword">Confirm Password</label><input type="password" id="confirmPassword" placeholder="Confirm password"><i class="far fa-eye" id="toggleConfirmPass" style="position:absolute;right:10px;top:60%;transform:translateY(-50%);cursor:pointer;color:#aaa;" onclick="togglePasswordVisibility(&#39;confirmPassword&#39;, this)"></i></div>
            <div id="error3" class="error-box-xy"></div><button onclick="finishReset()">Change Password</button>
        </div>
        <div id="messageBox" class="message-def"></div>
    </div>
    <div id="password-change-sucess" class="modal modal-efg">
        <div class="modal-content modal-content-efg"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                <path d="M10.2426 16.3137L6 12.071L7.41421 10.6568L10.2426 13.4853L15.8995 7.8284L17.3137 9.24262L10.2426 16.3137Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z" fill="currentColor"></path>
            </svg>
            <h3>Password Changed Successfully!</h3>
            <p>Redirecting to homepage...</p>
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
</body>

</html>