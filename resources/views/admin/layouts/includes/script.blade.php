<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="{{ asset('adm') }}/assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="{{ asset('adm') }}/assets/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/chart.js/Chart.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{ asset('adm') }}/assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('adm') }}/assets/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="{{ asset('adm') }}/assets/js/script.js"></script>
<script type="text/javascript " src="{{ asset('adm') }}/assets/js/SmoothScroll.js"></script>
<script src="{{ asset('adm') }}/assets/js/pcoded.min.js"></script>
<script src="{{ asset('adm') }}/assets/js/vartical-demo.js"></script>
<script src="{{ asset('adm') }}/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Sweetalert js -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('.delete').click(function(event) {
        var form = $(this).closest("form");
        // var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: "Are you want to delete this row?",
                text: "Once deleted, you will not be able to recover this category!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
    // $(document).on("click", ".delete", function(e) {
    //     e.preventDefault();
    //     var link = $(this).attr("href");
    //     swal({
    //             title: "Do you want to delete this category?",
    //             text: "Once deleted, you will not be able to recover this category!",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 window.location.href = link;
    //             } else {
    //                 swal("Your category is safe!");
    //             }
    //         });
    // });
</script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch(type) {
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
