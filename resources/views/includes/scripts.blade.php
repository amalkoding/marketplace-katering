<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
    <div id="successToast"
        class="toast align-items-center {{ Route::is('login') || Route::is('register') ? 'text-bg-white' : 'text-bg-dark' }} border-0"
        role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button"
                class="btn-close {{ Route::is('login') || Route::is('register') ? 'btn-close-dark' : 'btn-close-white' }} me-2 m-auto"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var toast = new bootstrap.Toast($('#successToast')[0]);
        toast.show();
    });
</script>
@endif
@if(session('error'))
<div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
    <div id="errorToast"
        class="toast align-items-center {{ Route::is('login') || Route::is('register') ? 'text-bg-white' : 'text-bg-dark' }} border-0"
        role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('error') }}
            </div>
            <button type="button"
                class="btn-close {{ Route::is('login') || Route::is('register') ? 'btn-close-dark' : 'btn-close-white' }} me-2 m-auto"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var toast = new bootstrap.Toast($('#errorToast')[0]);
        toast.show();
    });
</script>
@endif
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script>
    $(document).on('click', '#delete-btn', function(event) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'btn btn-dark',
                cancelButton: 'btn btn-outline-dark'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        });
    });
</script>