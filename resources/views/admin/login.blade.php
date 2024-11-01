<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1E04JgHfkLM7N4E" crossorigin="anonymous">
    
    <!-- Optional Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.css') }}">
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
        input[type="text"], input[type="password"] {
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

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('product-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        document.querySelectorAll('.error').forEach(el => el.textContent = '');

        let isValid = true;

        // Validate fields as before...
        let userName = document.getElementById('user-name');
        if (userName.value.trim() === '') {
            isValid = false;
            userName.nextElementSibling.textContent = 'User name is required';
        }

        let Password = document.getElementById('password');
        if (Password.value.trim() === '') {
            isValid = false;
            Password.nextElementSibling.textContent = 'Password is required';
        }

       

        if (isValid) {
            let formData = new FormData(this);

            fetch('{{ route('login.check') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                if (data.success) {
                    // Success: show SweetAlert with success message
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route('admin.index') }}';
                        }
                    });
                } else {
                    // Error: show SweetAlert with error message
                    Swal.fire({
                        title: 'Error!',
                        text: data.message || 'An error occurred.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    });
});

        
    </script>
    

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
            <h2>Login</h2>
            <form action="{{ route('login.check') }}" id="product-form" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="product-name">Username:</label>
                <input type="text" id="user-name" name="user_name" placeholder="James@123" required>
                <span class="error"></span>

                <label for="category-description">Password:</label>
                <input type="password" id="password" name="password" placeholder="******" required>
                <span class="error"></span>

                <input type="submit" value="LOGIN">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
