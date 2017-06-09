<script type="text/javascript">
    function pesan_err(pesan){
        var temp = '<div class="alert alert-warning alert-dismissable"><i class="fa fa-warning"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+pesan+'</div>';
        return temp;
    }

    function pesan_succ(pesan){
        var temp = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+pesan+'</div>';
        return temp;
    }

	$(function()
	{
        $('#btn-save').click(function(){
            $('#formedit').submit();
            $('#btn-simpan').addClass('disabled');
        });

	    $('#formedit').submit(function(){
            $.ajax({
                url:"<?php echo base_url()?>penyakit/<?php echo $post ?>",
 			    type:"POST",
 			    data:$('#formedit').serialize(),
 			    cache: false,
  		        success:function(respon){
     		    	var obj = $.parseJSON(respon);
  		            if(obj.status==1){
  		                $('#form-msg').html(pesan_succ('Data has been saved !'));
                        setTimeout(function(){$('#form-msg').html('')}, 2000);
                        setTimeout(function(){$('#winform').modal('hide')}, 2500);
                        setTimeout(function(){ $('#tbl-list').dataTable().fnReloadAjax() }, 2500);
      		        }else{
                        $('#form-msg').html(pesan_err(obj.error));
                        setTimeout(function(){$('#form-msg').html('')}, 2000);
      		        }
                    $('#btn-save').removeClass('disabled');
     			}
      		});
      		return false;
        });
    });
</script>

    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">penyakit Form</h4>
            </div>
            <div class="modal-body">
                <div class="box-body table-responsive">
                        <span id="form-msg">
                        </span>
						<?php echo form_open(base_url()."penyakit/".$post,'id="formedit"')?>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" id="id" name="id" value="<?php echo($row['id']); ?>" />
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo($row['kode']); ?>" placeholder="Masukkan kode"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo($row['keterangan']); ?>" placeholder="Masukkan Nama"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan"><?php echo($row['keterangan']);?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
				</div><!-- /.box-body -->
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="btn-save" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
