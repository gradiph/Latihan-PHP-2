<div class="container" style="width: 600px">
<h2 class="text-center py-3">Tambah Edit</h2>
    <form action="<?php echo base_url(); ?>index.php/MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/save_tampilan_edit_modal" method="post">
        <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="col text-center" style="border: 1px solid black">No</th>
                            <th class="col text-center" style="border: 1px solid black">Jenis</th>
                            <th class="col text-center" style="border: 1px solid black">Harga</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                            
                            <tr>
                                <td><input type="text" name="jenis_satu" id="jenis" class="form-control" value="<?php echo $jenis; ?>"></td>
                                <td><input type="text" name="harga_satu" id="harga" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="jenis_dua" id="jenis" class="form-control"></td>
                                <td><input type="text" name="harga_dua" id="harga" class="form-control"></td>
                            </tr>
                           
                        
                  </tbody> -->
                    <?php
                            $i = 0;
                            foreach ($edit_modal->result() as $key => $value) {
                                ?>
                                <tr class="text-center">
                                    <th class="text-center" style="border: 1px solid black"><?php echo ++$i; ?></th>
                                    <td style="border: 1px solid black"><input type="text" name="jenis_tiga" id="jenis_tiga" class="form-control" value="<?php echo $value->jenis; ?>"></td>
                                    <td style="border: 1px solid black"><input type="text" name="harga_tiga" id="harga_tiga" class="form-control" value="<?php echo $value->harga; ?>"></td>
                                    <td>
                                    <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
        </table>
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </form>
</div>
    