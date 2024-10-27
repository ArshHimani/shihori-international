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
     

    <!-- About Us Content -->
    <section class="about-section">
        <div class="container">
            @foreach($aboutUs as $aboutUs)
            <div class="about-text">
                <h2>Who We Are</h2>
                <p>{!! nl2br(e(str_replace("\t", '&emsp;', $aboutUs->para1))) !!}</p>
            </div>
            
            <div class="about-text">
                <h2>Our Vision & Mission</h2>
                <p>{!! nl2br(e(str_replace("\t", '&emsp;', $aboutUs->para2))) !!}</p>
            </div>

            <div class="about-features">
                <div class="feature-box">
                    <h3>{{$aboutUs->feature1_title}}</h3>
                    <p>{!! nl2br(e(str_replace("\t", '&emsp;', $aboutUs->feature1))) !!}</p>
                </div>

                <div class="feature-box">
                    <h3>{{$aboutUs->feature2_title}}</h3>
                    <p>{!! nl2br(e(str_replace("\t", '&emsp;', $aboutUs->feature2))) !!}</p>
                </div>

                <div class="feature-box">
                    <h3>{{$aboutUs->feature3_title}}</h3>
                    <p>{!! nl2br(e(str_replace("\t", '&emsp;', $aboutUs->feature3))) !!}</p>
                </div>
            </div>
        @endforeach
        </div>
    </section>

    <!-- Meet the Team Section -->
    <section class="team-section">
        <div class="container">
            <h2>Meet Our Leadership Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <!-- <img src="images/team1.jpg" alt="John Doe"> -->
                    <h3>Nitin Bhatvashiya</h3>
                    <p>Co-Founder / Managing Partner</p>
                </div>
                <div class="team-member">
                    <!-- <img src="images/team2.jpg" alt="Jane Smith"> -->
                    <h3>Yash Parmar</h3>
                    <p>Co-Founder / Managing Partner</p>
                </div>
                <!-- <div class="team-member">
                    <img src="images/team3.jpg" alt="Mark Johnson">
                    <h3>Mark Johnson</h3>
                    <p>Chief Logistics Officer</p>
                </div> -->
            </div>
        </div>
    </section>

@endsection
