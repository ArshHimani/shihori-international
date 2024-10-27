@extends('layouts.master')

@push('styles')
<style>
    .product-card {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        margin: 30px auto; /* Center the card horizontally */
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f8f9fa;
        max-width: 1200px; /* Limit the maximum width of the card */
        min-height: 250px; /* Set minimum height for the product card */
        flex-wrap: wrap; /* Allow items to wrap in smaller screens */
    }
    .product-image {
        width: 100%; /* Make the image responsive */
        max-width: 300px; /* Set maximum width */
        height: auto; /* Maintain aspect ratio */
        border-radius: 50%;
        object-fit: cover;
        margin-right: 30px;
        box-shadow: 0 0 0 5px white, 0 0 0 8px #00416A;
    }
    .product-description {
        flex-grow: 1;
    }

    .contact-bg {
        height: 50vh;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url(image/contect-01.jpg);
        background-position: 50% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        text-align: center;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }

    @media (max-width: 768px) {
        .product-card {
            flex-direction: column; /* Stack elements vertically */
            align-items: center; /* Center align items */
        }

        .product-image {
            margin: 0 0 20px 0; /* Add margin below the image */
        }
    }
</style>
@endpush

@section('content')
<section class="product-section">
    @if($products->isEmpty())
    <div class="contact-bg">
        <h2>No Products Available.</h2>
        <div class="line">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    @else
        @foreach($products as $product)
        <div class="container mt-5">
            <div class="product-card">
                <img src="{{ asset($product->product_image) }}" alt="" class="product-image">
                <div class="product-description">
                    <h2>{{$product->product_name}}</h2>
                    <p>{!! nl2br(e(str_replace("\t", '&emsp;', $product->product_description))) !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</section>
@endsection
