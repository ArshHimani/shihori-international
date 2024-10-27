<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.6.0-web/css/all.css') }}">

    <style>
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
            max-width: 400px;
            width: 100%;
            text-align: left;
            margin: 20px;
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

        let oldPassword = document.getElementById('old-password');
        if (oldPassword.value.trim() === '') {
            isValid = false;
            oldPassword.nextElementSibling.textContent = 'Old Password is required';
        }

        let newPassword = document.getElementById('new-password');
        if (newPassword.value.trim() === '') {
            isValid = false;
            newPassword.nextElementSibling.textContent = 'New Password is required';
        }

        let confirmPassword = document.getElementById('confirm-password');
        if (confirmPassword.value.trim() === '') {
            isValid = false;
            confirmPassword.nextElementSibling.textContent = 'Confirm Password is required';
        } else if (confirmPassword.value !== newPassword.value) {
            isValid = false;
            confirmPassword.nextElementSibling.textContent = 'Passwords do not match';
        }

        if (isValid) {
            let formData = new FormData(this);

            fetch('{{ route('change.password') }}', {
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
                        if (result.isConfirmed && data.logout) {
                            window.location.href = '{{ route('login') }}';
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
</head>
<body>
    <div class="center-wrapper">
        <div class="product-form-container">
            <h2>Change Password</h2>
            <form action="{{ route('change.password') }}" id="product-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="user-name">Username:</label>
                <input type="text" id="user-name" name="user_name" placeholder="James@123">
                <span class="error"></span>

                <label for="old-password">Old Password:</label>
                <input type="password" id="old-password" name="old_password" placeholder="******">
                <span class="error"></span>

                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new_password" placeholder="******">
                <span class="error"></span>

                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="******">
                <span class="error"></span>

                <input type="submit" value="CHANGE PASSWORD">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
