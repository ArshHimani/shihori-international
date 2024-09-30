@extends('layouts.master')

@push('styles')
<style>
    /* Styles for background and content */
    .background-image {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 550px;
        width: 100%;
        position: relative;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Text content that appears on the images */
    .background-content {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        color: white;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        font-size: 2rem;
    }

    .background-content h1 {
        font-size: 3.5rem;
        margin-bottom: 10px;
    }

    .background-content p {
        font-size: 2.2rem;
    }

    /* Arrow button styles */
    .arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 20;
        font-size: 2rem;
        font-weight: bold;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .arrow-left {
        left: 20px;
    }

    .arrow-right {
        right: 20px;
    }

    .arrow:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .product-section {
        padding: 50px 0;
        clear: both; /* Ensure it starts after the image section */
    }

    .product-card {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 15px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: white;
    }

    /* Hover effect for the product card */
    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .product-card img {
        width: 100%;
        height: 180px;
        max-width: 250px; /* Limit the size of the product image */
        border-radius: 50%; /* Make the image circular */
        /* border: 5px solid #00416A; Inner border color (Dark Blue) */
        /* padding: 5px;
        background-color: white; Add a small background for separation */
        box-shadow: 0 0 0 5px white, 0 0 0 8px #00416A; /* Outer borders with Orange and Dark Blue */
        margin-bottom: 15px;
    }

    .product-card h5 {
        margin: 15px 0;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .product-card p {
        font-size: 1rem;
        color: #666;
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
    <!-- Fullscreen Background Section with arrows -->
    <div class="background-image clearfix">
        <button class="arrow arrow-left" id="prev-slide">&lt;</button> <!-- Left arrow -->
        <div class="background-content">
            <h1 id="image-title"></h1>
            <p id="image-description"></p>
        </div>
        <button class="arrow arrow-right" id="next-slide">&gt;</button> <!-- Right arrow -->
    </div>

    <!-- Product Section (Now appears below the image) -->
    <!-- <section class="product-section">
        <div class="container">
            <div class="row">
               
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/fertilizer/fertilizer2.jpg') }}" alt="Product 1">
                        <h5>Fertilizer</h5>
                        <p>Eco-friendly, organic fertilizers</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
              
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/spices/spice3.jpeg') }}" alt="Product 2">
                        <h5>Spices</h5>
                        <p>Farm-fresh spices</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/coconut/coconut7.jpg') }}" alt="Product 3">
                        <h5>Coconut</h5>
                        <p>For versatile uses in cooking and health</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<section class="product-section">
    <div class="container">
        <div class="row">
            @foreach($productTypes as $index => $productType)
                <!-- Open a new row after every 3 products -->
                @if($index % 3 == 0 && $index != 0)
                    </div><div class="row">
                @endif
                
                <!-- Product Card -->
                <div class="col-md-4">
                    <div class="product-card">
                        <!-- Use the product image and name dynamically -->
                        <img src="{{ asset($productType->product_type_image) }}" alt="{{ $productType->product_type_name }}">
                        <h5>{{ $productType->product_type_name }}</h5>
                        <p>{{ $productType->product_type_description }}</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // JavaScript to handle automatic background image slider with content
    const slides = [
        {
            image: "{{ asset('images/home.jpg') }}",
            title: "Welcome to Shihori International",
            description: "Delivering the best products globally with care.",
        },
        {
            image: "{{ asset('images/coconut/coconut2.jpg') }}",
            title: "Premium Coconuts",
            description: "We offer premium quality coconuts.",
        },
        {
            image: "{{ asset('images/spices/spice1.jpg') }}",
            title: "Explore Our Spices",
            description: "Experience the rich flavor of our handpicked spices.",
        },
        {
            image: "{{ asset('images/fertilizer/fertilizer1.jpg') }}",
            title: "Eco-Friendly Fertilizer",
            description: "Our organic fertilizer enriches your soil, promoting healthy plant growth.",
        }
    ]; // Array of images and content

    let currentIndex = 0;
    const slider = document.querySelector('.background-image');
    const title = document.getElementById('image-title');
    const description = document.getElementById('image-description');

    function changeBackgroundImage() {
        const currentSlide = slides[currentIndex];
        slider.style.backgroundImage = `url(${currentSlide.image})`;
        title.textContent = currentSlide.title;
        description.textContent = currentSlide.description;
    }

    // Function to go to the next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        changeBackgroundImage();
    }

    // Function to go to the previous slide
    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        changeBackgroundImage();
    }

    // Event listeners for next and previous buttons
    document.getElementById('next-slide').addEventListener('click', nextSlide);
    document.getElementById('prev-slide').addEventListener('click', prevSlide);

    // Auto-slide every 5 seconds
    setInterval(nextSlide, 5000);

    // Set the initial image and content
    changeBackgroundImage();
</script>
@endpush
