@extends('layouts.master')

@push('styles')
    <style>
/* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

/* Header Section */
header {
    background-color: #003366;
    padding: 20px 0;
}

header nav ul {
    list-style: none;
    text-align: center;
}

header nav ul li {
    display: inline;
    margin: 0 20px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

header nav ul li a:hover,
header nav ul li a.active {
    color: #ffa500;
}

/* Hero Section */
.hero {
    background-image: url('images/hero-shipping.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    padding: 100px 0;
    text-align: center;
}

.hero h1 {
    font-size: 3em;
}

.hero p {
    font-size: 1.2em;
    margin-top: 20px;
}

/* About Us Section */
.about-section {
    padding: 50px 0;
    background-color: #fff;
}

.about-section h2 {
    font-size: 2em;
    margin-bottom: 20px;
}

.about-section .about-text {
    max-width: 700px;
    margin: 0 auto 40px;
    text-align: center;
}

.about-features {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.feature-box {
    background-color: #003366;
    color: #fff;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    width: 300px;
    margin: 20px;
}

.feature-box img {
    width: 80px;
    margin-bottom: 15px;
}

.feature-box h3 {
    margin-bottom: 10px;
}

/* Team Section */
.team-section {
    background-color: #f4f4f4;
    padding: 50px 0;
    text-align: center;
}

.team-grid {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

.team-member {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 250px;
}

.team-member img {
    border-radius: 50%;
    margin-bottom: 15px;
    width: 100px;
    height: 100px;
}

.team-member h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.team-member p {
    font-size: 0.9em;
    color: #666;
}

/* Footer Section */
footer {
    background-color: #003366;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

footer p {
    margin: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .about-features,
    .team-grid {
        flex-direction: column;
        align-items: center;
    }

    .feature-box, .team-member {
        width: 90%;
    }
}

       
    </style>
@endpush

@section('content')
     <!-- Hero Section -->
     <section class="hero">
        <div class="container">
            <h1>About Us</h1>
            <p>Your Global Cargo and Shipping Partner</p>
        </div>
    </section>

    <!-- About Us Content -->
    <section class="about-section">
        <div class="container">
            <div class="about-text">
                <h2>Who We Are</h2>
                <p>Founded in 1995, Ocean Freight Logistics has been at the forefront of global shipping. We offer seamless, cost-effective solutions that cater to the unique needs of businesses worldwide.</p>
                <p>From small enterprises to multinational corporations, our mission is to deliver goods safely and efficiently across borders, connecting businesses to the world.</p>
            </div>

            <div class="about-text">
                <h2>Our Vision & Mission</h2>
                <p>We aim to be the world’s most trusted logistics partner, creating a future where shipping is smooth and accessible. We are committed to sustainability, efficiency, and continuous innovation.</p>
            </div>

            <div class="about-features">
                <div class="feature-box">
                    <img src="images/global-network.png" alt="Global Network">
                    <h3>Global Network</h3>
                    <p>With a network that spans over 120 countries, we ensure fast, reliable deliveries anywhere in the world.</p>
                </div>

                <div class="feature-box">
                    <img src="images/customer-care.png" alt="Customer Care">
                    <h3>24/7 Customer Support</h3>
                    <p>Our dedicated team is always available to assist you with your shipment queries.</p>
                </div>

                <div class="feature-box">
                    <img src="images/sustainability.png" alt="Sustainability">
                    <h3>Sustainability</h3>
                    <p>We strive for environmentally responsible logistics practices, ensuring a better planet for future generations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet the Team Section -->
    <section class="team-section">
        <div class="container">
            <h2>Meet Our Leadership Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="images/team1.jpg" alt="John Doe">
                    <h3>John Doe</h3>
                    <p>CEO & Founder</p>
                </div>
                <div class="team-member">
                    <img src="images/team2.jpg" alt="Jane Smith">
                    <h3>Jane Smith</h3>
                    <p>Head of Operations</p>
                </div>
                <div class="team-member">
                    <img src="images/team3.jpg" alt="Mark Johnson">
                    <h3>Mark Johnson</h3>
                    <p>Chief Logistics Officer</p>
                </div>
            </div>
        </div>
    </section>

@endsection
