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
                url:"<?php echo base_url()?>gejala_penyakit/<?php echo $post ?>",
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

    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Gejala Penyakit Form</h4>
            </div>
            <div class="modal-body">
                <div class="box-body table-responsive">
                        <span id="form-msg">
                        </span>
						<?php echo form_open(base_url()."gejala_penyakit/".$post,'id="formedit"')?>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" id="id" name="id" value="<?php echo($row['id']); ?>" />
                                        <div class="form-group">
                                            <label>Gejala</label>
                                            <select id="gejala_id" class="form-control" name="gejala_id" required>
												<option></option>
												<?php foreach($listGejala->result() as $value){?>
													<option value="<?php echo $value->id ?>" <?php echo ($value->id == $row['gejala_id']) ? 'selected':''; ?>><?php echo $value->kode.' - '.$value->keterangan ?></option>
												<?php } ?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Penyakit</label>
                                            <select id="penyakit_id" class="form-control" name="penyakit_id" required>
												<option></option>
												<?php foreach($listPenyakit->result() as $value){?>
													<option value="<?php echo $value->id ?>" <?php echo ($value->id == $row['penyakit_id']) ? 'selected':''; ?>><?php echo $value->kode.' - '.$value->keterangan ?></option>
												<?php } ?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>MD</label>
                                            <input type="text" class="form-control" id="md" name="md" value="<?php echo($row['md']); ?>" placeholder="Masukkan MD"  />
                                        </div>
										<div class="form-group">
                                            <label>MB</label>
                                            <input type="text" class="form-control" id="mb" name="mb" value="<?php echo($row['mb']); ?>" placeholder="Masukkan MB"  />
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
