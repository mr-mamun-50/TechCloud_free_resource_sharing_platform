{{-- Bootstrap 4 JS --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script src="{{ asset('asset') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('asset') }}/js/jquery.appear.js"></script>
<script src="{{ asset('asset') }}/js/jquery.fitvids.js"></script>
<script src="{{ asset('asset') }}/js/jquery.nicescroll.min.js"></script>
<script src="{{ asset('asset') }}/js/lightbox.min.js"></script>
<script src="{{ asset('asset') }}/js/count-to.js"></script>
<script src="{{ asset('asset') }}/js/styleswitcher.js"></script>

<script src="{{ asset('asset') }}/js/map.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="{{ asset('asset') }}/js/script.js"></script>

<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Sweetalert js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Datatables JS -->
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "ordering": false,
            lengthMenu: [
                [5, 10, 25, 50],
                [5, 10, 25, 50],
            ],
        });
    });
</script>

<!-- Summernote -->
<script src="{{ asset('adm') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $('.summernote').summernote({
        placeholder: 'Enter text here...',
        tabsize: 4,
        height: 200
    });
</script>

<script>
    $('.delete').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "Once deleted, you will not be able to recover this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    });
</script>
<script>
    $('.logout').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: 'Do you want to log out now?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    });
</script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
