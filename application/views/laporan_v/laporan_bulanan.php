<?php
$this->load->view('template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        MASTER PROGRAM
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container text-center py-3" style="width: 500px; margin-top: 50px;">
        <h2 class="text-center py-3">Data Penjualan</h2>
            <table class="table" style="width: 500px;">
                <caption class="text-dark" style="font-weight: bold;">Menampilkan Data Menurut Bulan</caption>
                    <form action="<?php echo base_url(); ?>index.php/LAPORAN_COL/LAPORAN_BULANAN_COL/tabel_bulanan" method="get">
                        <tr>
                            <th><label for="input_tanggal_satuan">Input Bulan</label></th>
                                <td><input type="month" name="data_bulan" id="input_tanggal_satuan" class="form-control" value=""></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="simpan" class="btn btn-primary"></td>
                        </tr>
                    </form>
            </table>
    </div>
</section>


<?php
$this->load->view('template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $(".btn-status").click(function () {
            var btn = $(this);
            // alert("<?php echo base_url('index.php/Dashboard1/proses_jemur'); ?>");
            $.post(
                //bagian 1: url
                "<?php echo base_url('index.php/Dashboard1/proses_jemur'); ?>",
                //bagian 2: data
                {
                    id: btn.data("id"),
                    status: btn.data("status")
                },
                //bagian 3: callback
                function (response) {
                    btn.parent().parent().find(".span-status").text(btn.data("status"));
                }
            );
        });

        $(".select-status").change(function () {
            var select = $(this),
                option = select.find("option:selected");
            // alert("<?php echo base_url('index.php/Dashboard1/proses_jemur'); ?>");
            $.post(
                //bagian 1: url
                "<?php echo base_url('index.php/Dashboard1/proses_jemur'); ?>",
                //bagian 2: data
                {
                    id: option.data("id"),
                    status: option.data("status")
                },
                //bagian 3: callback
                function (response) {
                    select.parent().parent().find(".span-status").text(option.data("status"));
                }
            );
        });
    });
</script>
<?php
$this->load->view('template/foot');
?>