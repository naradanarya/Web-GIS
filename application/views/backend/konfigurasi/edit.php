<?php 
// Error Upload 
if (isset($error))  {
  echo '<p class="alert alert-danger">';
  echo $error;
  echo '</p>';
}
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form open ubah menjadi menjadi multipart karena fungsinya bukan hanya entry melainkan uplaod jg
echo form_open_multipart(base_url('backend/konfigurasi/edit/'.$konfigurasi->setting_id),' class="form-horizontal"');

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
        <label class="col-md-3 col-form-label"> Nama Web</label>
        <div class="col-md-9">
           <input type="text" name="namaweb" class="form-control" placeholder="Nama Web" value ="<?php echo $konfigurasi->namaweb ?>" required>  
        </div>
      </div>

      <div class="form-group row ">
        <label class="col-sm-3 col-form-label"> Upload Icon</label>
        <div class="col-sm-9">
          <input type="file" name="icon" class="form-control" >
        </div>
      </div> 

      <div class="form-group row ">
        <label class="col-sm-3 col-form-label"> Upload Logo</label>
        <div class="col-sm-9">
          <input type="file" name="logo" class="form-control" >
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
