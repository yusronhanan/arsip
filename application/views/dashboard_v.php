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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $this->db->count_all_results('pengguna'); ?></div>
                                    <div>User</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>user">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $this->db->count_all_results('surat_masuk'); ?></div>
                                    <div>Surat Masuk</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>surat_masuk">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $this->db->count_all_results('surat_keluar'); ?></div>
                                    <div>Surat Keluar</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>surat_keluar">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($this->db->where('status_surat','0')->get('disposisi')->result()); ?></div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>disposisi">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
           
        </div>