@extends('layouts.master')

@section('content')

@push('styles')
<style>
    .product-card {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        margin: 30px auto; /* Add auto margin to center the card horizontally */
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f8f9fa;
        max-width: 1200px; /* Limit the maximum width of the card */
        min-height: 250px; /* Increase the height of the product card */
    }
    .product-image {
        width: 300px; /* Make the image larger */
        height: 300px; /* Make the image larger */
        border-radius: 50%;
        object-fit: cover;
        margin-right: 30px;
        box-shadow: 0 0 0 5px white, 0 0 0 8px #00416A;
    }
    .product-description {
        flex-grow: 1;
    }
</style>

@endpush

<div class="container mt-5">
    <!-- First Product: Red Chilli Powder -->
    <div class="product-card">
        <img src="{{ asset('images/spices/spice1.jpg') }}" alt="" class="product-image">
        <div class="product-description">
            <h2>Red Chilli Powder</h2>
            <p>
                Our premium Red Chilli Powder is made from carefully selected sun-dried red chillies, finely ground to perfection. It adds an intense, fiery flavor and vibrant color to your dishes. Perfect for spicing up curries, soups, and marinades. This is an essential ingredient for every kitchen that craves authentic heat.
            </p>
        </div>
    </div>

    <!-- Second Product: Turmeric -->
    <div class="product-card">
        <img src="{{ asset('images/spices/turmeric.jpg') }}" alt="" class="product-image">
        <div class="product-description">
            <h2>Turmeric Powder</h2>
            <p>
                Our pure Turmeric Powder is sourced from the finest turmeric roots, known for its rich color and earthy aroma. Packed with powerful antioxidants and anti-inflammatory properties, it’s not only a culinary staple but also a health booster. Perfect for enhancing curries, soups, smoothies, and even lattes.
            </p>
        </div>
    </div>
</div>
@endsection
