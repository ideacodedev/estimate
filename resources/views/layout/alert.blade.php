@if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ session('error') }}',
            showCancelButton: false,
            confirmButtonColor: '#FF0000',
            confirmButtonText: 'ยืนยัน'
        });
    </script>
@endif
@if ($errors->any('error'))
    @foreach ($errors->all() as $errors)
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ $errors }}',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ยืนยัน'
            });
        </script>
    @endforeach
@endif
