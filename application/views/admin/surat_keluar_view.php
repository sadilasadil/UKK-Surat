
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Surat Keluar</h1>
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
                            <button class="btn btn-default print" onclick="printPage()"><i class="fa fa-print"> Print</i></button>
                            <a href="#" class="btn btn-success print" data-toggle="modal" data-target="#modal_tambah">Tambah Surat</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NO.SURAT</th>
                                        <th>PENGIRIM</th>
                                        <th>TGL.KIRIM</th>
                                        <th>TGL.TERIMA</th>
                                        <th>PERIHAL</th>
                                        <th class="print">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="print">
                                            <a href="" class="btn btn-sm btn-info">Lihat</a>
                                            <a href="" class="btn btn-sm btn-primary">Disposisi</a>
                                            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_ubah">Ubah</a>
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_ubah_file">Ubah File</a>
                                            <a href="" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
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
            </div>

<!-- Modal Tambah -->
        <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambahLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?php echo base_url('index.php/keluar/tambah_user'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Surat Keluar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Agenda</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                                <select class="form-control">
                                    <option>--Pilih Jenis--</option>
                                    <option value="1">Keluarga</option>
                                    <option value="2">Setengah Resmi</option>
                                    <option value="3">Sosial</option>
                                    <option value="4">Niaga</option>
                                    <option value="5">Dinas</option>
                                    <option value="6">Pengantar</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim</label>
                            <input type="date" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terima</label>
                            <input type="date" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>File input</label>
                            <input type="file">
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
        <div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="modal_ubahLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_ubahLabel">Ubah Surat Keluar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Agenda</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                                <select class="form-control">
                                    <option>--Pilih Jenis--</option>
                                    <option value="1">Keluarga</option>
                                    <option value="2">Setengah Resmi</option>
                                    <option value="3">Sosial</option>
                                    <option value="4">Niaga</option>
                                    <option value="5">Dinas</option>
                                    <option value="6">Pengantar</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Pengirim</label>
                            <input type="text" name="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim</label>
                            <input type="date" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terima</label>
                            <input type="date" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" name="level" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>File input</label>
                            <input type="file">
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

<!-- Modal Ubah File -->
        <div class="modal fade" id="modal_ubah_file" tabindex="-1" role="dialog" aria-labelledby="modal_ubah_fileLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Ubah File Surat</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>File input</label>
                            <input type="file">
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