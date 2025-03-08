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
    <link rel="stylesheet" href="assets/css/LoginStyle.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;font-family: 'Open Sans', sans-serif;background: url(&quot;assets/img/plastic1400.png&quot;) center / cover no-repeat;">
    <div class="d-flex flex-column flex-lg-row container p-0" style="width: 90%;max-width: 1000px;background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);">
        <div class="text-center left">
            <div>
                <h1 style="text-align: left;font-weight: bold;font-size: 34px;">Clobbercore By K</h1>
                <h3 class="fw-bold" style="text-align: left;font-size: 22px;color: #d7ac4b;">Step into Style, One Ukay at a Time!</h3>
            </div>
            <div class="d-flex justify-content-center gap-3 my-3"><a href="{{ route('google.login') }}" class="btn btn-light p-2" style="border-radius: 50%;width: 40px;height: 40px;background: #d7ac4b;"><i class="fa fa-google" style="font-size: 16px;color: var(--bs-light);"></i></a></div>
            <p>or</p>
            <form method="POST" action="{{ route('signup') }}">
             @csrf
             <div class="row g-3">
                <div class="col-md-6">
                    <input class="form-control" type="text" name="fullname" placeholder="Fullname" required>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="col-md-12">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="col-md-6">
                <input class="form-control" type="date" name="birthdate" id="birthdate" required>
                </div>
                <div class="col-md-6">
                    <select class="form-select" name="gender" required>
                        <option value="" selected disabled>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
            </div><button class="btn w-100 mt-3 sign-up-btn" type="submit" style="background: #d7ac4b;color: var(--bs-light);">Sign Up</button>
                    </form>
                    <p class="mt-1">Already have an account?&nbsp;<a class="text-decoration-none" href="{{ route('login.process') }}">Log in</a></p>
        </div>
        <div class="right"></div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date();
        let minDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        document.getElementById("birthdate").setAttribute("max", minDate.toISOString().split("T")[0]);
    });
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/my-profileJS.js"></script>
    <script src="assets/js/my-purchaseTab.js"></script>
    <script src="assets/js/tabfunction.js"></script>
</body>

</html>