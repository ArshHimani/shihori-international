<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIHORI INTERNATIONAL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.css') }}">

    @stack('styles')

    <style>
        .navbar {
            /* background-color: #fff; */
            color: #00416A;
            height: 100px;
            border: 1px solid #00416A;
            font-weight: 700;
            font-family: 'Times New Roman', Times, serif;
            border-radius: 0; /* Remove rounded edges */
            position: relative;
        }

        .navbar img {
            max-height: 80px;
            width: auto;
            max-width: 100%;
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
            color: #eee;
            font-size: 20px;
        }

        .dropdown-menu .dropdown-item {
            color: #00416A !important;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #00416A !important;
            color: #fff !important;
        }

        /* Footer styles */
        .footer {
            background-color: #00416A; 
            color: white;
            padding: 20px 0;
            width: 100%;
            position: relative;
        }

        .footer-top {
            text-align: center; /* Center text in the footer */
            padding: 15px 0;
        }

        .footer-divider {
            border-top: 2px solid white;
            margin: 0 auto;
            width: 80%; /* Line width relative to the page width */
        }

        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            margin-top: 10px;
        }

        .navbar-collapse {
            /* background-color: #fff; */
            width: 100%;
            z-index: 10; /*Keeps it above the background */
        }

        .whatsapp-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            font-size: 25px;
            width: 70px;
            padding: 15px;
            border-radius: 50%;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .whatsapp-icon:hover {
            background-color: #128C7E;
            color: white;
            text-decoration: none;
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                height: auto; /* Allow navbar to adjust height */
            }

            .navbar-nav {
                text-align: center; /* Center nav items on smaller screens */
            }

            .whatsapp-icon {
                width: 60px;
                font-size: 20px;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 24px; /* Adjust brand font size for smaller screens */
            }
        }



        /* navbar title */
        .navbar-title {
        font-size: 30px; /* Default size */
        white-space: nowrap; /* Prevent line breaks */
    }

    @media (max-width: 992px) {
        .navbar-title {
            font-size: 24px; /* Smaller size for medium screens */
        }
    }

    @media (max-width: 576px) {
        .navbar-title {
            font-size: 20px; /* Even smaller size for small screens */
        }
    }
        
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="/index">
            <img src="{{ asset('images/logo/logo1.png') }}" alt="Shihori International Logo" class="me-2" style="width: auto; height: 70px;">
            <span class="navbar-title">SHIHORI INTERNATIONAL</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center justify-content-lg-end" id="navbarNav">
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
                            <li><a class="dropdown-item" href="{{ route('product.details', $productType->product_type_name) }}">{{ $productType->product_type_name }}</a></li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/products">All Products</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/certificate-display">CERTIFICATE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gallery-display">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contactUs-display">CONTACT US</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Main Content Section -->
@yield('content')

<!-- WhatsApp Icon -->
<a href="https://wa.me/917202850327" target="_blank" class="whatsapp-icon">
    <i class="bi bi-whatsapp"></i>
</a>

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
