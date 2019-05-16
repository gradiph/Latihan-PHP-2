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
    <div class="container" style="width: 1000px; margin-top: 10px;">
         <h1 class="text-center">Kelola Pesanan</h1>
                <table class="table" style="border: 1px solid black">
                        <thead>
                                <tr class="text-left text-bold" style="border: 1px solid black">
                                    <td class="col" style="border: 1px solid black">No</td>
                                    <td class="col text-center" style="border: 1px solid black">Nama</td>
                                    <td class="col text-center" style="border: 1px solid black">Alamat</td>
                                    <td class="col text-center" style="border: 1px solid black">No Hp</td>
                                    <td class="col text-center" style="border: 1px solid black">Tgl Masuk</td>
                                    <td class="col text-center" style="border: 1px solid black">Tgl Keluar</td>
                                    <td class="col text-center" style="border: 1px solid black">Jenis</td>
                                    <td class="col text-center" style="border: 1px solid black">Kg</td>
                                    <td class="col text-center" style="border: 1px solid black">Harga</td>
                                    <td class="col text-center" style="border: 1px solid black">Status</td>
                                    <td class="col text-center" style="border: 1px solid black">Aktivitas</td>
                                </tr>
                        </thead>
                       <tbody>
                        <?php
                            $i = 0;
                            foreach ($pesanan_laundry->result() as $key => $value) {
                                ?>
                                <tr class="text-center">
                                    <th class="text-center" style="border: 1px solid black"><?php echo ++$i; ?></th>
                                    <td style="border: 1px solid black"><?php echo $value->nama; ?></td>
                                    <td style="border: 1px solid black"><?php echo $value->alamat; ?></td>
                                    <td style="border: 1px solid black"><?php echo $value->no_hp; ?></td>
                                    <td style="border: 1px solid black"><?php echo $value->tgl_masuk; ?></td>
                                    <td style="border: 1px solid black"><?php echo $value->tgl_keluar; ?></td>
                                    <td style="border: 1px solid black"><?php echo $value->jenis; ?></td>
                                    <td style="border: 1px solid black"><?php echo $value->kg; ?></td>
                                    <td style="border: 1px solid black"><?php echo $value->harga; ?></td>
                                    <td style="border: 1px solid black" class="span-status"><?php echo $value->status; ?></td>
                                    <td>  
                                    <select class="select-status">
                                            <option data-id="<?php echo $value->id; ?>" data-status="Belum Dikerjakan">Belum Dikerjakan</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Menimbang Laundry">Menimbang Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Membuat Struk Laundry">Membuat Struk Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Memasukan Laundry Laundry">Memasukan Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Mengeringkan Laundry">Mengeringkan Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Memisahkan Jenis Laundry">Memisahkan Jenis Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Menyetrika Laundry Laundry">Menyetrika Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Melipat Laundry">Melipat Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Membungkus Laundry">Membungkus Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Memberikan Laundry">Memberikan Laundry</option>
                                            <option data-id="<?php echo $value->id; ?>" data-status="Selesai">Selesai</option>
                                    </select>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>

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
        // $(".btn-status").click(function () {
        //     var btn = $(this);
        //     // alert("<?php echo base_url('index.php/KELOLA_PESANAN_COL/Kelola_pesanan_col/proses_jemur'); ?>");
        //     $.post(
        //         //bagian 1: url
        //         "<?php echo base_url('index.php/KELOLA_PESANAN_COL/Kelola_pesanan_col/proses_jemur'); ?>",
        //         //bagian 2: data
        //         {
        //             id: btn.data("id"),
        //             status: btn.data("status")
        //         },
        //         //bagian 3: callback
        //         function (response) {
        //             btn.parent().parent().find(".span-status").text(btn.data("status"));
        //         }
        //     );
        // });

        $(".select-status").change(function () {
            var select = $(this),
                option = select.find("option:selected");
            // alert("<?php echo base_url('index.php/KELOLA_PESANAN_COL/Kelola_pesanan_col/proses_jemur'); ?>");
            $.post(
                //bagian 1: url
                "<?php echo base_url('index.php/KELOLA_PESANAN_COL/Kelola_pesanan_col/proses_jemur'); ?>",
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