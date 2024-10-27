@extends('layouts.master')

@section('content')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-jLKHWMOBWjFuGpGeWiQ8G6vV7/aOau24DOV52HK5E69tDA5Qq1lXrj7LyVfxa5Xk" crossorigin="anonymous">
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
body{
    font-family: 'Open Sans', sans-serif;
    line-height: 1.5;
}
.contact-bg{
    /* height: 40vh; */
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
}
.contact-bg h3{
    font-size: 1.3rem;
    font-weight: 400;
}
.contact-bg h2{
    font-size: 3rem;
    text-transform: uppercase;
    padding: 0.4rem 0;
    letter-spacing: 4px;
}
.line div{
    margin: 0 0.2rem;
}
.line div:nth-child(1),
.line div:nth-child(3){
    height: 3px;
    width: 70px;
    background: #f7327a;
    border-radius: 5px;
}
.line{
    display: flex;
    align-items: center;
}
.line div:nth-child(2){
    width: 10px;
    height: 10px;
    background: #f7327a;
    border-radius: 50%;
}
.text{
    font-weight: 300;
    opacity: 0.9;
}
.contact-bg .text{
    margin: 1.6rem 0;
}
.contact-body{
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 1rem;
}
.contact-info{
    margin: 2rem 0;
    text-align: center;
    padding: 2rem 0;
}
.contact-info span{
    display: block;
}
.contact-info div{
    margin: 0.8rem 0;
    padding: 1rem;
}
.contact-info span .fas{
    font-size: 2rem;
    padding-bottom: 0.9rem;
    color: #f7327a;
}
.contact-info div span:nth-child(2){
    font-weight: 500;
    font-size: 1.1rem;
}
.contact-info .text{
    padding-top: 0.4rem;
}
.contact-form{
    padding: 2rem 0;
    border-top: 1px solid #c7c7c7;
}
.contact-form form{
    padding-bottom: 1rem;
}
.form-control{
    width: 100%;
    border: 1.5px solid #c7c7c7;
    border-radius: 5px;
    padding: 0.7rem;
    margin: 0.6rem 0;
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    outline: 0;
}
.form-control:focus{
    box-shadow: 0 0 6px -3px rgba(48, 48, 48, 1);
}
.contact-form form div{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    column-gap: 0.6rem;
}
.send-btn{
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    text-transform: uppercase;
    color: #fff;
    background: #f7327a;
    border: none;
    border-radius: 5px;
    padding: 0.7rem 1.5rem;
    cursor: pointer;
    transition: all 0.4s ease;
}
.send-btn:hover{
    opacity: 0.8;
}
.contact-form > div img{
    width: 85%;
}
.contact-form > div{
    margin: 0 auto;
    text-align: center;
}
.contact-footer{
    padding: 2rem 0;
    background: #000;
}
.contact-footer h3{
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 1rem;
    text-align: center;
}
.social-links{
    display: flex;
    justify-content: center;
}
.social-links a{
    text-decoration: none;
    width: 40px;
    height: 40px;
    color: #fff;
    border: 2px solid #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0.4rem;
    transition: all 0.4s ease;
}
.social-links a:hover{
    color: #f7327a;
    border-color: #f7327a;
}

@media screen and (min-width: 768px){
    .contact-bg .text{
        width: 70%;
        margin-left: auto;
        margin-right: auto;
    }
    .contact-info{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (min-width: 992px){
    .contact-bg .text{
        width: 50%;
    }
    .contact-form{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        align-items: center;
    }
}

@media screen and (min-width: 1200px){
    .contact-info{
        grid-template-columns: repeat(4, 1fr);
    }
}

</style>
 
@endpush

  
    <section class = "contact-section">
    @foreach($contactUs as $contactUs)
      <div class = "contact-bg">
        <h3>Get in Touch with Us</h3>
        <h2>contact us</h2>
        <div class = "line">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p class = "text">{!! nl2br(e(str_replace("\t", '&emsp;', $contactUs->paragraph))) !!}</p>
      </div>

      <div class = "contact-body">
        <div class = "contact-info">
          <div>
            <span><i class = "fas fa-mobile-alt"></i></span>
            <span>Phone No.</span>
            <span class = "text">{{$contactUs->phoneNo}}</span>
          </div>
          <div>
            <span><i class = "fas fa-envelope-open"></i></span>
            <span>E-mail</span>
            <span class = "text">{{$contactUs->email}}</span>
          </div>
          <div>
            <span><i class = "fas fa-map-marker-alt"></i></span>
            <span>Address</span>
            <span class = "text">{{$contactUs->address}}</span>
          </div>
          <div>
            <span><i class = "fas fa-clock"></i></span>
            <span>Opening Hours</span>
            <span class = "text">{{$contactUs->opening_hours}}</span>
          </div>
        </div>
        </div>
      </div>

      <div class = "contact-footer">
        <h3>Follow Us</h3>
        <div class = "social-links">
          <a href = "{{$contactUs->facebook}}" class = "fab fa-facebook-f"></a>
          <a href = "{{$contactUs->whatsapp}}" class = "fab fa-whatsapp"></a>
          <a href = "{{$contactUs->instagram}}" class = "fab fa-instagram"></a>
          <a href = "{{$contactUs->linkedIn}}" class = "fab fa-linkedin"></a>
        </div>
      </div>
      @endforeach
        
      <div class = "map">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5800757.977775673!2d70.4670221!3d22.8829024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958dbac2c37d799%3A0xee177085549223ae!2sShihori%20international!5e0!3m2!1sen!2sin!4v1729960050773!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5950443.240490101!2d71.6733135!3d22.03331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958dbac2c37d799%3A0xee177085549223ae!2sShihori%20international!5e0!3m2!1sen!2sin!4v1729960050773!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </section>
@endsection