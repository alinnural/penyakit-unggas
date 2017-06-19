<div class="content" style="padding:10px 40px;">
    <form method="post" action="<?php echo base_url('login/submit')?>">
        <div style="padding: 0 30%; margin-top: 100px">
            <div class="text-center">
                <h3><strong>Halaman Login</strong></h3>
            </div>
            <br />
            <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php }else if($this->session->flashdata('error')){?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php }?>
            <div class="form-group">
                <input type="text" name="username" id="username_id" class="form-control input-lg" placeholder="Username" required>
            </div> <!-- / Username -->

            <div class="form-group">
                <input type="password" name="password" id="password_id" class="form-control input-lg" placeholder="Password" required>
            </div> <!-- / Password -->

            <div class="form-actions">
                <input type="submit" value="Masuk" class="btn btn-primary btn-block btn-lg">
            </div> <!-- / .form-actions -->
        </div>
    </form>
</div>