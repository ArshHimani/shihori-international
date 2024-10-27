@extends('layouts.master')

@push('styles')
<style>
    /* General Styles */
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

    .arrow-left { left: 20px; }
    .arrow-right { right: 20px; }
    .arrow:hover { background-color: rgba(0, 0, 0, 0.8); }

    .product-section { padding: 50px 0; clear: both; }

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

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .product-card img {
        width: 100%;
        height: auto; /* Set height to auto for better responsiveness */
        max-width: 250px;
        border-radius: 50%;
        box-shadow: 0 0 0 5px white, 0 0 0 8px #00416A;
        margin-bottom: 15px;
    }

    .product-card h5 { font-size: 1.2rem; font-weight: bold; margin: 15px 0; }
    .product-card p { font-size: 1rem; color: #666; }

    .btn-primary {
        background-color: #00416A !important;
        border-color: #00416A !important;
    }

    .btn-primary:hover {
        background-color: #003459 !important;
        border-color: #003459 !important;
    }

    /* Responsive Media Queries */
    @media (max-width: 992px) {
        .background-content h1 { font-size: 2.5rem; }
        .background-content p { font-size: 1.8rem; }
        .product-card img { max-width: 200px; }
    }

    @media (max-width: 768px) {
        .background-image { height: 400px; }
        .background-content h1 { font-size: 2rem; }
        .background-content p { font-size: 1.5rem; }

        .arrow {
            width: 40px;
            height: 40px;
            font-size: 1.5rem;
        }

        .product-card {
            margin: 10px;
            padding: 15px;
        }
    }

    @media (max-width: 576px) {
        .background-content h1 { font-size: 1.8rem; }
        .background-content p { font-size: 1.2rem; }
        .product-card img { max-width: 150px; }

        /* Stack product cards vertically on small screens */
        .product-section .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .product-card {
            margin-bottom: 20px; /* Add margin at the bottom of the card */
        }
    }
</style>
@endpush

@section('content')
    <div class="background-image clearfix">
        <button class="arrow arrow-left" id="prev-slide">&lt;</button>
        <div class="background-content">
            <h1 id="image-title"></h1>
            <p id="image-description"></p>
        </div>
        <button class="arrow arrow-right" id="next-slide">&gt;</button>
    </div>

    <section class="product-section">
        <div class="container">
            <div class="row">
                @foreach($productTypes as $index => $productType)
                    @if($index % 3 == 0 && $index != 0)
                        </div><div class="row">
                    @endif
                    <div class="col-md-4 col-sm-6"> <!-- Add col-sm-6 for better responsiveness -->
                        <div class="product-card">
                            <img src="{{ asset($productType->product_type_image) }}" alt="{{ $productType->product_type_name }}">
                            <h5>{{ $productType->product_type_name }}</h5>
                            <p>{{ $productType->product_type_description }}</p>
                            <a href="{{ route('product.details', ['productTypeName' => $productType->product_type_name]) }}" class="btn btn-primary">More Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    const slides = [
        { image: "{{ asset('images/home.jpg') }}", title: "Welcome to Shihori International", description: "Delivering the best products globally with care." },
        { image: "{{ asset('images/coconut/coconut2.jpg') }}", title: "Premium Coconuts", description: "We offer premium quality coconuts." },
        { image: "{{ asset('images/spices/spice1.jpg') }}", title: "Explore Our Spices", description: "Experience the rich flavor of our handpicked spices." },
        { image: "{{ asset('images/fertilizer/fertilizer1.jpg') }}", title: "Eco-Friendly Fertilizer", description: "Our organic fertilizer enriches your soil, promoting healthy plant growth." }
    ];

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

    function nextSlide() { currentIndex = (currentIndex + 1) % slides.length; changeBackgroundImage(); }
    function prevSlide() { currentIndex = (currentIndex - 1 + slides.length) % slides.length; changeBackgroundImage(); }

    document.getElementById('next-slide').addEventListener('click', nextSlide);
    document.getElementById('prev-slide').addEventListener('click', prevSlide);
    setInterval(nextSlide, 5000);
    changeBackgroundImage();
</script>
@endpush
