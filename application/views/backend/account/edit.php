<?php 
// Error Upload 
if (isset($error))  {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form open ubah menjadi menjadi multipart karena fungsinya bukan hanya entry melainkan uplaod jg
echo form_open_multipart(base_url('backend/account/edit/'.$users->id_user),' class="form-horizontal"');

?>


<div class="card card-info">
    <div class="card-header ">
      <h3 class="card-title "><?php echo $title ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  <form class="form-horizontal ">
    <div class="card-body">
      <div class="form-group row ">
        <label class="col-md-3 col-form-label"> Username</label>
        <div class="col-md-9">
           <input type="text" name="username" class="form-control" placeholder="Username" value ="<?php echo $users->username ?>" required>  
        </div>
      </div>

      <div class="form-group row ">
        <label class="col-sm-3 col-form-label"> Upload Profile</label>
        <div class="col-sm-9">
          <input type="file" name="image" class="form-control" >
        </div>
      </div> 

      <div class="form-group row ">
        <label class="col-sm-4 col-form-label">Profile Sekarang</label>
            <img src="<?php echo base_url('assets/upload/profile/thumbs/'.$users->image) ?>" class="img img-responsive img-thumbnail">    
      </div>  

      <div class="form-group row ">
        <label class="col-md-3 col-form-label"> Password</label>
        <div class="col-md-9">
          <input type="password" name="password" class="form-control" placeholder="Password" value ="" required>
        </div>
      </div>

      <div class="form-group row ">
        <label class="col-md-3 col-form-label"> Akses Level</label>
        <div class="col-md-9">
          <select id="akses_level" name="akses_level">
          <option value="user">User</option>
          <option value="admin">Administrator</option>
          <option value="operator">Operator</option>
        </select>
        </div>
      </div>

       <div class="form-group row ">
        
        <div class="col-md-9">
          <button class="btn btn-success btn-lg" name="submit "type="submit">
            <i class="fa fa-save"> Simpan</i>
          </button>
          <button class="btn btn-info btn-lg" name="reset "type="reset">
            <i class="fa fa-times"> Reset</i>
          </button>
        </div>
      </div>
  </form>
</div>

<?php echo form_close(); ?>
