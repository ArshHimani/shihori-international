@extends('admin.admin-master') 

@push('styles')
    <style>
        /* This will center the product form */
        .center-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .product-form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            width: 400px;
            text-align: left;
            margin: 20px 20px;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"], input[type="number"], textarea, select, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #00314f;
        }
        label {
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }
    </style>
@endpush


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.getElementById('product-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    let formData = new FormData(this); // Create form data object from form

    // Perform the actual form submission via AJAX
    fetch('{{ route('certificate.add') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token in the request
        },
        body: formData
    })
    .then(response => response.json()) // Assuming the server responds with JSON
    .then(data => {
        if (data.success) {
            // Show success message if the certificate was added successfully
            Swal.fire({
                title: 'Success!',
                text: 'Certificate added successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the desired route after showing the success message
                    window.location.href = '{{ route('certificate.show') }}';
                }
            });
        } else {
            // Show error message if something went wrong
            Swal.fire({
                title: 'Error!',
                text: data.message || 'An error occurred while adding the certificate.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        // Handle any errors that occur during the fetch
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: 'An unexpected error occurred. Please try again later.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});

function validateForm() {
    // Get the form fields
    let nameField = document.getElementById('certificate_name');
    let imageField = document.getElementById('certificate_image');

    // Error elements
    let nameError = document.getElementById('error-certificate_name');
    let imageError = document.getElementById('error-certificate_image');

    let valid = true;

    // Reset error messages
    nameError.innerHTML = '';
    imageError.innerHTML = '';

    // Validate the certificate name field
    if (nameField.value.trim() === '') {
        nameError.innerHTML = 'Certificate name is required.';
        valid = false;
    }

    // Validate the certificate image field
    if (imageField.files.length === 0) {
        imageError.innerHTML = 'Please upload an image.';
        valid = false;
    } else {
        let file = imageField.files[0];
        let allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        let fileExtension = file.name.split('.').pop().toLowerCase();
        if (!allowedExtensions.includes(fileExtension)) {
            imageError.innerHTML = 'Please upload a valid image (jpg, jpeg, png, gif).';
            valid = false;
        } else if (file.size > 2 * 1024 * 1024) { // Max file size: 2MB
            imageError.innerHTML = 'Image size should not exceed 2MB.';
            valid = false;
        }
    }

    // Prevent form submission if validation fails
    return valid;
}


    </script>
@endpush

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="center-wrapper"> <!-- Flex wrapper to center the form -->
        <div class="product-form-container">
            <h2>Add Certificate</h2>
            <form action="{{route('certificate.add')}}" id="product-form" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf
    <label for="product-name">Certificate Name:</label>
    <input type="text" id="certificate_name" name="certificate_name" placeholder="Enter certificate name" required>
    <div id="error-certificate_name" class="text-danger"></div>

    <label for="product-image">Upload Image:</label>
    <input type="file" id="certificate_image" name="certificate_image" accept="image/*" required>
    <div id="error-certificate_image" class="text-danger"></div>

    <input type="submit" value="Add Certificate">
</form>
        </div>
    </div>
@endsection


