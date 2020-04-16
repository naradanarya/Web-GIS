
<p>
<a href="<?php echo base_url ('backend/account/add'); ?>" class="btn btn-success btn-lg">
<i class="fa fa-plus">	</i> Tambah Akun
</a>
</p> 
<?php 
// Notifikasi 
if($this->session->flashdata('sukses')){
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</p>';
}elseif($this->session->flashdata('gagal')){
    echo '<p class="alert alert-danger">';
    echo $this->session->flashdata('gagal');
    echo '</p>';
}
?>
<table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>NO</th>
                <th>USERNAME</th>
                <th>AKSES LEVEL</th>
                <th>PROFILE</th>
                <th>AKSI</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($users as $users) { ?>

            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $users->username ?></td>
                <td><?php echo $users->akses_level ?></td>
                <td>
                <img src="<?php echo base_url('assets/upload/profile/thumbs/'.$users->image)?> " class ="img img-responsive img-thumbnail" widht="60">
                </td>
                <td>
                <a href="<?php echo base_url ('backend/account/edit/'.$users->id_user) ?>" class ="btn btn-warning btn-xs"><i class ="fa fa-edit"></i> Edit </a>
                                    <?php include ('delete.php')?>
                </td>
            </tr>
<?php $no++;} ?>
</tbody>
</table>