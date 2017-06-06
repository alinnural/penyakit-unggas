                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    <button class="btn btn-primary" id="btn-new" style="min-width:80px">New </button>
                                    </h3>
                                </div>
                                <!-- /.box-header -->
                                <div id="confirm-msg" title="Confirmation"></div>
                                <div class="box-body table-responsive">
                                    <table id="tbl-list" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Nama Lengkap</th>
                                                <th>Akses User</th>
                                                <th width="90px" >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->
							<div class="modal fade" id="winform" tabindex="-999" role="dialog" aria-labelledby="btn-new" aria-hidden="true">
							</div>
<script type="text/javascript">
     function pesan_succ(pesan){
        var temp = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+pesan+'</div>';
        return temp;
     }

	function delete_m_user(id){
        $(document).ready(function() {
        		bootbox.confirm("Apakah data ini akan dihapus?", function(result) {
        			if(result) {
		   				$.ajax({
			   				type: "POST",
			   				url: "<?php echo base_url()?>m_user/delete",
			   				data: "id=" + id, 
			   				beforeSend: function (){

			   				},
			   				success: function(data){
				  				$('#confirm-msg').html(pesan_succ('Data has been deleted !'));
                  			setTimeout(function(){$('#confirm-msg').html('')}, 1000);
				  				setTimeout(function(){ $('#tbl-list').dataTable().fnReloadAjax() }, 1000);
			   				}
		   				});
					}
				});
			});
	}
	function window_edit(id) {
	  $(document).ready(function() {
		  $.ajax({
			url: "<?php echo base_url()?>m_user/edit",
			type:"POST",
			data: "id=" + id, 
			beforeSend: function(response){
				  $('#winform').html('');
			},
			success: function(response){
			  $("#winform").html(response);
			  $("#winform").modal('show');
			},
			dataType: "html"
		  });
		  return false;
	  });
	}

    $(document).ready(function(){

        $('#tbl-list').dataTable({
				"sPaginationType": "bootstrap",
				"bProcessing": false,
				"bServerSide": true,
				"iDisplayLength":10,
				"aoColumns": [
					{"bSearchable": false, "bSortable": false},
                    {"bSearchable": false, "bSortable": false},
					{"bSearchable": false, "bSortable": false},
					{"bSearchable": false, "bSortable": false, "sWidth":"90px"}
					],
				"sAjaxSource": "<?php echo base_url();?>m_user/get_list",
        });

        $('#btn-new').click(function(){
			$.ajax({
			  url: "<?php echo base_url()?>m_user/add",
			  beforeSend: function(response){
				  $('#winform').html('');
				  $('#id').val('');
				  $('#user_name').val('');
				  $('#password').val('');
				  $('#nama_lengkap').val('');
				  $('#m_profile_perusahaan').val('');
			  },
			  success: function(response){
				$("#winform").html(response);
				$("#winform").modal('show');
			  },
			  dataType: "html"
			});
			return false;
        });
    });
</script>

