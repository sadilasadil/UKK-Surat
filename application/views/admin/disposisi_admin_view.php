
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Disposisi</h1>
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
                        <div class="panel-heading">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah">Tambah Disposisi</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>PENGIRIM</th>
                                        <th>PENERIMA</th>
                                        <th>TANGGAL</th>
                                        <th>CATATAN</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
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
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary" >Lihat Surat</a>
                                            <button type="button" class="btn btn-sm btn-danger">Hapus</button>
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

<!-- Modal Tambah -->
        <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambahLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Anggota</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number" name="nik" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                                <select class="form-control">
                                    <option>--Pilih Jabatan--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Direktur</option>
                                    <option value="3">Manager</option>
                                    <option value="4">Supervisor</option>
                                    <option value="5">Pegawai</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Bagian</label>
                                <select class="form-control">
                                    <option>--Pilih Jabatan--</option>
                                    <option value="1">Marketing</option>
                                    <option value="2">HRD</option>
                                    <option value="3">Financial</option>
                                    <option value="4">Administrasi</option>
                                </select>
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

