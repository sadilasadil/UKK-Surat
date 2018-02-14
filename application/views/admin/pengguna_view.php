
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading print">
                            <button class="btn btn-default print" onclick="printPage()"><i class="fa fa-print" > Print</i></button>
                            <a href="#" class="btn btn-success print" data-toggle="modal" data-target="#modal_tambah">Tambah Pengguna</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>JABATAN</th>
                                        <th>BAGIAN</th>
                                        <th class="print">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach ($data_pengguna as $pengguna) {
                                            # code...
                                            echo'
                                                <tr class="odd gradeX">
                                                    <td>'.++$no.'</td>
                                                    <td>'.$pengguna->nik.'</td>
                                                    <td>'.$pengguna->nama_depan.' '.$pengguna->nama_belakang.'</td>
                                                    <td>'.$pengguna->nama_jabatan.'</td>
                                                    <td>'.$pengguna->nama_bagian.'</td>
                                                    <td class="print">
                                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal_ubah'.$pengguna->id_pengguna.'">Ubah</a>
                                                        <a href="'.base_url('index.php/pengguna/hapus_pengguna/'.$pengguna->id_pengguna).'" class="btn btn-danger">Hapus</a>
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
                    <form action="<?php echo base_url(); ?>index.php/pengguna/tambah_pengguna" method="post" enctype="multipart/form-data">
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
                                <select class="form-control" name="jabatan">
                                    <option>--Pilih Jabatan--</option>
                                    <?php 
                                        foreach ($data_jabatan as $jabatan) {
                                            echo'
                                                <option value="'.$jabatan->id_jabatan.'">'.$jabatan->nama_jabatan.'</option>
                                            ';
                                        }
                                    ?>
                                    
                                    
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Bagian</label>
                                <select class="form-control" name="bagian">
                                    <option>--Pilih Jabatan--</option>
                                    <?php
                                        foreach ($data_bagian as $bagian) {
                                            echo'
                                                <option value="'.$bagian->id_bagian.'">'.$bagian->nama_bagian.'</option>
                                            ';
                                        }
                                    ?>
                                    
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

<!-- Modal Ubah -->
<?php 
    foreach ($data_pengguna as $pengguna) {
        echo'
            <div class="modal fade" id="modal_ubah'.$pengguna->id_pengguna.'" tabindex="-1" role="dialog" aria-labelledby="modal_ubahLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="'.base_url('index.php/pengguna/ubah_pengguna/'.$pengguna->id_pengguna).'" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_ubahLabel">Ubah Anggota</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number" name="nik" class="form-control" value="'.$pengguna->nik.'">
                        </div>

                        <div class="form-group">
                            <label>Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" value="'.$pengguna->nama_depan.'">
                        </div>

                        <div class="form-group">
                            <label>Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" value="'.$pengguna->nama_belakang.'">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" value="'.$pengguna->password.'">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                                <select class="form-control" name="jabatan">
                                    <option>--Pilih Jabatan--</option>';
                                    foreach ($data_jabatan as $jabatan) {
                                        echo'
                                            <option value="'.$jabatan->id_jabatan.'" ';
                                                if ($pengguna->id_jabatan==$jabatan->id_jabatan) {
                                                    echo'selected';
                                                }
                                            echo'>'.$jabatan->nama_jabatan.'</option>
                                        ';
                                    }

                                    echo'
                                    
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Bagian</label>
                                <select class="form-control" name="bagian">
                                    <option>--Pilih Jabatan--</option>';
                                        foreach ($data_bagian as $bagian) {
                                            echo'<option value="'.$bagian->id_bagian.'"';
                                                if ($pengguna->id_bagian==$bagian->id_bagian) {
                                                    echo'selected';
                                                }
                                            echo'>'.$bagian->nama_bagian.'</option>';
                                        }
                                    echo'
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
        ';
    }
?>


        