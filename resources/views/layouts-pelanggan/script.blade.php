<!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('template-pelanggan') }}/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('template-pelanggan') }}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template-pelanggan') }}/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('template-pelanggan') }}/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('template-pelanggan') }}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('template-pelanggan') }}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('template-pelanggan') }}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
     <script src="{{ asset('template-pelanggan') }}/dist/js/pages/dashboards/dashboard1.js"></script>
    <!-- Charts js Files -->
    <script src="{{ asset('template-pelanggan') }}/libs/flot/excanvas.js"></script>
    <script src="{{ asset('template-pelanggan') }}/libs/flot/jquery.flot.js"></script>
    <script src="{{ asset('template-pelanggan') }}/libs/flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('template-pelanggan') }}/libs/flot/jquery.flot.time.js"></script>
    <script src="{{ asset('template-pelanggan') }}/libs/flot/jquery.flot.stack.js"></script>
    <script src="{{ asset('template-pelanggan') }}/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="{{ asset('template-pelanggan') }}/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="{{ asset('template-pelanggan') }}/dist/js/pages/chart/chart-page-init.js"></script>
    <script>
        $(document).ready(function(){
            $('#service').on('change',function(){
                var id_pelanggan = $(this).val();
                // console.log(id_pelanggan);
                if (id_pelanggan) {
                    $.ajax({
                    url :'/getpaket/' + id_pelanggan,
                    type :'GET',
                    data :{
                        '_token':'{{ csrf_token() }}'
                    },
                    dataType:'json',
                    success: function(data){
                        console.log(data);
                        // $('#paket').empty();
                        // $('#paket').append('<option selected="selected" value="'+data.pakets_id+'">'+data.namapaket+'</option>');

                        $('#harga').val(data.harga);
                        $('#kirim').val(data.harga);

                    }
                    });

                } else {

                }
            });
        });
    </script>
