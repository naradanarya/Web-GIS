<div class="post-view">
    <p>
        <a href="<?php echo base_url ('backend/konfigurasi/edit/'.$konfigurasi->setting_id) ?>" class ="btn btn-warning btn-xs"><i class ="fa fa-edit"></i> Edit </a>
       
    </p>
    <?php 
    // Notifikasi 
    if($this->session->flashdata('sukses')){
        echo '<p class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</p>';
}?>
<div class="body-content">

    <div class="form-group row ">
        <label class="col-sm-1 col-form-label"> Nama Web</label>
        <div class="col-sm-9">
        <h3><?php echo $konfigurasi->namaweb ?> </h3>
        </div>
      </div> 

    <div class="form-group row ">
        <label class="col-sm-1 col-form-label"> Icon</label>
        <div class="col-sm-9">
        <img src="<?php echo base_url('assets/upload/konfigurasi/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail">    
        </div>
      </div> 

      <div class="form-group row ">
        <label class="col-sm-1 col-form-label"> Logo</label>
        <div class="col-sm-9">
        <img src="<?php echo base_url('assets/upload/konfigurasi/'.$konfigurasi->logo) ?>" class="img img-responsive img-thumbnail">    
        </div>
      </div> 

    </div>


