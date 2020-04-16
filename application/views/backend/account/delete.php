<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $users->id_user	?>">
  <i class="fa fa-trash" ></i> Delete
</button>

 <div class="modal fade" id="delete-<?php echo $users->id_user	?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            	<h4 class="modal-title ml-auto">HAPUS DATA PRODUK</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>          
              
            <div class="modal-body">	
              	<div class="alert alert-warning">
              <h4>Peringatan</h4>
              	Yakin akan menghapus data file ini? Data yang sudah dihapus tidak dapat di kembalikan.
          		</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-time"></i>Close</button>
              <a href="<?php echo base_url('backend/account/delete/'.$users->id_user) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Ya, saya sakin</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->