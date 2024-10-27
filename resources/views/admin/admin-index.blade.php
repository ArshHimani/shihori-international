@extends('admin.admin-master')

@push('styles')
    <style>
        .product-table-container {
            overflow-x: auto; /* Enable horizontal scrolling */
            margin-top: 20px; /* Spacing above the table */
        }

        .product-table {
            width: 100%; /* Full width of the container */
            border-collapse: collapse;
            border: 2px solid black;
        }

        .product-table th, .product-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center; /* Center align table content */
            white-space: nowrap; /* Prevent text wrapping */
        }

        .product-table th {
            background-color: white;
            color: black;
            font-weight: bold;
            border-bottom: 2px solid black;
            font-size: 20px;
        }

        .product-table td {
            background-color: #fff;
            color: #333;
        }

        .product-table img {
            max-width: 100px; /* Ensure the image doesn't exceed this width */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            color: #00416A;
        }

        .product-type {
            font-size: 12px;
            color: #888;
        }

        i {
            font-size: 20px;
            color: black;
            cursor: pointer;
        }

        .info-icon:hover {
            color: black;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .product-table th, .product-table td {
                padding: 10px; /* Adjust padding for smaller screens */
                font-size: 14px; /* Smaller font size for better fit */
            }

            .product-title {
                font-size: 16px; /* Adjust title size for smaller screens */
            }

            .product-type {
                font-size: 10px; /* Adjust type size for smaller screens */
            }

            i {
                font-size: 18px; /* Adjust icon size for smaller screens */
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(productTypeId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productTypeId).submit();
                }
            });
        }

        // ... (rest of your JavaScript code remains unchanged)
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

<a href="{{ route('productType.show') }}" class="btn btn-primary">New Category</a>

<h2 class="text-center">All Categories</h2>

<div class="product-table-container">
    <table class="product-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Category Name</th>
                <th>Category Title</th>
                <th>Choose Image</th>
                <th colspan="2">More Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productTypes as $productType)
            <tr>
                <form id="update-form-{{ $productType->id }}" action="{{ route('productType.update', $productType->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm({{ $productType->id }})">
                    @csrf
                    <td>
                        <img src="{{ asset($productType->product_type_image) }}" class="open-modal" data-image="{{ asset($productType->product_type_image) }}" alt="Image">
                        {{$productType->id}}
                    </td>
                    <td class="product-name">
                        <input type="text" value="{{ old('productType_name', $productType->product_type_name) }}" name="productType_name" id="productType_name_{{ $productType->id }}">
                        <div id="error-productType_name-{{ $productType->id }}" class="text-danger"></div>
                    </td>
                    <td class="product-name">
                        <input type="text" value="{{ old('productType_description', $productType->product_type_description) }}" name="productType_description" id="productType_description_{{ $productType->id }}">
                        <div id="error-productType_description-{{ $productType->id }}" class="text-danger"></div>
                    </td>
                    <td>
                        <input type="file" name="productType_image" id="productType_image_{{ $productType->id }}">
                        <div id="error-productType_image-{{ $productType->id }}" class="text-danger"></div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </td>
                </form>
                <td>
                    <span onclick="confirmDelete({{ $productType->id }})">
                        <i class="fa fa-trash"></i>
                    </span>
                    <form id="delete-form-{{ $productType->id }}" action="{{ route('productType.delete', $productType->id) }}" method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal structure for full-screen image display -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Category Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Full Image" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>
@endsection
