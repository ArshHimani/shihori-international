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
            background-color: black;
            color: #fff;
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
            background-color: black;
            border-radius: 3px;
            padding: 3px;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
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
            background-color: black; 
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
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <!-- <img src="images/logo5.png" alt=""> -->
        <a class="navbar-brand d-flex align-items-center" href="/admin-index">
        <span class="navbar-title">SHIHORI INTERNATIONAL</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center justify-content-lg-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin-index">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('productType.list')}}">CATEGORY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('gallery')}}">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('aboutUs')}}">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('certificate.list')}}">CERTIFICATE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contactUs')}}">CONTACT US</a>
                </li>
            </ul>
            <h3><a href="/logout"><i class="fas fa-sign-out" style="color:white;"></i></a></h3>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>
</html>