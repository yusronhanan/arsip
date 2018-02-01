<div id="page-wrapper">
    <?php 
         $notif = $this->session->flashdata('notif');
         $tipe_notif = $this->session->flashdata('tipe_notif');
         if (!empty($notif)) { ?>
            <div class="alert alert-<?php echo $tipe_notif;?> alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $notif ?>.
                            </div>
        <?php } ?>
<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Jabatan <a href="#" data-toggle="modal" data-target="#newJb"><i class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered" style="height:300px;overflow-x: scroll">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Jabatan</th>
                                            <th>Nama Jabatan</th>
                                            <th>Level Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list_jb as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->id_jabatan ?></td>
                                            <td><?php echo $dt->nama_jabatan ?></td>
                                            <td><?php echo $dt->level ?></td>
                                            <td>
                                            <a href="#" class="btn btn-xs btn-success editJb" id="<?php echo $dt->id_jabatan ?>" title="Edit" data-toggle="modal" data-target="#editJb"><i class="fa fa-pencil" ></i></a>
                                            <a href="#" class="btn btn-xs btn-danger del_jb" id="<?php echo $dt->id_jabatan ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                        

                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Bagian <a href="#" data-toggle="modal" data-target="#newBg"><i class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered" style="height:300px;overflow-x: scroll">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Bagian</th>
                                            <th>Nama Bagian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list_bg as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->id_bagian ?></td>
                                            <td><?php echo $dt->nama_bagian ?></td>
                                            <td>
                                            <a href="#" class="btn btn-xs btn-success editBg" id="<?php echo $dt->id_bagian ?>" title="Edit" data-toggle="modal" data-target="#editBg"><i class="fa fa-pencil" ></i></a>
                                            <a href="#" class="btn btn-xs btn-danger del_bg" id="<?php echo $dt->id_bagian ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Jenis Surat <a href="#" data-toggle="modal" data-target="#newJs"><i class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered" style="height:300px;overflow-x: scroll">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Jenis Surat</th>
                                            <th>Nama Jenis Surat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list_js as $dt) { ?>
                                        <tr>
                                            <td><?php echo $dt->id_jenis_surat ?></td>
                                            <td><?php echo $dt->jenis_surat ?></td>
                                            <td>
                                            <a href="#" class="btn btn-xs btn-success editJs" id="<?php echo $dt->id_jenis_surat ?>" title="Edit" data-toggle="modal" data-target="#editJs"><i class="fa fa-pencil" ></i></a>
                                            <a href="#" class="btn btn-xs btn-danger del_js" id="<?php echo $dt->id_jenis_surat ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
        </div>
        <!-- Modal -->
                            <div class="modal fade" id="newJb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah List Jabatan</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/tambah_list" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            Nama Jabatan
                                            <input type="text" name="nama_jabatan" placeholder="Nama Jabatan" class="form-control"  required>
                                            <br>
                                            Level Jabatan
                                            <input type="number" min="0" name="level" placeholder="Level" class="form-control"  required>
                                            <input type="hidden" name="tipe" class="form-control"  required value="jabatan">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                             <div class="modal fade" id="newBg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah List Bagian</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/tambah_list" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            Nama Bagian
                                            <input type="text" name="nama_bagian" placeholder="Nama Bagian" class="form-control"  required>
                                            <br>
                                            <input type="hidden" name="tipe" class="form-control"  required value="bagian">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                             <div class="modal fade" id="newJs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah List Jenis Surat</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/tambah_list" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            Jenis Surat
                                            <input type="text" name="jenis_surat" placeholder="Jenis Surat" class="form-control"  required>
                                            <br>
                                            <input type="hidden" name="tipe" class="form-control"  required value="jenis_surat">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

        <!-- Modal Edit -->
                            <div class="modal fade" id="editJb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit List Jabatan</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/edit_list" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            Nama Jabatan
                                            <input type="text" name="namaa_jabatan" placeholder="Nama Jabatan" class="form-control"  required>
                                            <br>
                                            Level Jabatan
                                            <input type="number" min="0" name="levell" placeholder="Level" class="form-control"  required>
                                            <input type="hidden" name="tipe" class="form-control"  required value="jabatan">
                                            <input type="hidden" name="idd_jabatan" class="form-control"  required value="">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                             <div class="modal fade" id="editBg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit List Bagian</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/edit_list" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            Nama Bagian
                                            <input type="text" name="namaa_bagian" placeholder="Nama Bagian" class="form-control"  required>
                                            <br>
                                            <input type="hidden" name="tipe" class="form-control"  required value="bagian">
                                            <input type="hidden" name="idd_bagian" class="form-control"  required value="">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                             <div class="modal fade" id="editJs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit List Jenis Surat</h4>
                                        </div>
                                        <form action="<?php echo base_url() ?>home/edit_list" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            Jenis Surat
                                            <input type="text" name="jeniss_surat" placeholder="Jenis Surat" class="form-control"  required>
                                            <br>
                                            <input type="hidden" name="tipe" class="form-control"  required value="jenis_surat">
                                            <input type="hidden" name="idd_jenis_surat" class="form-control"  required value="">
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>



<script type="text/javascript">
    $('.editJb').click(function(event){
        var id = $(this).attr('id');
        if (id != '') {
            $.ajax({
                url : '<?php echo base_url() ?>home/get_jb',
                type: 'post',
                context: this,
                data:{id_jabatan : id},
                success: function(e){
                    var data = e.split("|");
                    $('input[name=namaa_jabatan]').val(data[0]);
                    $('input[name=levell]').val(data[1]);
                    $('input[name=idd_jabatan]').val(id);
                }
            });
        }else{
            alert('Maaf, data tidak ada');
            $('#editJb').modal('hidden');
        }

    });
    $('.editBg').click(function(event){
        var id = $(this).attr('id');
        if (id != '') {
            $.ajax({
                url : '<?php echo base_url() ?>home/get_bg',
                type: 'post',
                context: this,
                data:{id_bagian : id},
                success: function(e){
                    $('input[name=namaa_bagian]').val(e);
                    $('input[name=idd_bagian]').val(id);
                }
            });
        }else{
            alert('Maaf, data tidak ada');
            $('#editBg').modal('hidden');
        }

    });
     $('.editJs').click(function(event){
        var id = $(this).attr('id');
        if (id != '') {
            $.ajax({
                url : '<?php echo base_url() ?>home/get_js',
                type: 'post',
                context: this,
                data:{id_jenis_surat : id},
                success: function(e){
                    $('input[name=jeniss_surat]').val(e);
                    $('input[name=idd_jenis_surat]').val(id);
                }
            });
        }else{
            alert('Maaf, data tidak ada');
            $('#editJs').modal('hidden');
        }

    });
     $('.del_jb').click(function(event){
        if (confirm('Apa anda yakin akan menghapus data jabatan ini?')) {
        var id = $(this).attr('id');
        if (id != '') {
            $.ajax({
                url : '<?php echo base_url() ?>home/del_jb',
                type: 'post',
                context: this,
                data:{id_jabatan : id},
                success: function(e){
                    if (e =="true") {
                        $(this).parent().parent().remove();
                    }
                    else if (e =="exist_using") {
                        alert('Maaf, gagal hapus. List Jabatan ini digunakan oleh pengguna');
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
     $('.del_bg').click(function(event){
        if (confirm('Apa anda yakin akan menghapus data bagian ini?')) {
        var id = $(this).attr('id');
        if (id != '') {
            $.ajax({
                url : '<?php echo base_url() ?>home/del_bg',
                type: 'post',
                context: this,
                data:{id_bagian : id},
                success: function(e){
                    if (e =="true") {
                        $(this).parent().parent().remove();
                    }
                    else if (e =="exist_using") {
                        alert('Maaf, gagal hapus. List Bagian ini digunakan oleh pengguna');
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
     $('.del_js').click(function(event){
        if (confirm('Apa anda yakin akan menghapus data jenis surat ini?')) {
        var id = $(this).attr('id');
        if (id != '') {
            $.ajax({
                url : '<?php echo base_url() ?>home/del_js',
                type: 'post',
                context: this,
                data:{id_jenis_surat : id},
                success: function(e){
                    if (e =="true") {
                        $(this).parent().parent().remove();
                    }
                    else if (e =="exist_using") {
                        alert('Maaf, gagal hapus. List Jenis Surat ini digunakan oleh list surat');
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