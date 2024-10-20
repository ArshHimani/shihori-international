@extends('layouts.master')

@push('styles')
<style>
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
                        <!-- <a href="/product-details" class="btn btn-primary">More Details</a> -->
                        <a href="{{ route('product.details', ['productTypeName' => $productType->product_type_name]) }}" class="btn btn-primary">More Details</a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection