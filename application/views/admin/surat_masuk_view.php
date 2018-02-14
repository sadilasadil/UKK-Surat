
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Surat Masuk</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        $notif = $this->session->flashdata('notif');
                        if ($notif!=NULL) {
                            # code...
                            echo'
                                <div class="alert alert-info">'.$notif.'</div>
                            ';
                        }
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading print">
                            <a href="" class="btn btn-default" onclick="printPage()"><i class="fa fa-print"> Print</i></a>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah">Tambah Surat</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO.SURAT</th>
                                        <th>JENIS SURAT</th>
                                        <th>PENGIRIM</th>
                                        <th>TGL.KIRIM</th>
                                        <th>TGL.TERIMA</th>
                                        <th>PERIHAL</th>
                                        <th class="print">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach ($data_surat_masuk as $surat_masuk) {
                                            echo '
                                            <tr class="odd gradeX">
                                                <td>'.++$no.'</td>
                                                <td>'.$surat_masuk->nomor_surat.'</td>
                                                <td>'.$surat_masuk->jenis_surat.'</td>
                                                <td>'.$surat_masuk->pengirim.'</td>
                                                <td>'.$surat_masuk->tanggal_kirim.'</td>
                                                <td>'.$surat_masuk->tanggal_terima.'</td>
                                                <td>'.$surat_masuk->perihal.'</td>
                                                <td class="print">
                                                    <a href="'.base_url('uploads/'.$surat_masuk->data_surat).'" class="btn btn-sm btn-info" target="blank">Lihat</a>
                                                    <a href="'.base_url('index.php/disposisi/disposisi/'.$surat_masuk->id_surat_masuk).'" class="btn btn-sm btn-primary">Disposisi</a>
                                                    <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_ubah'.$surat_masuk->id_surat_masuk.'")">Ubah</a>
                                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_ubah_file'.$surat_masuk->id_surat_masuk.'">Ubah File</a>
                                                    <a href="'.base_url('index.php/masuk/hapus_surat/'.$surat_masuk->id_surat_masuk).'" class="btn btn-sm btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            ';
                                        }                                        
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

<!-- Modal Tambah -->
        <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambahLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo base_url('index.php/masuk/tambah_surat'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Surat Masuk</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_surat_masuk">
                        <div class="form-group">
                            <label>Nomor Agenda</label>
                            <input type="text" name="nomor_agenda" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                                <select class="form-control" name="jenis">
                                    <option>--Pilih Jenis--</option>
                                    <?php 
                                        foreach ($data_jenis as $jenis) {
                                            echo '
                                                <option value="'.$jenis->id_jenis_surat.'">'.$jenis->jenis_surat.'</option>
                                            ';
                                        }

                                    ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="pengirim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" name="penerima" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim</label>
                            <input type="date" name="tanggal_kirim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terima</label>
                            <input type="date" name="tanggal_terima" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="perihal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>File input</label>
                            <input type="file" name="data_surat" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
        <!-- /.modal -->


<!-- Modal Ubah -->
<?php 
    foreach ($data_surat_masuk as $surat_masuk) {
        echo'
            <div class="modal fade" id="modal_ubah'.$surat_masuk->id_surat_masuk.'" tabindex="-1" role="dialog" aria-labelledby="modal_ubahLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="'.base_url().'index.php/masuk/ubah_surat/'.$surat_masuk->id_surat_masuk.'" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_UbahLabel">Ubah Surat Masuk</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Agenda</label>
                            <input type="text" name="edit_nomor_agenda" id="edit_nomor_agenda" class="form-control" value="'.$surat_masuk->nomor_agenda.'"> 
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" name="edit_nomor_surat" id="edit_nomor_surat" class="form-control" value="'.$surat_masuk->nomor_surat.'">
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                                <select class="form-control" name="edit_jenis" id="edit_jenis">
                                    <option>--Pilih Jenis--</option>';
                                        foreach ($data_jenis as $jenis) {
                                            echo'
                                                <option value="'.$jenis->id_jenis_surat.'" ';
                                                if ($jenis->id_jenis_surat==$surat_masuk->id_jenis_surat) {
                                                    echo'selected';
                                                }
                                                 echo'>'.$jenis->jenis_surat.'</option>
                                            ';
                                        }
                                    echo'
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="edit_pengirim" id="edit_pengirim" class="form-control" value="'.$surat_masuk->pengirim.'">
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" name="edit_penerima" id="edit_penerima" class="form-control"value="'.$surat_masuk->penerima.'">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim</label>
                            <input type="date" name="edit_tanggal_kirim" id="edit_tanggal_kirim" class="form-control"value="'.$surat_masuk->tanggal_kirim.'">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terima</label>
                            <input type="date" name="edit_tanggal_terima" id="edit_tanggal_terima" class="form-control"value="'.$surat_masuk->tanggal_terima.'">
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="edit_perihal" id="edit_perihal" class="form-control"value="'.$surat_masuk->perihal.'">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
        <!-- /.modal -->
        ';
    }
?>

        

<!-- Modal Ubah File -->
<?php 
    foreach ($data_surat_masuk as $surat_masuk) {
        echo'
            <div class="modal fade" id="modal_ubah_file'.$surat_masuk->id_surat_masuk.'" tabindex="-1" role="dialog" aria-labelledby="modal_ubah_fileLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="'.base_url().'index.php/masuk/ubah_file_surat/'.$surat_masuk->id_surat_masuk.'" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Ubah File Surat</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Unggah Surat (*pdf)</label>
                            <input type="file" name="edit_data_surat" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
        <!-- /.modal -->
        ';
    }
?>
        

 