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
    body{
        font-family: 'Times New Roman', Times, serif;
    }
    .navbar {
        background-color: black;
        /* background-color: #00416A; */
        /* color: #00416A; */
        color:white;
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
        /* background-color: #00416A; */
        background-color: black;
        border-radius: 3px;
        padding: 3px;
    }

    .navbar-brand, .nav-link {
        color: white !important;
        font-size: 18px;
    }

    .nav-link:hover {
        color: #eee; /* Slightly lighter color on hover */
        font-size: 20px;
        /* font-size: 20px; */
    }

   

    /* Change the dropdown item hover background color */
    /* .dropdown-menu .dropdown-item:hover {
        background-color: #00416A !important; /* Set background color on hover
        color: #fff !important; 
    } */

     /* Footer styles */
    .footer {
        /* background-color: #00416A;  */
        background-color: black;
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
    background-color: black;
        /* background-color: #00416A; */
        z-index: 10; /*Keeps it above the background */
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <!-- <img src="images/logo5.png" alt=""> -->
        <a class="navbar-brand" href="#" style="font-size:30px;">SHIHORI INTERNATIONAL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
                    <a class="nav-link" href="#">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('certificate.list')}}">CERTIFICATE</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>
</html>