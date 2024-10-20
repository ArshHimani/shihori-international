@extends('admin.admin-master')

@push('styles')
    <style>
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 2px solid black;
        }
        .product-table th, .product-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
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
            max-width: 100px;
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
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(productId) {
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
                    // Submit the delete form
                    document.getElementById('delete-form-' + productId).submit();
                }
            });
        }

        // @if(session('success'))
        //     Swal.fire({
        //         title: 'Success!',
        //         text: "{{ session('success') }}",
        //         icon: 'success',
        //         confirmButtonText: 'OK'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // After clicking OK, redirect to another page
        //             window.location.href = '{{ route('admin.index') }}'; // Specify your route here
        //         }
        //     });
        // @endif
    </script>
@endpush

@section('content')
<a href="{{route('new.product')}}" class="btn btn-primary">New Product</a>
    <h2 class="text-center">All Products</h2>
    <table class="product-table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Image</th>
                <th>Product Name</th>
                <th>Title</th>
                <th>Type</th>
                <th colspan="2">More Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <!-- <td class="product-id">{{ $product->id }}</td> -->
                    <td><img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"></td>
                    <td class="product-name">{{ $product->product_name }}</td>
                    <td class="product-title">{{ $product->product_title }}</td>
                    <td class="product-type">{{ $product->product_type }}</td>
                    <td>
                        <!-- Update Icon -->
                        <a href="{{ route('product.update', $product->id) }}">  
                            <i class="info-icon fas fa-info-circle"></i>
                        </a>
                    </td>
                    <td>
                        <!-- Delete Icon -->
                        <span onclick="confirmDelete({{ $product->id }})">
                            <i class="fa fa-trash"></i>
                        </span>

                        <!-- Hidden Form for Delete -->
                        <form id="delete-form-{{ $product->id }}" action="{{ route('product.delete', $product->id) }}" method="GET" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
