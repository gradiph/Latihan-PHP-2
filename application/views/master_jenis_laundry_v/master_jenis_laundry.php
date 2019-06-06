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
<style>
    .btn-nama {
        text-decoration: underline;
            }
    .btn-nama:hover {
        color: blue;
            }

     .btn-edit {
        text-decoration: underline;
            }
    .btn-edit:hover {
        color: blue;
            }

     .btn-hapus {
        text-decoration: underline;
            }
    .btn-hapus:hover {
        color: blue;
            }
</style>

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
    <div class="container" style="width: 800px; margin-top: 10px;">
         <h1 class="text-center">Master Jenis</h1>
                <table class="table" style="border: 1px solid black">
                        <thead>
                                <tr class="text-left text-bold" style="border: 1px solid black">
                                    <td class="col" style="border: 1px solid black">No</td>
                                    <td class="col text-center" style="border: 1px solid black">Jenis</td>
                                    <td class="col text-center" style="border: 1px solid black">Harga</td>
                                    <td class="col text-center" style="border: 1px solid black" colspan="3">Opsi</td>
                                </tr>
                        </thead>
                      <tbody>
                       <?php
                       $no = 1;
                        foreach ($master_jenis->result() as $key => $value)
                        {
                        ?>
                        <tr>
                            <?php
                            ?>
                            <td style="border: 1px solid black" class="text-center"><?php echo $no++ ?></td>
                            <td style="border: 1px solid black" class="text-center"><?php echo $value->jenis; ?></td>
                            <td style="border: 1px solid black" class="text-center"><?php echo $value->harga; ?></td>
                          
                           <!--  <td style="border: 1px solid black" class="text-center"><span class="btn-edit data-edit">EDIT</span></td> -->
                           <td style="border: 1px solid black" class="text-center"><span class="btn-edit" onclick="callModal(this)" data-toggle="modal" data-target="#exampleModal" data-jenis_satu="<?= $value->jenis ?>" data-harga_satu="<?= $value->harga ?>" data-uid="<?= $value->id ?>">EDIT</span></td>
                           <!-- <td style="border: 1px solid black" class="text-center"><span class="btn-edit" onclick="callModal($(this))" data-toggle="modal" data-target="#exampleModal" data-jenis="<?= $value->jenis ?>" data-harga="<?= $value->harga ?>" data-uid="<?= $value->id ?>">EDIT</span></td> -->
                            <td style="border: 1px solid black" class="text-center"><span class="btn-hapus data-hapus" data-hapus="<?= $value->id ?>" onclick="myFunction_confirm(this)">HAPUS</span></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            <span class="btn-nama data-nama">TAMBAH</span>
        </div>
</section>



<!-- TAG FORM UTK MENGAPUS -->
<form action="<?php echo base_url(); ?>index.php/MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/hapus_data" method="post" id="id_hapus">
     <input type="hidden" name="id_edit" id="id_edit">
 </form>

<div class="modal fade" id="contoh4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contoh5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-edit"></div>
                <h2 class="text-center py-3">Edit Data</h2>
                    <form action="<?php echo base_url(); ?>index.php/MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/save_tampilan_edit_modal" method="post">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="jenis_satu" id="jenis_satu" class="form-control" placeholder="input tambahan jenis" ></td>
                                    <td><input type="text" name="harga_satu" id="harga_satu" class="form-control" placeholder="input tambahan harga"></td>
                                    <td><input type="hidden" name="id" id="id" class="form-control"></td>
                                </tr>   
                            </tbody>
                    </table>
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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
    $(".btn-nama").click(function () {
                    //memanggil modal
                    $('#contoh4').modal('show');
                    //update isi modal


                    $(".modal-body").load('<?php echo base_url('index.php/MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/tampilan_tambah'); ?>');
                    
                });

    $(".btn-edit").click(function () {
                    //memanggil modal
                    $('#contoh5').modal('show');
                    //update isi modal


                    // $(".modal-edit").load('<?php echo base_url('index.php/MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/tampilan_edit'); ?>');
                    
                });

                    function callModal(nilai) {
                    // console.log(nilai);
                    var jenis='';
                    var harga='';
                    // var id='';
                    // jenis=nilai.data('jenis');
                    // harga=nilai.data('harga');
                    // id=nilai.data('uid');
                    jenis=$(nilai).data('jenis_satu');
                    harga=$(nilai).data('harga_satu');
                    var id=$(nilai).data('uid');
                    document.getElementById('jenis_satu').value=jenis;
                    document.getElementById('harga_satu').value=harga;
                    document.getElementById('id').value=id;

        
    }

    function myFunction_confirm(hapus)
                {
                    var jawaban = confirm("Hapus data ini?");
                    // document.getElementById('jenis_satu').value=jenis;
                    if (jawaban) {
                        $("#id_hapus #id_edit").val($(hapus).data('hapus'));
                        $("#id_hapus").submit();
                    }
                    


                }

</script>
<?php
$this->load->view('template/foot');
?>