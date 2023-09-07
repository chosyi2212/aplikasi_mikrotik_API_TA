<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('template-dashboard') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('template-dashboard') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('template-dashboard') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('template-dashboard') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('template-dashboard') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('template-dashboard') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template-dashboard') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('template-dashboard') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template-dashboard') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template-dashboard') }}/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('template-dashboard') }}/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('template-dashboard') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('template-dashboard') }}/plugins/chart.js/Chart.min.js"></script>

{{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<!-- PAGE SCRIPTS -->
<script src="{{ asset('template-dashboard') }}/dist/js/pages/dashboard2.js"></script>
<!-- DataTables -->
<script src="{{ asset('template-dashboard') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('template-dashboard') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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

    $(document).ready(function(){
        $('#jatuh_tempo').on('change',function(){
            var id_pelanggan = $(this).val();
            console.log(id_pelanggan);
            if (id_pelanggan) {
                $.ajax({
                url :'/getbulan/' + id_pelanggan,
                type :'GET',
                data :{
                    '_token':'{{ csrf_token() }}'
                },
                dataType:'json',
                success: function(data){
                    console.log(data);
                    // $('#paket').empty();
                    // $('#paket').append('<option selected="selected" value="'+data.pakets_id+'">'+data.namapaket+'</option>');

                    $('#bulan').val(data.bulan);
                }
                });

            } else {

            }
        });
    });

    function combineInputs(value) {
      var input1 = document.getElementById("bulan").value;
      var input2 = document.getElementById("tahun").value;
      var combinedOutput = document.getElementById("output").value =  input1 + "-" + input2;

    //   document.getElementById("output").value =+ combinedOutput;
    }


    function copyInputValue(value) {
            document.getElementById("input1").value = value;
            document.getElementById("inputcom2").value = value;
        }
    $( "#mata" ).click(function(){
        var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
    });
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
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



    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  </script>
