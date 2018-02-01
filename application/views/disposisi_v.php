<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
         $notif = $this->session->flashdata('notif');
         $tipe_notif = $this->session->flashdata('tipe_notif');
         if (!empty($notif)) { ?>
            <div class="alert alert-<?php echo $tipe_notif;?> alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $notif ?>.
                            </div>
        <?php } ?>
                    <h1 class="page-header">Disposisi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data All Disposisi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID Disposisi</th>
                                        <th>ID Parent</th>
                                        <th>ID Surat Masuk</th>
                                        <th>No Agenda</th>
                                        <th>No Surat</th>
                                        <th>Kepada Jabatan</th>
                                        <th>Kepada Pengguna</th>
                                        <th>Catatan</th>
                                        <th>Status Surat</th>
                                        <th>Tanggapan</th>
                                        <th>File Surat</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach ($rows as $data) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $data->id_disposisi ?></td>
                                        <td><?php echo $data->id_parent_disposisi ?></td>
                                        <td><?php echo $data->id_surat_masuk ?></td>
                                        <td><?php echo $data->no_agenda ?></td>
                                        <td><?php echo $data->nomor_surat ?></td>
                                        <td class="center"><?php echo $data->nama_jabatan ?></td>
                                        <td class="center"><?php echo $data->nama_depan ?></td>
                                        <td class="center"><?php echo $data->catatan ?></td>
                                        <td class="center"><?php 
                                        if ($data->status_surat == 0) {
                                        echo 'Belum Direspon';
                                        }
                                        else if ($data->status_surat == 1) {
                                        echo 'Sudah direspon, disposisi belum selesai';
                                        }
                                        else if ($data->status_surat == 2) {
                                        echo 'Sudah direspon, disposisi selesai';
                                        }
                                         
                                        ?></td>
                                        <td class="center"><?php echo $data->tanggapan ?></td>
                                        <td><a href="<?php echo base_url().'assets/surat/'.$data->file_surat ?>" target="_blank" class="btn btn-info">Lihat</a></td>
                                        <td>
                                            <?php if ($data->kepada_id == $this->session->userdata('logged_id')) {
                                                if ($data->status_surat == 0) { ?>
                                        <a href="#" class="btn btn-primary disposisi" data-toggle="modal" data-target="#disposisi" id="<?php echo $data->id_disposisi ?>">Disposisikan</a>
                                        <br>
                                        <br>
                                        <a href="#" class="btn btn-success accept" data-toggle="modal" data-target="#accept" id="<?php echo $data->id_disposisi ?>">Terima</a>
                                        <br>
                                        <br>
                                        <?php } } ?>
                                        <a href="#" class="btn btn-danger lihat_alur" data-toggle="modal" data-target="#lihat_alur" id="<?php echo $data->id_disposisi ?>">Lihat Alur</a>
                                        
                                    </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                            <?php echo $pagination ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
         <!-- Modal Disposisi-->
                            <div class="modal fade" id="disposisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Disposisi</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>surat/go_disposisi_go" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="idd_disposisi" class="form-control"  required>
                                            <input type="hidden" name="per_page" value="<?php 
                                            if(!empty($per_page))
                                            {
                                            echo $per_page; }
                                            else {
                                                echo "";
                                            } ?>" class="form-control">
                                            Jabatan
                                            <select class="form-control selected_disposisi"  required name="kepada_kat" id="jabatan">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($jabatan as $jb) { ?>
                                                <option value="<?php echo $jb->id_jabatan ?>"><?php echo $jb->nama_jabatan ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            Pegawai
                                            <select class="form-control selected_disposisi"  required name="kepada_id" id="pengguna">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($pengguna as $pg) { ?>
                                                <option value="<?php echo $pg->id_pengguna ?>"><?php echo $pg->nama_depan.' '.$pg->nama_belakang; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            Catatan
                                            <textarea placeholder="Catatan" class="form-control" name="catatan" required></textarea>
                                            <br>
                                            Tanggapan
                                            <textarea placeholder="Tanggapan" class="form-control" name="tanggapan" required></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- Modal Accept Disposisi-->
                            <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Terima Disposisi</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>surat/terima_disposisi" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="iddd_disposisi" class="form-control"  required>
                                            <input type="hidden" name="per_page" value="<?php 
                                            if(!empty($per_page))
                                            {
                                            echo $per_page; }
                                            else {
                                                echo "";
                                            } ?>" class="form-control">
                                            
                                            Tanggapan
                                            <textarea placeholder="Tanggapan" class="form-control" name="tanggapan" required></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- modal lihat alur-->
                             <div class="modal fade" id="lihat_alur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:1000px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Alur Disposisi</h4>
                                        </div>
                                       
                                        <div class="modal-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID Disposisi</th>
                                        <th>ID Parent</th>
                                        <th>ID Surat Masuk</th>
                                        <th>No Agenda</th>
                                        <th>No Surat</th>
                                        <th>Kepada Jabatan</th>
                                        <th>Kepada Pengguna</th>
                                        <th>Catatan</th>
                                        <th>Status Surat</th>
                                        <th>Tanggapan</th>
                                    </tr>

                                </thead>
                                <tbody id="lihat_alur_table">
                                    
                                    
                             </tbody>
                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" target="_blank" class="btn btn-info" id="lihat_alur_file_surat">Lihat File Surat</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
<script type="text/javascript">
    $('.disposisi').click(function(event){
        var id = $(this).attr('id');
        if (id != "") {    
                $('input[name=idd_disposisi]').val(id);
        }
        else{
            alert('Maaf, data surat kosong');
            $('#disposisi').modal('hidden');
        }
        });
    $('.accept').click(function(event){
        var id = $(this).attr('id');
        if (id != "") {    
                $('input[name=iddd_disposisi]').val(id);
        }
        else{
            alert('Maaf, data surat kosong');
            $('#accept').modal('hidden');
        }
        });
     $('.selected_disposisi').change(function(){

        var selected_list = $(this).attr('id');
        var id = $(this).val();

        if (id != "" && selected_list != "") {  

              $.ajax({
                url:'<?php echo base_url() ?>home/get_list_disposisi',
                type:'post',
                context: this,
                data:{selected_list : selected_list, id: id},
                success : function(e){
                    if (selected_list == 'pengguna') {
                    $('select[name=kepada_kat]').val(e).change();
                    stop();
                    }
                    else if (selected_list == 'jabatan'){
                    $('select[name=kepada_id]').val(e).change();
                    stop();
                    }

                }
            });
                
        }

        else{
            alert('Maaf, data select kosong');
            
            
        }

        });

     $('.lihat_alur').click(function(event){

        var id = $(this).attr('id');

        if (id != "") {  

              $.ajax({
                url:'<?php echo base_url() ?>surat/lihat_alur_disposisi',
                type:'post',
                context: this,
                data:{id_disposisi: id},
                success : function(e){
                    var data = e.split("|");
                    $('tbody#lihat_alur_table').html(data[0]);
                    $('a#lihat_alur_file_surat').attr('href', '<?php echo base_url().'assets/surat/'?>'+data[1]);
                }
            });
                
        }

        else{
            alert('Maaf, data select kosong');
            
            
        }

        });
</script>