
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
                            <a href="" class="btn btn-default"><i class="fa fa-print"> Print</i></a>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah">Tambah Disposisi</a>
                            | No. Surat : <?php echo $data_surat->nomor_surat; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>UNIT TUJUAN</th>
                                        <th>NAMA TUJUAN</th>
                                        <th>TANGGAL</th>
                                        <th>CATATAN</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $no=0;
                                    foreach ($data_disposisi as $disposisi) {
                                        echo'
                                            <tr class="odd gradeX">
                                                <td>'.++$no.'</td>
                                                <td>'.$disposisi->nama_jabatan.' '.$disposisi->nama_bagian.'</td>
                                                <td>'.$disposisi->nama_depan.' '.$disposisi->nama_belakang.'</td>
                                                <td>'.$disposisi->tanggal_disposisi.'</td>
                                                <td>'.$disposisi->catatan.'</td>
                                                <td>';
                                                if ($disposisi->status_surat == 0) {
                                                    echo'Belum Dibaca';
                                                }else{
                                                    echo'Sudah Dibaca';
                                                }
                                                echo'</td>
                                                <td>
                                                    <a href="'.base_url('uploads/'.$disposisi->data_surat).'" class="btn btn-sm btn-primary" target="blank">Lihat Surat</a>
                                                    <a href="'.base_url('index.php/disposisi/hapus_disposisi/'.$this->uri->segment(3).'/'. $disposisi->id_disposisi).'" class="btn btn-sm btn-danger">Hapus</a>
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
                    <form action="<?php echo base_url('index.php/disposisi/tambah_disposisi/'.$this->uri->segment(3)); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Disposisi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tujuan</label>
                            <select class="form-control" name="tujuan">
                                <option>--Pilih Tujuan--</option>
                                <?php 
                                    foreach ($data_tujuan as $tujuan) {
                                        echo'
                                            <option value="'.$tujuan->id_pengguna.'">'.$tujuan->nama_jabatan.' '.$tujuan->nama_bagian.' ('.$tujuan->nama_depan.' '.$tujuan->nama_belakang.')</option>
                                        ';
                                    }
                                ?>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea class="form-control" name="catatan"></textarea>
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

