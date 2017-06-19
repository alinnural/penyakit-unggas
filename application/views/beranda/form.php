
<?php echo form_open()?>
    <div class="box">
        <div class="" style="padding:10px 40px;">            
            <div class="box-header">                
                <h2>Gejala Penyakit </h2> <hr>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php foreach($listKelompok->result() as $value){?>
                <h5 class="box-title"><b><?php echo $value->nama?></b></h5>
                    <?php 
                    $this->load->model(array('gejala_model'));
                    $listGejala = $this->gejala_model->get_by_kelompok($value->id);
                    foreach($listGejala->result() as $value2){?>
                        <div class="form-group" style="margin-left:20px">
                            <label>
                            <input type="checkbox" name="gejala[]" value="<?php echo $value2->id?>" class="minimal-red"/> <?php echo $value2->kode." - ".$value2->keterangan?>
                            </label>
                        </div>
                    <?php }?>
                <?php }?>
                <div class="form-group">
                </div>
            </div><!--box body-->
            <div class="box-footer clearfix">
                    <button id="btn-save" type="submit" class="btn btn-sm btn-primary btn-flat pull-right">Submit</button>
            </div>
            </div>  
    </div><!--box-->
<?php echo form_close(); ?><!-- checkbox -->