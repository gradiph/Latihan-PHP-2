<h2 class="text-center py-3">Laporan User Detail</h2>
        <table class="table text-center">
                <!-- <form action="<?php echo base_url(); ?>index.php/PENYERAHAN_HASIL_BALEPRESS/PENYERAHAN_HASIL_BALEPRESS_DUA" method="get"> -->
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Kg</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        if(!empty($panggil_modal)){
                        foreach ($panggil_modal as $key => $value)
                        {
                        ?>
                        <tr>
                            <?php
                            //Panggil Function sesuai di controller

                            //dari tanda tanya html tanggal berubah menjadi varibel tanggal dari cotroller yang menerima data halaman sebelumnnya 
                            ?>
                           <!--  <td><a href="<?php echo base_url ();?>index.php/PENYERAHAN_HASIL_BALEPRESS/pengeluaran_data_hasil_balepress?tanggal=<?php echo $value->tanggal ?>&nama_waste=<?php echo $value->nama_waste ?>&jenis_waste=<?php echo $value->jenis_waste ?>&bagian=<?php echo $value->bagian ?>&tanggal=<?php echo $value->tanggal ?>"><?php echo $value->nama_waste; ?></a></td> -->
                            <td><?php echo $value->nama; ?></td>
                            <td><?php echo $value->jenis; ?></td>
                            <td><?php echo $value->kg; ?></td>
                             <td><?php echo $value->harga; ?></td>
                           <!--  <td><span class="open-modal" data-link="<?php echo base_url ();?>index.php/PENYERAHAN_HASIL_BALEPRESS/pengeluaran_data_hasil_balepress_2?tanggal=<?php echo $value->tanggal ?>&nama_waste=<?php echo $value->nama_waste ?>&jenis_waste=<?php echo $value->jenis_waste ?>&bagian=<?php echo $value->bagian ?>&tanggal=<?php echo $value->tanggal ?>"><?php echo $value->balepress; ?></span></td> -->
                            <!-- <td><?php echo $value->berat; ?></td> -->
                            <!-- <td><?php echo $value->status; ?></td> -->

                            

                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
               <!--  </form> -->
            </table>