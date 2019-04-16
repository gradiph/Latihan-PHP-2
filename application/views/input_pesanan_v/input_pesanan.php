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
        <li><a href="#"><i class="fa fa-dashboard"></i> Input Pesanan</a></li>
       
    </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <!-- Main content -->
<div class="container" style="width: 500px; margin-top: 50px;">
                <table class="table" >
                    <h1 class="text-center">Input Pesanan</h1>
                    <br>
                    <form action="<?php echo base_url(); ?>index.php/INPUT_PESANAN_COL/Input_pesanan_col/input_pesanan_pegawai" method="post">
                        <tr>
                            <th><label for="nama">Nama</label></th>
                                <td><input type="text" id="nama" name="nama" class="form-control" value="" placeholder="Input Nama"></td>
                        </tr>
                        <tr>
                            <th><label for="alamat">Alamat</label></th>
                            <td><input type="text" id="alamat" name="alamat" class="form-control" value="" placeholder="Input Alamat"></td>
                        </tr>
                        <tr>
                            <th><label for="no_hp">No Hp</label></th>
                                <td><input type="number" name="no_hp" id="no_hp" class="form-control" required autofocus maxlength="20" placeholder="Input No Hp"></td>
                        </tr>
                        <tr>
                            <th><label for="jenis">Jenis</label></th>
                                <td><input type="text" name="jenis" id="jenis" class="form-control" required autofocus maxlength="20" placeholder="Input Jenis Pakaian"></td>
                        </tr>
                        <tr>
                            <td class="text-center"><span class="btn-nama data-nama">Untuk Macam2 Jenis</span></td>
                        </tr>
                        <tr>
                            <th><label for="kg">Kilogram</label></th>
                                <td><input type="text" name="kg" id="kg" class="form-control" autofocus maxlength="20" placeholder="Input Kilogram"></td>
                        </tr>
                        <tr>
                            <th><label for="harga">Harga</label></th>
                                <td><input type="text" name="harga" id="harga" class="form-control" autofocus maxlength="20" placeholder="Input Harga"></td>
                        </tr>
                        <tr>
                            <th><label for="tgl_masuk">Tanggal Masuk</label></th>
                                <td><input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required autofocus maxlength="20" placeholder="Input Tanggal Masuk"></td>
                        </tr>
                        <tr>
                            <th><label for="tgl_keluar">Tanggal Keluar</label></th>
                                <td><input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control" required autofocus maxlength="20" placeholder="Input Tanggal Keluar"></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="simpan" class="btn btn-primary">Submit</button></td>
                        </tr>
                    </form>
                </table>
        </div>
</section>

            <!-- Modal 2 -->
            <div class="modal fade" id="contoh2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="width: 800px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Jenis Campuran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped bg-secondary text-light">
                                <!-- <tr>
                                    <span id="modal-nama"></span><input type="text" name="nama"><br>
                                    Tempat, Tanggal lahir : <span id="modal-ttl"></span><br>
                                    Alamat : <span id="modal-alamat"></span><br>
                                    Telephon : <span id="modal-telephon"></span><br>
                                    Agama : <span id="modal-agama"></span><br>
                                    Jabatan : <span id="modal-jabatan"></span>
                                </tr> -->
                                <thead class="bg-info text-light">
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Jenis</th>
                                        <th class="text-center" scope="col">Kg</th>
                                        <th class="text-center" scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="<?php echo base_url(); ?>index.php/INPUT_PESANAN_COL/Input_pesanan_col/input_pesanan_pegawai" method="post">
                                    <tr>
                                        <th class="text-center" scope="col">1</th>
                                        <th class="text-center" scope="col"><input type="text" name="jenis" class="form-control"></th>
                                        <th class="text-center" scope="col"><input type="text" name="kg" class="form-control"></th>
                                        <th class="text-center" scope="col"><input type="text" name="harga" class="form-control"></th>
                                    </tr>
                                     <tr>
                                        <th class="text-center" scope="col">2</th>
                                        <th class="text-center" scope="col"><input type="text" name="jenis"></th>
                                        <th class="text-center" scope="col"><input type="text" name="kg"></th>
                                        <th class="text-center" scope="col"><input type="text" name="harga"></th>
                                    </tr>
                                     <tr>
                                        <th class="text-center" scope="col">3</th>
                                        <th class="text-center" scope="col"><input type="text" name="jenis"></th>
                                        <th class="text-center" scope="col"><input type="text" name="kg"></th>
                                        <th class="text-center" scope="col"><input type="text" name="harga"></th>
                                    </tr>
                                     <tr>
                                        <th class="text-center" scope="col">4</th>
                                        <th class="text-center" scope="col"><input type="text" name="jenis"></th>
                                        <th class="text-center" scope="col"><input type="text" name="kg"></th>
                                        <th class="text-center" scope="col"><input type="text" name="harga"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <tfoot>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" name="simpan">Submit</button>
                            </div>
                        </tfoot>
                    </div>
                </div>
            </div>


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

<script>
    //trigger click pada nama karyawan (Pake Bootstrap)
    $(".btn-nama").click(function () {
    //memanggil modal
    $('#contoh2').modal('show');
    //update isi modal
    $("#modal-nama").html($(this).parent().parent().find(".data-nama").text());
    $("#modal-ttl").html($(this).parent().parent().find(".data-ttl").text());
    $("#modal-alamat").html($(this).parent().parent().find(".data-alamat").text());
    $("#modal-telephon").html($(this).parent().parent().find(".data-telephon").text());
    $("#modal-agama").html($(this).parent().parent().find(".data-agama").text());
    $("#modal-jabatan").html($(this).parent().parent().find(".data-jabatan").text());
    });
</script>

<?php
$this->load->view('template/foot');
?>