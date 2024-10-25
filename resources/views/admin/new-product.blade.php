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
        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
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
            e.preventDefault(); // Prevent default submission

            // Clear previous errors
            document.querySelectorAll('.error').forEach(el => el.innerHTML = '');

            let hasError = false;

            // Validation rules
            const fields = [
                { id: 'product-name', message: 'Product Name is required' },
                { id: 'product-title', message: 'Title is required' },
                { id: 'product-description', message: 'Description is required' },
                { id: 'product-category', message: 'Category is required' },
                { id: 'product-image', message: 'Image is required' }
            ];

            // Check each field
            fields.forEach(field => {
                let input = document.getElementById(field.id);
                if (input.value.trim() === '') {
                    hasError = true;
                    const errorElement = document.createElement('div');
                    errorElement.classList.add('error');
                    errorElement.innerHTML = field.message;
                    input.parentNode.insertBefore(errorElement, input.nextSibling);
                }
            });

            // If no errors, proceed with form submission
            if (!hasError) {
                let formData = new FormData(this); // Create form data object from form

                fetch('{{ route('product.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Product added successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route('new.product') }}';
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message || 'An error occurred while adding the product.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Product already exists.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            }
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

    <div class="center-wrapper">
        <div class="product-form-container">
            <h2>Add New Product</h2>
            <form action="{{route('product.store')}}" id="product-form" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product_name" placeholder="Enter product name" required>

                <label for="product-title">Title:</label>
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
