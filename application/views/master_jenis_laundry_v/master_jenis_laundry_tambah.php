<h2 class="text-center py-3">Tambah Jenis</h2>
    <form action="<?php echo base_url(); ?>index.php/MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/simpan_tambah" method="post">
        <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="jenis_satu" id="jenis" class="form-control" placeholder="input tambahan jenis"></td>
                            <td><input type="text" name="harga_satu" id="harga" class="form-control" placeholder="input tambahan harga"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="jenis_dua" id="jenis" class="form-control" placeholder="input tambahan jenis"></td>
                            <td><input type="text" name="harga_dua" id="harga" class="form-control" placeholder="input tambahan harga"></td>
                        </tr>
                    </tbody>
        </table>
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </form>
    