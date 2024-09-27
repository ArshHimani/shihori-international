@extends('layouts.master')

@push('styles')
<style>
    .certificate-section {
        padding: 50px 0;
    }

    .certificate-card {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 15px;
        text-align: center;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .image-container {
        width: 595px;
        height: 350px;
        overflow: hidden;
        border: 1px solid #ccc;
        position: relative;
        max-width: 100%;
        max-height: 100%;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        /* object-fit: contain; */
    }

    .certificate-card p {
        margin-top: 10px;
        font-size: 1rem;
    }

    .zoom-buttons {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .zoom-buttons button {
        margin: 0 10px;
        padding: 5px 15px;
        font-size: 18px;
        cursor: pointer;
        border: 1px solid #ddd;
        background-color: #f5f5f5;
        border-radius: 5px;
    }

    .zoom-buttons button:hover {
        background-color: #ddd;
    }

    /* Fullscreen modal image */
    .modal-content {
        background: none;
        border: none;
    }

    .modal-body {
        padding: 0;
    }

    .modal-body img {
        width: 100%;
        height: auto;
    }

    .close-modal {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: red;
        color: white;
        border: none;
        font-size: 24px;
        padding: 10px;
        cursor: pointer;
        z-index: 9999;
    }
</style>
@endpush

@section('content')
    <section class="certificate-section">
        <div class="container">
            <div class="row">
                <!-- Certificate 1 -->
                <div class="col-md-4">
                    <div class="certificate-card">
                        <div class="image-container">
                            <img src="{{ asset('images/home.jpg') }}" alt="Certificate 1" class="zoomable-image">
                        </div>
                        <p>Short description of certificate 1.</p>
                        <div class="zoom-buttons">
                            <button class="zoom-in">+</button>
                            <button class="zoom-out">-</button>
                        </div>
                        <button class="btn btn-primary open-modal" data-image="{{ asset('images/home.jpg') }}">View Fullscreen</button>
                    </div>
                </div>
                <!-- Certificate 2 -->
                <div class="col-md-4">
                    <div class="certificate-card">
                        <div class="image-container">
                            <img src="{{ asset('images/home2.png') }}" alt="Certificate 2" class="zoomable-image">
                        </div>
                        <p>Short description of certificate 2.</p>
                        <div class="zoom-buttons">
                            <button class="zoom-in">+</button>
                            <button class="zoom-out">-</button>
                        </div>
                        <button class="btn btn-primary open-modal" data-image="{{ asset('images/home2.png') }}">View Fullscreen</button>
                    </div>
                </div>
                <!-- Certificate 3 -->
                <div class="col-md-4">
                    <div class="certificate-card">
                        <div class="image-container">
                            <img src="{{ asset('images/home3.jpeg') }}" alt="Certificate 3" class="zoomable-image">
                        </div>
                        <p>Short description of certificate 3.</p>
                        <div class="zoom-buttons">
                            <button class="zoom-in">+</button>
                            <button class="zoom-out">-</button>
                        </div>
                        <button class="btn btn-primary open-modal" data-image="{{ asset('images/home3.jpeg') }}">View Fullscreen</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fullscreen Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button" class="close-modal" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Fullscreen Image">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Fullscreen image modal script
    document.querySelectorAll('.open-modal').forEach(button => {
        button.addEventListener('click', function() {
            // Retrieve the image URL from the data attribute
            let imageUrl = this.getAttribute('data-image');
            // Set the image source in the modal
            document.getElementById('modalImage').setAttribute('src', imageUrl);
            // Trigger the modal to show
            let modal = new bootstrap.Modal(document.getElementById('imageModal'));
            modal.show();
        });
    });

    // Zoom in and zoom out functionality
    document.querySelectorAll('.zoom-in').forEach(button => {
        button.addEventListener('click', function() {
            let imgContainer = this.closest('.certificate-card').querySelector('.zoomable-image');
            let currentWidth = imgContainer.clientWidth;
            imgContainer.style.width = currentWidth * 1.1 + 'px';
        });
    });

    document.querySelectorAll('.zoom-out').forEach(button => {
        button.addEventListener('click', function() {
            let imgContainer = this.closest('.certificate-card').querySelector('.zoomable-image');
            let currentWidth = imgContainer.clientWidth;
            imgContainer.style.width = currentWidth * 0.9 + 'px';
        });
    });
</script>
@endpush
