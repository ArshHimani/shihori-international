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
@endsection
