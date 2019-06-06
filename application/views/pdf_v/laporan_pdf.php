<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Laporan Keuangan');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(25);
            $pdf->setFooterMargin(15);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Laporan Keuangan</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="15%" align="center">Nama</th>
                            <th width="15%" align="center">Alamat</th>
                            <th width="15%" align="center">No Hp</th>
                            <th width="30%" align="center">Tgl Masuk/Tgl Keluar</th>
                            <th width="15%" align="center">Harga</th>
                        </tr>';

            $no = 1;
            $id_laundry_induk_sebelumnya = 0; 
            $harga = 0;
            $total_harga = 0;
            $temp = 0;
            $data_awal = 1;
                foreach ($panggil_pdf->result() as $key => $row) 
                {
                    //variabel baru yang menunjukan status ini pertama    
                    if ($data_awal == 1)
                    {
                        //data yg di proses di simpan ke varibel temp
                        //AKSI 1
                        $temp = $row;

                        //ubah nilai data_awal supaya aksi 1 tidak di lakukan lagi
                        $data_awal++;
                    }
                    else 
                    {
                        //cek apakah data yg di proses masih satu transaksi dengan yg sebelumnya 
                        //cek apakah id_laundry_induk data yang di proses sama dengan id_laundry_induk data sebelumnya
                        if ($row->id_laundry_induk == $id_laundry_induk_sebelumnya) 
                        {
                            //AKSI 2
                            //menambahkan harga data yg diproses dengan harga variable temp
                            $temp->harga = $row->harga + $temp->harga;
                        }
                        else
                        {
                            //AKSI 3
                            //menampilkan isi variable temp
                            $i++;
                            $html.='<tr bgcolor="#ffffff">
                                <td align="center">'.$i.'</td>
                                <td align="left">'.$temp->nama.'</td>
                                <td align="left">'.$temp->alamat.'</td>
                                <td align="left">'.$temp->no_hp.'</td>
                                <td align="left">'.$temp->tgl_masuk . ' | ' .$temp->tgl_keluar.'</td>
                                <td><span id="total-harga-'. $temp->id_laundry_induk.'">'.$temp->harga.'</span></td> 
                            </tr>';

                            //data yg di proses di simpan ke varibel temp
                            $temp = $row;
                        }
                    }
                    //menyimpan id laundry induk data yg diproses ke variable id_laundry_induk_sebelumnya untuk di proses di data selanjutnya
                    $id_laundry_induk_sebelumnya = $row->id_laundry_induk;
                }
                //AKSI 4 : Ketika Proses Data sudah selesai
                //menampilkan isi variable temp
                $i++;
                $html.='<tr bgcolor="#ffffff">
                    <td align="center">'.$i.'</td>
                    <td align="left">'.$temp->nama.'</td>
                    <td align="left">'.$temp->alamat.'</td>
                    <td align="left">'.$temp->no_hp.'</td>
                    <td align="left">'.$temp->tgl_masuk . ' | ' .$temp->tgl_keluar.'</td>
                    <td><span id="total-harga-'. $temp->id_laundry_induk.'">'.$temp->harga.'</span></td> 
                </tr>';

            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Laporan_user.pdf', 'I');

?>