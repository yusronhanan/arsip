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
                    <h1 class="page-header">Surat Keluar <?php if ($this->session->userdata('level') == 0) { ?><a href="#" data-toggle="modal" data-target="#newSurat"><i class="fa fa-plus"></i></a><?php } ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Data All Surat  Keluar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID Surat Keluar</th>
                                        <th>No Agenda</th>
                                        <th>No Surat</th>
                                        <th>Jenis Surat</th>
                                        <th>Pengirim</th>
                                        <th>Penerima</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Perihal</th>
                                        <th>File Surat</th>
                                        <?php if ($this->session->userdata('level') == 0) { ?>
                                        <th>Aksi</th>
                                        <?php } ?>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach ($rows as $data) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $data->id_surat_keluar ?></td>
                                        <td><?php echo $data->no_agenda ?></td>
                                        <td><?php echo $data->nomor_surat ?></td>
                                        <td class="center"><?php echo $data->jenis_surat ?></td>
                                        <td class="center"><?php echo $data->pengirim ?></td>
                                        <td class="center"><?php echo $data->penerima ?></td>
                                        <td><?php echo $data->tanggal_kirim ?></td>
                                        <td><?php echo $data->perihal ?></td>
                                        <td><a href="<?php echo base_url().'assets/surat/'.$data->file_surat ?>" target="_blank" class="btn btn-info">Lihat File</a>
                                            <?php if ($this->session->userdata('level') == 0) { ?>
                                            <br>
                                            <br>
                                        <a href="#" data-toggle="modal" data-target="#editFile" class="btn btn-danger editFile" id="<?php echo $data->id_surat_keluar ?>">Edit File</a>
                                        <?php } ?></td>
                                        <?php if ($this->session->userdata('level') == 0) { ?>
                                        <td><a href="#" data-toggle="modal" data-target="#editSurat" class="btn btn-success editSurat" id="<?php echo $data->id_surat_keluar ?>">Edit Surat</a></td>
                                        <?php } ?>
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
      <div class="modal fade" id="newSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Surat Keluar</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>surat/tambah_surat_keluar" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            No Agenda
                                            <input type="text" name="no_agenda" placeholder="No Agenda" class="form-control"  required>
                                            <br>
                                            No Surat
                                            <input type="text" placeholder="No Surat" name="nomor_surat" class="form-control"  required>
                                            <br>
                                            Jenis Surat
                                            <select class="form-control"  required name="id_jenis_surat">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($jenis_surat as $js) { ?>
                                                <option value="<?php echo $js->id_jenis_surat ?>"><?php echo $js->jenis_surat ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            Pengirim
                                            <input type="text" placeholder="Pengirim" name="pengirim" class="form-control"  required>
                                            <br>
                                            Penerima
                                            <input type="text" name="penerima" placeholder="Penerima" class="form-control"  required>
                                            <br>
                                            Tanggal Kirim
                                            <input type="date" name="tanggal_kirim" placeholder="Tanggal Kirim" class="form-control"  required>
                                            <br>
                                            Perihal
                                            <input type="text" name="perihal" placeholder="Perihal" class="form-control"  required>
                                            <br>
                                            File Surat
                                            <input type="file" placeholder="File Surat" name="file_surat" class="form-control"  required>
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
                             <!-- Modal Edit Surat-->
                             <div class="modal fade" id="editSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Surat Keluar</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>surat/edit_surat_keluar" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="idd_surat_keluar" class="form-control"  required>
                                            <input type="hidden" name="per_page" value="<?php 
                                            if(!empty($per_page))
                                            {
                                            echo $per_page; }
                                            else {
                                                echo "";
                                            } ?>" class="form-control">
                                            No Agenda
                                            <input type="text" name="noo_agenda" placeholder="No Agenda" class="form-control"  required>
                                            <br>
                                            No Surat
                                            <input type="text" placeholder="No Surat" name="nomorr_surat" class="form-control"  required>
                                            <br>
                                            Jenis Surat
                                            <select class="form-control"  required name="idd_jenis_surat">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($jenis_surat as $js) { ?>
                                                <option value="<?php echo $js->id_jenis_surat ?>"><?php echo $js->jenis_surat ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            Pengirim
                                            <input type="text" placeholder="Pengirim" name="pengirimm" class="form-control"  required>
                                            <br>
                                            Penerima
                                            <input type="text" name="penerimaa" placeholder="Penerima" class="form-control"  required>
                                            <br>
                                            Tanggal Kirim
                                            <input type="date" name="tanggall_kirim" placeholder="Tanggal Kirim" class="form-control"  required>
                                            <br>
                                            Perihal
                                            <input type="text" name="perihall" placeholder="Perihal" class="form-control"  required>
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
                             <!-- Modal Edit File Surat-->
                            <div class="modal fade" id="editFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit File Surat Keluar</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>surat/edit_file_surat_keluar" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                           <input type="hidden" name="iddd_surat_keluar" class="form-control"  required>
                                            File Surat
                                            <input type="file" placeholder="File Surat" name="filee_surat" class="form-control"  required>
                                            <br>
                                            <input type="hidden" name="per_page" value="<?php 
                                            if(!empty($per_page))
                                            {
                                            echo $per_page; }
                                            else {
                                                echo "";
                                            } ?>" class="form-control">
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
<script type="text/javascript">
     $('.editSurat').click(function(event){
        var id = $(this).attr('id');
        if (id != "") {
            $.ajax({
                url:'<?php echo base_url() ?>home/get_surat_keluar',
                type:'post',
                context: this,
                data:{id_surat_keluar : id},
                success : function(e){
                    var data = e.split("|");
                    $('input[name=noo_agenda]').val(data[0]);
                    $('input[name=nomorr_surat]').val(data[1]);
                    $('select[name=idd_jenis_surat]').val(data[2]).change();
                    $('input[name=pengirimm]').val(data[3]);
                    $('input[name=penerimaa]').val(data[4]);
                    $('input[name=tanggall_kirim]').val(data[5]);
                    $('input[name=perihall]').val(data[6]);
                    $('input[name=idd_surat_keluar]').val(id);

                }
            });
        }
        else{
            alert('Maaf, data surat kosong');
            $('#editSurat').modal('hidden');
        }
        });
    $('.editFile').click(function(event){
        var id = $(this).attr('id');
        if (id != "") {    
                $('input[name=iddd_surat_keluar]').val(id);
        }
        else{
            alert('Maaf, data surat kosong');
            $('#editFile').modal('hidden');
        }
        });
</script>