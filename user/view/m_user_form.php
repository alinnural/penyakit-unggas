<script type='text/javascript'>
        var site = "<?php echo site_url();?>";
     
        $(function(){
            $('.autocomplete').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                //serviceUrl: site+'t_karyawan/search',
                serviceUrl: site+"m_user/search/", 
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {                  
                    $('#t_personalia_id').val(''+suggestion.id); // membuat id personalia untuk ditampilkan
                }
            });
        });
    </script>

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
                url:"<?php echo base_url()?>m_user/<?php echo $post ?>",
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
				<h4 class="modal-title">Master User</h4>
            </div>
            <div class="modal-body">
                <div class="box-body table-responsive">
                        <span id="form-msg">
                        </span>
						<?php echo form_open(base_url()."m_user/".$post,'id="formedit"')?>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" id="id" name="id" value="<?php echo($row['id']); ?>" />
                                       <div class="form-group">
                                            <label>Nama Karyawan</label>
                                            <input type="search" class='autocomplete nama' id="autocomplete1" name="nama_customer" value="<?php echo($row['nik_personalia'].' - '.$row['nama_lengkap']); ?>"/>
                                            <input type="hidden" class='autocomplete' id="t_personalia_id" name="t_personalia_id" value="<?php echo($row['t_personalia_id']); ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo($row['user_name']); ?>" placeholder="Enter user_name"  />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo($row['password']); ?>" placeholder="Enter password"  />
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo($row['nama_lengkap']); ?>" placeholder="Enter nama_lengkap"  />
                                        </div>
                                        -->
                                        <div class="form-group">
                                            <label>Akses User</label>
                                              <select class="form-control" id="m_profile_perusahaan" name="m_profile_perusahaan">
                                                <?php foreach ($prof_perusahaan_query->result() as $prof_perusahaan_row) : ?>
                                                  <?php
                                                    if ($row['m_profile_perusahaan'] === $prof_perusahaan_row->id){
                                                      $selectedy = " selected=\"selected\"";
                                                      $selectedn = "";
                                                    } else {
                                                      $selectedn = " selected=\"selected\"";
                                                      $selectedy = "";
                                                    }
                                                  ?>
                                                   <option value="<?php echo $prof_perusahaan_row->id;?>" <?php print($selectedy); ?>><?php echo $prof_perusahaan_row->nama_perusahaan;?></option>
                                                <?php endforeach ; ?>
                                                <option value="100">PT MILKO VEVERAGE KARUNIA dan PT DWI CAKRA KARUNIA</option>
                                              </select>                                                                                      
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
