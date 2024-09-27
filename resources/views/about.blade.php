@extends('layouts.master')

@push('styles')
    <style>
        .content {
            padding: 50px;
            text-align: center;
        }

        .content h1 {
            color: #00416A;
            margin-bottom: 30px;
        }

        .content p {
            color: #333;
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .content img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border-radius: 8px;
        }

        /* .about-section {
            background-color: #f7f7f7;
            padding: 50px;
            border: 1px solid #ddd;
        } */

        .about-section,.mission-section, .vision-section {
            /* padding: 50px; */
            background-color: #f7f7f7;
            padding: 50px;
            border: 1px solid #ddd;
            margin-bottom: 40px;
        }

       
    </style>
@endpush

@section('content')
    <section class="content">
        <!-- <h1>About Us</h1> -->
        <p>Welcome to SHIHORI INTERNATIONAL! We are a company dedicated to delivering high-quality products and exceptional customer service. Founded in 2024, our mission is to build long-lasting relationships with our clients through innovation, reliability, and trust.</p>
        
        <img src="{{ asset('images/about-us.jpg') }}" alt="About Us Image">

        <section class="about-section">
            <h2>Who We Are</h2>
            <p>At SHIHORI INTERNATIONAL, we specialize in providing top-tier products across various industries. Our team is composed of dedicated professionals with years of experience, ensuring that every product meets the highest standards of quality.</p>
        </section>

        <section class="mission-section">
            <h2>Our Mission</h2>
            <p>Our mission is to deliver premium products and services that exceed customer expectations. We are committed to continuous innovation and maintaining a customer-first approach.</p>
        </section>

        <section class="vision-section">
            <h2>Our Vision</h2>
            <p>Our vision is to become a global leader in our industry, known for our unwavering commitment to quality, integrity, and excellence in everything we do.</p>
        </section>

        <!-- <a href="/contact" class="btn btn-primary">Contact Us</a> -->
    </section>
@endsection
