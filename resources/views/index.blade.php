@extends('layouts.master')

@push('styles')
<style>
    /* Navbar */
    .navbar {
        /* #3F2224 */
        background-color: #eee;
        /* background-color: #00416A ; */
        color: #00416A;
        height: 90px;
        z-index: 100; /* Ensures navbar is above the background image */
        /* border: 2px solid goldenrod; */
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
        color: white !important;
        
    }

    .nav-link:hover {
        color: #eee;
        /* font-size: 20px; */
    }

    /* Fullscreen background image */
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .background-image {
        background-image: url('{{ asset('images/home.jpg') }}');
        /* opacity: 80%; */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 550px; /* Fixed height for the background image section */
        width: 100%;
        position: relative;
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        color: white;
        font-size: 2rem;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    .content h1 {
        background: lightgray;
        opacity: 80%;
        /* border: 2px solid green; */
        border-radius: 5px;
    }

    /* Clearfix to ensure products section doesn't float beside the background */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Product section */
    .product-section {
        padding: 50px 0;
        clear: both; /* Ensure it starts after the image section */
    }

    .product-card {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 15px;
        text-align: center;
        /* background-color: #00416A; */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .product-card img {
        width: 100%;
        height: auto;
        max-width: 150px; /* Limit the size of the product image */
    }

    .product-card h5 {
        margin: 15px 0;
    }

    /* Custom button color for .btn-primary */
.btn-primary {
    background-color: #00416A !important; /* Set background color */
    border-color: #00416A !important; /* Set border color */
}

.btn-primary:hover {
    background-color: #003459 !important; /* Darken the background on hover */
    border-color: #003459 !important; /* Darken the border on hover */
}


</style>
@endpush

@section('content')
    <!-- Fullscreen Background Section -->
        <div class="background-image clearfix">
            <div class="content">
                <!-- <h1>SHIHORI INTERNATIONAL</h1> -->
            </div>
        </div>

    <!-- Product Section (Now appears below the image) -->
    <section class="product-section">
        <div class="container">
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product1.jpg') }}" alt="Product 1">
                        <h5>Product 1</h5>
                        <p>Short description of product 1.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product2.jpg') }}" alt="Product 2">
                        <h5>Product 2</h5>
                        <p>Short description of product 2.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product3.jpg') }}" alt="Product 3">
                        <h5>Product 3</h5>
                        <p>Short description of product 3.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Product 4 (Automatically moves to next row) -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product4.jpg') }}" alt="Product 4">
                        <h5>Product 4</h5>
                        <p>Short description of product 4.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
<script>
    // JavaScript to handle automatic background image slider
    // const images = [
    //     "{{ asset('images/home.jpg') }}", 
    //     "{{ asset('images/home2.png') }}", 
    //     "{{ asset('images/home3.jpeg') }}"
    // ]; // Array of images
    // let currentIndex = 0;
    // const slider = document.querySelector('.background-image');

    // function changeBackgroundImage() {
    //     // Increment the index and reset if it exceeds the number of images
    //     currentIndex = (currentIndex + 1) % images.length;
    //     slider.style.backgroundImage = `url(${images[currentIndex]})`;
    // }

    // // Change image every 5 seconds
    // setInterval(changeBackgroundImage, 3000);
</script>
@endpush
