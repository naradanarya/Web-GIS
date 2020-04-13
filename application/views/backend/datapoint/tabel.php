<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama SPBU</th>
                                            <th>Keterangan</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($datalisting as $key => $value) { ?>
                                           
                                       
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_spbu ?></td>
                                            <td><?= $value->keterangan ?></td>
                                            <td><?= $value->latitude ?></td>
                                            <td><?= $value->longitude ?></td>
                                            <td>
                                                <a href="<?= base_url('backend/datapoint/edit/'.$value->id) ?>" class="btn btn-xs btn-success">Edit</a>
                                                <a href="<?= base_url('backend/datapoint/delete/'.$value->id) ?>" class="btn btn-xs btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            