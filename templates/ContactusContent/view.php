<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact cards-->
            <div class="row gx-5 row-cols-2 row-cols-lg-4 py-5">
                <!-- Address -->
                <div class="col text-center">
                    <div style="display: block; margin-left: auto; margin-right: auto; height: 70px; width: 70px;
                    border-radius: 25px; background-color: royalblue; color: #fff; text-align: center;">
                        <i style="font-size: 50px;" class="bi bi-geo-alt-fill"></i></div>
                    <div class="h3">Our Location</div>
                    <a href="http://maps.google.com?q=<?php echo $contactusContent["address"]; ?>"
                       target="_blank" rel="noopener noreferrer"><?php echo $contactusContent["address"]; ?></a>
                </div>
                <!-- Opening Hours-->
                <div class="col text-center">
                    <div style="display: block; margin-left: auto; margin-right: auto; height: 70px; width: 70px;
                    border-radius: 25px; background-color: royalblue; color: #fff; text-align: center;">
                        <i style="font-size: 50px;" class="bi bi-clock"></i></div>
                    <div class="h3">Opening Hours</div>
                    <span style="white-space: pre-line"><?php echo $contactusContent["openinghours"]; ?></span>
                </div>
                <!-- Email-->
                <div class="col text-center">
                    <div style="display: block; margin-left: auto; margin-right: auto; height: 70px; width: 70px;
                    border-radius: 25px; background-color: royalblue; color: #fff; text-align: center;">
                        <i style="font-size: 50px;" class="bi bi-envelope"></i></div>
                    <div class="h3 mb-2">Email us</div>
                    <a href="mailto:<?php echo $contactusContent["email"]; ?>"><?php echo $contactusContent["email"]; ?></a>
                </div>
                <!-- Phone number-->
                <div class="col text-center">
                    <div style="display: block; margin-left: auto; margin-right: auto; height: 70px; width: 70px;
                    border-radius: 25px; background-color: royalblue; color: #fff; text-align: center;">
                        <i style="font-size: 50px;" class="bi bi-telephone"></i></div>
                    <div class="h3">Call us</div>
                    <a href="tel:<?php echo $contactusContent["phone"]; ?>"><?php echo $contactusContent["phone"]; ?></a>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>

