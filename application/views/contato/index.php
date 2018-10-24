<?php if ($this->session->flashdata('permissions_ok') != ""): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('permissions_ok');?></div>
<?php endif;?>
