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
<section class="product-section">
        <div class="container">
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product1.jpg') }}" alt="Product 1">
                        <h5>Fertilizer</h5>
                        <p>Short description of product 1.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product2.jpg') }}" alt="Product 2">
                        <h5>Red Chilli Powder</h5>
                        <p>Short description of product 2.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product3.jpg') }}" alt="Product 3">
                        <h5>Coconut</h5>
                        <p>Short description of product 3.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div>
            <!-- <div class="row"> -->
                <!-- Product 4 (Automatically moves to next row) -->
                <!-- <div class="col-md-4">
                    <div class="product-card">
                        <img src="{{ asset('images/product4.jpg') }}" alt="Product 4">
                        <h5>Product 4</h5>
                        <p>Short description of product 4.</p>
                        <a href="#" class="btn btn-primary">More Details</a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
@endsection