
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Disposisi Masuk</h1>
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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>UNIT PENGIRIM</th>
                                        <th>NAMA PENGIRIM</th>
                                        <th>TGL.DISPOSISI</th>
                                        <th>CATATAN</th>
                                        <th>STATUS</th>
                                        <th class="print">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                        $no=0;
                                        foreach ($data_dismasuk as $dismasuk) {
                                            echo'
                                                <tr class="odd gradeX">
                                                    <td>'.++$no.'</td>
                                                    <td>'.$dismasuk->nama_jabatan.' '.$dismasuk->nama_bagian.'</td>
                                                    <td>'.$dismasuk->nama_depan.' '.$dismasuk->nama_belakang.'</td>
                                                    <td>'.$dismasuk->tanggal_disposisi.'</td>
                                                    <td>'.$dismasuk->catatan.'</td>
                                                    <td>'.$dismasuk->status_surat.'</td>
                                                    <td class="print">
                                                        <a href="'.base_url('uploads/'.$dismasuk->data_surat).'" class="btn btn-sm btn-info" target="blank">Lihat</a>
                                                        ';

                                                        if ($this->session->userdata('nama_jabatan')!='Pegawai') {
                                                            echo'
                                                                <a href="'.base_url('index.php/disKeluar/disKeluar/'.$dismasuk->id_surat_masuk).'" class="btn btn-sm btn-primary">Disposisi</a>
                                                            ';
                                                        }
                                                        echo'
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
