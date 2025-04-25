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
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/LoginStyle.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/test.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;font-family: 'Open Sans', sans-serif;background: url(&quot;assets/img/plastic1400.png&quot;) center / cover no-repeat;">
    <div class="d-flex flex-column flex-lg-row container p-0" style="width: 90%;max-width: 1000px;background: #fff;border-radius: 15px;overflow: hidden;box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);">
        <div class="text-center left">
            <div>
                <h1 style="text-align: left;font-weight: bold;font-size: 25px;"><em><span style="color: rgb(212, 124, 8);">Clobber</span>core</em>&nbsp;<span style="font-family: 'Great Vibes', serif;">by K</span></h1>
                <h3 class="fw-bold" style="text-align: left;font-size: 16px;color: #d7ac4b;">Step into Style, One Ukay at a Time!</h3>
            </div>
                <form method="POST" action="{{ route('signup') }}" class="mt-5">
                @csrf
                <div class="row g-2">
                    <div class="col-md-6 sign-up-abc"><input class="form-control form-control-abc" type="text" name="fullname" placeholder="Fullname" required></div>
                    <div class="col-md-6 sign-up-abc"><input class="form-control" type="text" name="username" placeholder="Username" required></div>
                    <div class="col-md-12 sign-up-abc"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
                    <div class="col-md-6 sign-up-abc"><input class="form-control" type="date" name="birthdate" id="birthdate" style="color: var(--bs-gray-700);" required></div>
                    <div class="col-md-6 sign-up-abc"><select class="form-select"  name="gender" required style="color: var(--bs-gray-700);border-radius: 3px;font-size: 12px;padding: 10px;">
                            <option value="" selected disabled>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select></div>
                    <div class="col-md-6 sign-up-abc"><input class="form-control" type="password" placeholder="Password" name="password" required></div>
                    <div class="col-md-6 sign-up-abc"><input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" required></div>
                </div><button class="btn w-100 mt-3 sign-up-btn" type="submit" style="background: #d7ac4b;color: var(--bs-light);border-radius: 3px;padding: 10px;font-size: 12px;">
                    Sign Up
                </button>
                <p class="m-2" style="font-size: 12px;">or</p>
            </form><a class="btn w-100 sign-up-btn google-btn" role="button" style="padding: 10px;border-radius: 3px;border-style: solid;border-color: #d7ac4b;color: #d7ac4b;font-size: 12px;" href="{{ route('google.login') }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3">
      <path fill="#4285F4" d="M533.5 278.4c0-17.4-1.4-34.1-4.1-50.3H272v95.1h147.5c-6.4 34.6-25.6 63.9-54.5 83.5l88 68.5c51.3-47.2 80.5-116.7 80.5-196.8z"/>
      <path fill="#34A853" d="M272 544.3c72.9 0 134-24.1 178.7-65.6l-88-68.5c-24.5 16.4-56 26-90.7 26-69.7 0-128.8-47.1-150.1-110.4H31.7v69.3C76.8 475.2 168.6 544.3 272 544.3z"/>
      <path fill="#FBBC04" d="M121.9 326.2c-10.5-31.1-10.5-64.8 0-95.9V160.9H31.7c-30.4 60.6-30.4 132.7 0 193.3l90.2-27.9z"/>
      <path fill="#EA4335" d="M272 107.7c39.7 0 75.4 13.7 103.5 40.6l77.6-77.6C406 24.7 345 0 272 0 168.6 0 76.8 69.1 31.7 160.9l90.2 69.3C143.2 154.8 202.3 107.7 272 107.7z"/>
    </svg>Google</a>
            <p class="mt-2" style="font-size: 12px;">Already have an account?&nbsp;<a class="text-decoration-none" href="{{ route('login.process') }}"style="font-style: italic;">Log in</a></p>
        </div>
        <div class="right"></div>
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
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date();
        let minDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        document.getElementById("birthdate").setAttribute("max", minDate.toISOString().split("T")[0]);
    });
    </script>
</body>

</html>