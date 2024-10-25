<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIHORI INTERNATIONAL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1E04JgHfkLM7N4E" crossorigin="anonymous">
    
    <!-- Optional Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.css') }}">
@stack('styles')

<style>
    .navbar {
        background-color: #fff;
        /* background-color: #00416A; */
        color: #00416A;
        height: 100px;
        border: 1px solid  #00416A;
        font-weight: 700;
        font-family: 'Times New Roman', Times, serif;
        border-radius: 3px 3px 3px 3px;
    }

    .navbar img {
        height: auto; /* Automatically adjust height */
        max-height: 100px; /* Set a max height to match the navbar */
        max-width: 100%; /* Ensure it doesn't exceed the navbar width */
        width: auto; /* Keep width in proportion to height */
    }

    .navbar-toggler-icon {
        background-color: #00416A;
        border-radius: 3px;
        padding: 3px;
    }

    .navbar-brand, .nav-link {
        color: #00416A !important;
        font-size: 18px;
    }

    .nav-link:hover {
        color: #eee; /* Slightly lighter color on hover */
        font-size: 20px;
        /* font-size: 20px; */
    }

    .dropdown-menu .dropdown-item {
            color: #00416A !important; /* Set text color to #00416A */
    }

    /* Change the dropdown item hover background color */
    .dropdown-menu .dropdown-item:hover {
        background-color: #00416A !important; /* Set background color on hover */
        color: #fff !important; /* Set text color to white on hover */
    }

     /* Footer styles */
    .footer {
        background-color: #00416A; 
        /* background-color: #fff; */
        border-top: 2px solid  #00416A;
        /* color: #00416A; */
        color: white;
        padding: 20px 0;
        width: 100%;
    }

        /* Upper footer section */
    .footer-top {
        text-align: center; /* Center text in the footer */
        padding: 15px 0;
    }

        /* Horizontal line between sections */
    .footer-divider {
        border-top: 2px solid  #00416A; /* Golden horizontal line */
        border-top:2px solid white;
        margin: 0 auto;
        width: 80%; /* Line width relative to the page width */
    }

    /* Bottom footer section (copyright) */
    .footer-bottom {
        text-align: center;
        padding: 10px 0;
        margin-top: 10px;
    }

    .navbar-collapse {
    background-color: #fff;
        /* background-color: #00416A; */
        z-index: 10; /*Keeps it above the background */
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="images/logo/logo1.png" alt="">
        <a class="navbar-brand" href="#" style="font-size:30px;">SHIHORI INTERNATIONAL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/index">HOME</a>
                </li>

                <!-- Products Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PRODUCTS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                        @foreach($productTypes as $productType)
                            <li><a class="dropdown-item" href="{{ route('product.details', $productType->product_type_name)}}">{{$productType->product_type_name}}</a></li>
                        @endforeach
                        <li><a class="dropdown-item" href="/products">All Products</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/certificate-display">CERTIFICATE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery-display">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contactUs-display">CONTACT US</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Main Content Section -->
    <!-- <div class="content"> -->
        @yield('content') 
    <!-- </div> -->


    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-top">
            <p>104, Shree Hari Shopping Centre, Chamunda Park, Botad, Gujarat, India</p>
            <p>Phone: +91 72260 50327</p>
            <p>Phone: +91 82005 99105</p>
            <p>Email: shihoriinternation@gmail.com</p>
        </div>
        <div class="footer-divider"></div>
        <div class="footer-bottom">
            <p>&copy; 2024 SHIHORI INTERNATIONAL. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>