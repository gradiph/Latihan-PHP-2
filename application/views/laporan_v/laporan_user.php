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
    
   <div class="container">
         <h2 class="text-center" style="text-align: center; margin-top: 50px;">Rekap Penjualan</h2>
        <h3 class="text-center" style="text-align: center;">Tanggal : <?php echo $tanggal ?></h3>
        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table table-bordered table-hover" border="2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Tgl Masuk/Tgl Keluar</th>
                            <!-- <th>Jenis</th>
                            <th>Kg</th> -->
                            <th>Harga</th>
                            <!-- <th>Harga barang</th>
                            <th>Sub Total</th> -->
                        </tr>

                    </thead>
                    <tbody>
                    <?php 
                    $harga_barang2 = 0;
                    $total_harga = 0;
                    $total_kuantitas = 0;
                    $no = 1;
                    $id_laundry_induk_sebelumnya = 0; 
                    $harga = 0;
                        foreach ($panggil_data as $key => $row) {
                            //jika id_laundry_induk data yg sedang diproses sama dengan id_laundry_induk data sebelumnya
                            if ($row->id_laundry_induk == $id_laundry_induk_sebelumnya) {
                                //kalau berhasil diTRAKTIR MAKAN GAES
                                //tidak usah tampilkan baris baru karena transaksinya sama, tapi jumlahkan harga sebelumnya dengan harga data yg sedang diproses

                                //subbagian 1: menghitung total harga skrg (yang transaksinya sama)
                                $harga = $harga + $row->harga;

                                //subbagian 2: pakai javascript untuk mengubah tampilan harga menjadi total harga srkg
                                ?>
                                <script>
                                    document.getElementById("total-harga-<?php echo $row->id_laundry_induk; ?>").innerHTML = "<?php echo $harga; ?>";
                                    // tampil_total_harga("#total-harga-<?php echo $row->id_laundry_induk; ?>", "<?php echo $harga; ?>");
                                </script>
                                <?php

                            }
                            else
                            {
                                $harga = $row->harga;
                                //tampilkan baris baru karena berbeda transaksi
                                ?>
                                
                                    <tr>
                                        <th><?php echo $no++; ?></th>
                                        <th><?php echo $row->nama; ?></th>
                                        <th><?php echo $row->alamat; ?></th>
                                        <th><?php echo $row->no_hp; ?></th>
                                        <th><?php echo $row->tgl_masuk .' | '. $row->tgl_keluar; ?></th>
                                       <!--  <th><?php echo $row->jenis; ?></th>
                                        <th><?php echo $row->kg; ?></th> -->
                                        <th><span id="total-harga-<?php echo $row->id_laundry_induk; ?>"><?php echo $row->harga; ?></span></th>
                                    </tr>
                                

                                <?php 

                            }
                            //utk grand total
                            // $harga_barang2 += $row->total_harga;
                            // $total_kuantitas += $row->kuantitas;

                            //simpan id_laundry_induk data yg skrg sebagai id_laundry_induk_sebelumnya (untuk dibandingkan pada row berikutnya)
                            $id_laundry_induk_sebelumnya = $row->id_laundry_induk;
                            $harga += $row->harga;
                        }
                        
                     ?>
                     </tbody>
                     <tfoot>
                        <tr style="font-weight: bold;">
                           <!--  <td colspan="0" class="text-left">Jumlah</td> -->
                            <td class="text-left" colspan="4"></td>
                            <td class="text-left">Jumlah</td>
                            <td class="text-left"><?php $angka_format = number_format($row->harga,0,",",".");
                             echo $angka_format; ?></td>
                            
                            
                           
                            <!-- <td><<?php echo $sum_jumlah->jumlah; ?></td> -->
                           <!--  <td class="text-right" colspan="1"><?php echo number_format($harga_barang2,0,",","."); ?></td> -->
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
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
    function tampil_total_harga (subyek, obyek) {
        $(subyek).text(obyek);
    }
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