
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Disposisi Keluar</h1>
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
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah">Tambah Disposisi</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>UNIT TUJUAN</th>
                                        <th>NAMA TUJUAN</th>
                                        <th>TGL.DISPOSISI</th>
                                        <th>CATATAN</th>
                                        <th>STATUS</th>
                                        <th class="print">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=0;
                                        foreach ($data_diskeluar as $diskeluar) {
                                            echo'
                                                <tr class="odd gradeX">
                                                    <td>'.++$no.'</td>
                                                    <td>'.$diskeluar->nama_jabatan.' '.$diskeluar->nama_bagian.'</td>
                                                    <td>'.$diskeluar->nama_depan.' '.$diskeluar->nama_belakang.'</td>
                                                    <td>'.$diskeluar->tanggal_disposisi.'</td>
                                                    <td>'.$diskeluar->catatan.'</td>
                                                    <td>'.$diskeluar->status_surat.'</td>
                                                    <td class="print">
                                                        <a href="" class="btn btn-sm btn-info">Lihat</a>
                                                        <a href="" class="btn btn-sm btn-danger">Hapus</a>
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
                    <form action="<?php echo base_url('index.php/disKeluar/tambah_disposisi_keluar/'.$this->uri->segment(3)); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_addLabel">Tambah Surat Keluar</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <input type="hidden" name="id_disposisi" value=""> -->
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
                            <textarea name="catatan" class="form-control"></textarea>
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


