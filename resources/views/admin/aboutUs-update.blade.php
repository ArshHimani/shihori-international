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
        fetch('{{ route('aboutUs.update')}}', {
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
                        window.location.href = '{{ route('aboutUs')}}';
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
      
        document.getElementById('product-description').addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                e.preventDefault();

                let start = this.selectionStart;
                let end = this.selectionEnd;

                this.value = this.value.substring(0, start) + "\t" + this.value.substring(end);

                this.selectionStart = this.selectionEnd = start + 1;
            }
        });


        function validateForm() {
    let valid = true;

    // Get all the form fields
    let para1Field = document.querySelector('textarea[name="para1"]');
    let para2Field = document.querySelector('textarea[name="para2"]');
    let feature1TitleField = document.querySelector('textarea[name="feature1_title"]');
    let feature1Field = document.querySelector('textarea[name="feature1"]');
    let feature2TitleField = document.querySelector('textarea[name="feature2_title"]');
    let feature2Field = document.querySelector('textarea[name="feature2"]');
    let feature3TitleField = document.querySelector('textarea[name="feature3_title"]');
    let feature3Field = document.querySelector('textarea[name="feature3"]');

    // Error elements
    let para1Error = document.getElementById('error-paragraph1');
    let para2Error = document.getElementById('error-paragraph2');
    let feature1TitleError = document.getElementById('error-featurebox1_title');
    let feature1Error = document.getElementById('error-featurebox1');
    let feature2TitleError = document.getElementById('error-featurebox2_title');
    let feature2Error = document.getElementById('error-featurebox2');
    let feature3TitleError = document.getElementById('error-featurebox3_title');
    let feature3Error = document.getElementById('error-featurebox3');

    // Reset error messages
    para1Error.innerHTML = '';
    para2Error.innerHTML = '';
    feature1TitleError.innerHTML = '';
    feature1Error.innerHTML = '';
    feature2TitleError.innerHTML = '';
    feature2Error.innerHTML = '';
    feature3TitleError.innerHTML = '';
    feature3Error.innerHTML = '';

    // Validate Paragraph 1
    if (para1Field.value.trim() === '') {
        para1Error.innerHTML = 'Paragraph 1 is required.';
        valid = false;
    }

    // Validate Paragraph 2
    if (para2Field.value.trim() === '') {
        para2Error.innerHTML = 'Paragraph 2 is required.';
        valid = false;
    }

    // Validate Feature Box 1 Title
    if (feature1TitleField.value.trim() === '') {
        feature1TitleError.innerHTML = 'Feature Box 1 Title is required.';
        valid = false;
    }

    // Validate Feature Box 1
    if (feature1Field.value.trim() === '') {
        feature1Error.innerHTML = 'Feature Box 1 is required.';
        valid = false;
    }

    // Validate Feature Box 2 Title
    if (feature2TitleField.value.trim() === '') {
        feature2TitleError.innerHTML = 'Feature Box 2 Title is required.';
        valid = false;
    }

    // Validate Feature Box 2
    if (feature2Field.value.trim() === '') {
        feature2Error.innerHTML = 'Feature Box 2 is required.';
        valid = false;
    }

    // Validate Feature Box 3 Title
    if (feature3TitleField.value.trim() === '') {
        feature3TitleError.innerHTML = 'Feature Box 3 Title is required.';
        valid = false;
    }

    // Validate Feature Box 3
    if (feature3Field.value.trim() === '') {
        feature3Error.innerHTML = 'Feature Box 3 is required.';
        valid = false;
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
    <div class="center-wrapper">
        <div class="product-form-container">
            <h2>Update AboutUs</h2>
            <form action="{{ route('aboutUs.update')}}" id="product-form" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                @method('PUT')

                @foreach($aboutUs as $about)
                <input type="hidden" name="aboutUs_id" value="{{$about->id}}">
                    <label for="product-name">Paragraphp 1</label>
                    <textarea id="product-description" name="para1" rows="4" placeholder="Paragraphp 1" required>{{  $about->para1 }}</textarea>
                    <div id="error-paragraph1" class="text-danger"></div>

                    <label for="product-title">Paragraphp 2</label>
                    <textarea id="product-description" name="para2" rows="4" placeholder="Paragraphp 2" required>{{  $about->para2 }}</textarea>
                    <div id="error-paragraph2" class="text-danger"></div>

                    <label for="product-description">FeatureBox1 Title</label>
                    <textarea id="product-description" name="feature1_title" rows="4" placeholder="FeatureBox 1 Title" required>{{  $about->feature1_title }}</textarea>
                    <div id="error-featurebox1_title" class="text-danger"></div>

                    <label for="product-description">FeatureBox 1</label>
                    <textarea id="product-description" name="feature1" rows="4" placeholder="FeatureBox 1" required>{{  $about->feature1 }}</textarea>
                    <div id="error-featurebox1" class="text-danger"></div>

                    <label for="product-description">FeatureBox2 Title</label>
                    <textarea id="product-description" name="feature2_title" rows="4" placeholder="FeatureBox 2 Title" required>{{  $about->feature2_title}}</textarea>
                    <div id="error-featurebox2_title" class="text-danger"></div>

                    <label for="product-category">FeatureBox 2</label>
                    <textarea id="product-description" name="feature2" rows="4" placeholder="FeatureBox 2" required>{{  $about->feature2 }}</textarea>
                    <div id="error-featurebox2" class="text-danger"></div>

                    <label for="product-description">FeatureBox3 Title</label>
                    <textarea id="product-description" name="feature3_title" rows="4" placeholder="FeatureBox 3 Title" required>{{  $about->feature3_title}}</textarea>
                    <div id="error-featurebox3_title" class="text-danger"></div>

                    <label for="product-category">FeatureBox 3:</label>
                    <textarea id="product-description" name="feature3" rows="4" placeholder="FeatureBox 3" required>{{  $about->feature3 }}</textarea>
                    <div id="error-featurebox3" class="text-danger"></div>

                @endforeach
                <input type="submit" value="Update Product">
            </form>
        </div>
    </div>
@endsection
