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

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px 0;
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
        fetch('{{ route('product.update', $product->id) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token in the request
            },
            body: formData
        })
        .then(response => response.json()) // Assuming the server responds with JSON
        .then(data => {
            if (data.success) {
                // Show success message if the product was updated successfully
                Swal.fire({
                    title: 'Success!',
                    text: 'Product updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the desired route after showing the success message
                        window.location.href = '{{ route('product.show', $product->id) }}';
                    }
                });
            } else {
                // Show error message if something went wrong
                Swal.fire({
                    title: 'Error!',
                    text: data.message || 'An error occurred while updating the product.',
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
    </script>

    <!-- To handle tabs and line breaks in textarea -->
    <script>
        document.getElementById('product-description').addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                e.preventDefault();

                let start = this.selectionStart;
                let end = this.selectionEnd;

                this.value = this.value.substring(0, start) + "\t" + this.value.substring(end);

                this.selectionStart = this.selectionEnd = start + 1;
            }
        });
    </script>
@endpush

@section('content')
    <div class="center-wrapper">
        <div class="product-form-container">
            <h2>Update Product</h2>
            <form action="{{ route('product.update', $product->id) }}" id="product-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="product-name">Product Name:</label>
                <input type="text" value="{{ $product->product_name }}" id="product-name" name="product_name" placeholder="Enter product name" required>

                <label for="product-title">Title</label>
                <input type="text" value="{{ $product->product_title }}" id="product-title" name="product_title" placeholder="Enter title" required>

                <label for="product-description">Description:</label>
                <textarea id="product-description" name="product_description" rows="4" placeholder="Enter product description" required>{{  $product->product_description }}</textarea>

                <label for="product-category">Category:</label>
                <select id="product-category" name="product_type" required>
                    <option value="">Select a category</option>
                    @foreach($productTypes as $type)
                        <option value="{{ $type->product_type_name }}" {{ $product->product_type == $type->product_type_name ? 'selected' : '' }}>
                            {{ $type->product_type_name }}
                        </option>
                    @endforeach
                </select>

                <label for="product-image">Upload Image:</label>
                <img src="{{ asset($product->product_image) }}" alt="Product Image">
                <input type="file" id="product-image" name="product_image" accept="image/*">

                <input type="submit" value="Update Product">
            </form>
        </div>
    </div>
@endsection
