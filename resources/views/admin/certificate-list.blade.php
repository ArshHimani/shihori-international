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
        function confirmDelete(certificateId) {
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
                    document.getElementById('delete-form-' + certificateId).submit();
                }
            });
        }

        function confirmUpdate(certificateId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the delete form
                    document.getElementById('update-form-' + certificateId).submit();
                }
            });
        }

        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // After clicking OK, redirect to another page
                    window.location.href = '{{ route('certificate.list') }}'; // Specify your route here
                }
            });
        @endif

        document.querySelectorAll('.open-modal').forEach(button => {
            button.addEventListener('click', function() {
                let imageUrl = this.getAttribute('data-image');
                document.getElementById('modalImage').setAttribute('src', imageUrl);
                let modal = new bootstrap.Modal(document.getElementById('imageModal'));
                modal.show();
            });
        });


        document.querySelectorAll('form[id^="update-form-"]').forEach(form => {
        form.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let formId = this.getAttribute('id'); // Get the current form ID
        let formData = new FormData(this); // Create form data object from the form

        // Perform the actual form submission via AJAX
        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
            },
            body: formData
        })
        .then(response => response.json()) // Assuming the server responds with JSON
        .then(data => {
            if (data.success) {
                // Show success message if the certificate was updated successfully
                Swal.fire({
                    title: 'Success!',
                    text: 'Certificate updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Reload the page or take any further action if needed
                        window.location.reload(); // You can change this to a specific route if needed
                    }
                });
            } else {
                // Show error message if something went wrong
                Swal.fire({
                    title: 'Error!',
                    text: data.message || 'An error occurred while updating the certificate.',
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
});

    </script>
@endpush

@section('content')
            <a href="{{route('certificate.show')}}" class="btn btn-primary">New Certificate</a>

            <h2 class="text-center">All Certificates</h2>
    <table class="product-table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Image</th>
                <th>Certificate Name</th>
                <th>Choose Image</th>
                <th colspan="2">More Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach($certificates as $certificate)
                <tr>
                <form id="update-form-{{ $certificate->id }}" action="{{ route('certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                    
                    <td><img src="{{ asset($certificate->certificate_image) }}" class="open-modal" data-image="{{ asset($certificate->certificate_image) }}" alt="Image"> {{$certificate->id}}</td>
                    <td class="product-name">
                        <input type="text" value="{{ $certificate->certificate_name }}" name="certificate_name" id="">
                    </td>
                    <td>
                        <!-- Update Icon -->
                        <input type="file" name="certificate_image" id="">
                    </td>
                    <td>
                       <span onclick="confirmUpdate({{ $certificate->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                       </span>
                    </td>
                    </form>
                    <td>
                        <!-- Delete Icon -->
                        <span onclick="confirmDelete({{ $certificate->id }})">
                            <i class="fa fa-trash"></i>
                        </span>
                        <form id="delete-form-{{ $certificate->id }}" action="{{ route('certificate.delete', $certificate->id) }}" method="GET" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

     <!-- Modal structure for full-screen image display -->
     <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Certificate Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Full Image">
                </div>
            </div>
        </div>
    </div>
@endsection
