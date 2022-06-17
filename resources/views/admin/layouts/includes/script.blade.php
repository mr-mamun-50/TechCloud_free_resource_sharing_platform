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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('adm') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('adm') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('adm') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('adm') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('adm') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('adm') }}/plugins/summernote/summernote-bs4.min.js"></script>

<!-- Google charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Summernote script -->
<script>
    $('.summernote').summernote({
        placeholder: 'Enter text here...',
        tabsize: 4,
        height: 200
    });
</script>


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Services', 'Numbers'],
            ['Software',
                <?php
                if (isset($soft_cnt)) {
                    echo $soft_cnt;
                }
                ?>
            ],
            ['Designs',
                <?php
                if (isset($des_cnt)) {
                    echo $des_cnt;
                }
                ?>
            ],
            ['Articles',
                <?php
                if (isset($artcl_cnt)) {
                    echo $artcl_cnt;
                }
                ?>
            ],
            ['Videos',
                <?php
                if (isset($video_cnt)) {
                    echo $video_cnt;
                }
                ?>
            ]
        ]);

        var options = {
            bar: {
                groupWidth: "50%"
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Articles', 'Comments'],
            ['Commented',
                <?php
                if (isset($cmnt_post_cnt)) {
                    echo $cmnt_post_cnt;
                }
                ?>
            ],
            ['Not Commented',
                <?php
                if (isset($uncmnt_posts)) {
                    echo $uncmnt_posts;
                }
                ?>
            ]
        ]);

        var options = {
            // title: 'Comments',
            is3D: true,
            chartArea: {
                width: 400,
                height: 300
            }
        };


        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
