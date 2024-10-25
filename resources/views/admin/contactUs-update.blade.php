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
        fetch('{{ route('contactUs.update')}}', {
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
                        window.location.href = '{{ route('contactUs')}}';
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

        // Display the error details in the alert
            Swal.fire({
            title: 'Error!',
            text: `Error occurred: ${error.message}`, // Show detailed error message
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
            <h2>Update AboutUs</h2>
            <form action="{{ route('contactUs.update')}}" id="product-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @foreach($contactUs as $contactUs)
                <input type="hidden" name="contactUs_id" value="{{$contactUs->id}}">
                    <label for="product-name">Paragraphp</label>
                    <textarea id="product-description" name="paragraph" rows="4" placeholder="Paragraphp 1" required>{{  $contactUs->paragraph }}</textarea>

                    <label for="product-title">Phone No</label>
                    <input type="text" name="phoneNo" id="" value="{{$contactUs->phoneNo}}">

                    <label for="product-description">Email</label>
                    <input type="text" name="email" id="" value="{{$contactUs->email}}">

                    <label for="product-description">Address</label>
                    <textarea id="product-description" name="address" rows="4" placeholder="FeatureBox 1" required>{{  $contactUs->address }}</textarea>

                    <label for="product-description">Opening Hours</label>
                    <textarea id="product-description" name="opening_hours" rows="4" placeholder="FeatureBox 2 Title" required>{{  $contactUs->opening_hours}}</textarea>

                    <label for="product-title">Whatsapp Link</label>
                    <input type="text" name="whatsapp" id="" value="{{$contactUs->whatsapp}}">

                    <label for="product-title">Facebook Link</label>
                    <input type="text" name="facebook" id="" value="{{$contactUs->facebook}}">

                    <label for="product-title">Instagram Link</label>
                    <input type="text" name="instagram" id="" value="{{$contactUs->instagram}}">

                    <label for="product-title">LinkedIn Link</label>
                    <input type="text" name="linkedIn" id="" value="{{$contactUs->linkedIn}}">
                @endforeach
                <input type="submit" value="Update Product">
            </form>
        </div>
    </div>
@endsection
