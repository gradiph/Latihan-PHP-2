<h2 class="text-center py-3">Laporan User Detail</h2>
        <table class="table text-center">
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
                            <td><?php echo $value->nama; ?></td>
                            <td><?php echo $value->jenis; ?></td>
                            <td><?php echo $value->kg; ?></td>
                            <td><?php echo $value->harga; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
            </table>