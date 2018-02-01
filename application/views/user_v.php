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
                    <h1 class="page-header">User <?php if ($this->session->userdata('level') == 0) { ?><a href="#" data-toggle="modal" data-target="#newUser"><i class="fa fa-plus"></i></a><?php } ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data All User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>ID Pengguna</th>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Jabatan</th>
                                        <th>Bagian</th>
                                        <?php if ($this->session->userdata('level') == 0) { ?>
                                        <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rows as $data) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $data->id_pengguna ?></td>
                                        <td><?php echo $data->nama_depan ?></td>
                                        <td><?php echo $data->nama_belakang ?></td>
                                        <td class="center"><?php echo $data->nama_jabatan ?></td>
                                        <td class="center"><?php echo $data->nama_bagian ?></td>
                                        <?php if ($this->session->userdata('level') == 0) { ?>
                                        <td>
                                            <a href="#" class="btn btn-xs btn-success editUser" id="<?php echo $data->id_pengguna ?>" title="Edit" data-toggle="modal" data-target="#editUser"><i class="fa fa-pencil" ></i></a>
                                            <a href="#" class="btn btn-xs btn-danger del_user" id="<?php echo $data->id_pengguna ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                            <?php echo $pagination ?>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <?php if ($this->session->userdata('level') == 0) { ?>
         <!-- Modal -->
                            <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/tambah_user" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            Nama Depan
                                            <input type="text" name="nama_depan" placeholder="Nama Depan" class="form-control"  required>
                                            <br>
                                            Nama Belakang
                                            <input type="text" placeholder="Nama Belakang" name="nama_belakang" class="form-control"  required>
                                            <br>
                                            Jabatan
                                            <select class="form-control"  required name="id_jabatan">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($jabatan as $jb) { ?>
                                                <option value="<?php echo $jb->id_jabatan ?>"><?php echo $jb->nama_jabatan ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            Bagian
                                            <select class="form-control"  required name="id_bagian">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($bagian as $bg) { ?>
                                                <option value="<?php echo $bg->id_bagian ?>"><?php echo $bg->nama_bagian ?></option>
                                                <?php } ?>
                                            </select>
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

         <!-- Modal Edit-->
                            <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/edit_user" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="per_page" value="<?php 
                                            if(!empty($per_page))
                                            {
                                            echo $per_page; }
                                            else {
                                                echo "";
                                            } ?>" class="form-control">
                                            <input type="hidden" name="idd_pengguna" class="form-control"  required>
                                            Nama Depan
                                            <input type="text" name="namaa_depan" placeholder="Nama Depan" class="form-control"  required>
                                            <br>
                                            Nama Belakang
                                            <input type="text" placeholder="Nama Belakang" name="namaa_belakang" class="form-control"  required>
                                            <br>
                                            Jabatan
                                            <select class="form-control"  required name="idd_jabatan">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($jabatan as $jb) { ?>
                                                <option value="<?php echo $jb->id_jabatan ?>"><?php echo $jb->nama_jabatan ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            Bagian
                                            <select class="form-control"  required name="idd_bagian">
                                                <option value="">--Pilih--</option>
                                                <?php foreach ($bagian as $bg) { ?>
                                                <option value="<?php echo $bg->id_bagian ?>"><?php echo $bg->nama_bagian ?></option>
                                                <?php } ?>
                                            </select>
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
<script type="text/javascript">
    $('.editUser').click(function(event){
        var id = $(this).attr('id');
        if (id != "") {
            $.ajax({
                url:'<?php echo base_url() ?>home/get_user',
                type:'post',
                context: this,
                data:{id_pengguna : id},
                success : function(e){
                    var data = e.split("|");
                    $('input[name=namaa_depan]').val(data[0]);
                    $('input[name=namaa_belakang]').val(data[1]);
                    $('select[name=idd_jabatan]').val(data[2]).change();
                    $('select[name=idd_bagian]').val(data[3]).change();
                    $('input[name=idd_pengguna]').val(id);

                }
            });
        }
        else{
            alert('Maaf, data user kosong');
            $('#editUser').modal('hidden');
        }
        });

    $('.del_user').click(function(event){
        if (confirm('Apa anda yakin akan menghapus data pengguna ini?')) {
        var id = $(this).attr('id');
        if (id != '') {
            $.ajax({
                url : '<?php echo base_url() ?>home/del_user',
                type: 'post',
                context: this,
                data:{id_pengguna : id},
                success: function(e){
                    if (e =="true") {
                        $(this).parent().parent().remove();
                    }
                    else{
                        alert('Maaf, gagal hapus. Coba lagi !');
                    }
                }
            });
        }else{
            alert('Maaf, data tidak ada');
            
        }
}
    });
</script>
<?php } ?>