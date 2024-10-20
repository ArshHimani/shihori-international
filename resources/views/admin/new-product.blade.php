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
        // Catch the form submission
        // document.getElementById('product-form').addEventListener('submit', function(e) {
        //     e.preventDefault(); // Prevent the form from submitting immediately

        //     // Perform the actual form submission via AJAX or handle the form submit logic
        //     // Assuming the form submission was successful, you can show the SweetAlert

        //     // Example success scenario
        //     Swal.fire({
        //         title: 'Success!',
        //         text: 'Product added successfully!',
        //         icon: 'success',
        //         confirmButtonText: 'OK'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // Delay redirection to allow users to see the SweetAlert message
        //             setTimeout(function() {
        //                 window.location.href = '{{ route('new.product') }}'; // Redirect to the desired route
        //             });
        //         }
        //     });
        // });

        document.getElementById('product-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

    let formData = new FormData(this); // Create form data object from form

    // Perform the actual form submission via AJAX
    fetch('{{ route('product.store') }}', {
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
                text: 'Product added successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the desired route after showing the success message
                    window.location.href = '{{ route('new.product') }}';
                }
            });
        } else {
            // Show error message if something went wrong
            Swal.fire({
                title: 'Error!',
                text: data.message || 'An error occurred while adding the Product.',
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
            text: 'Product already exists.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});

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
            <h2>Add New Product</h2>
            <form action="{{route('product.store')}}" id="product-form" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product_name" placeholder="Enter product name" required>

                <label for="product-title">Title</label>
                <input type="text" id="product-title" name="product_title" placeholder="Enter Title" required>

                <label for="product-description">Description:</label>
                <textarea id="product-description" name="product_description" rows="4" placeholder="Enter product description" required></textarea>

                <label for="product-category">Category:</label>
                <select id="product-category" name="product_category" required>
                    <option value="">Select a category</option>
                     @foreach($productTypes as $type)
                        <option value="{{$type->product_type_name}}">{{$type->product_type_name}}</option>
                     @endforeach
                </select>

                <label for="product-image">Upload Image:</label>
                <input type="file" id="product-image" name="product_image" accept="image/*" required>

                <input type="submit" value="Add Product">
            </form>
        </div>
    </div>
@endsection


