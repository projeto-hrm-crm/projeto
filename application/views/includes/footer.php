</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
<!-- <script src="<?php echo base_url();?>assets/js/widgets.js"></script> -->
<script src="<?php echo base_url();?>assets/js/plugins.js"></script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.mask.min.js"></script>
<script src="<?php echo base_url();?>assets/js/mask.js"></script>
<script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/validate.js"></script>
<script src="<?php echo base_url();?>assets/js/notifications.js"></script>
<!-- <script src="<?php echo base_url();?>assets/js/estado_cidade.js"></script>
 -->
<?php if (isset($assets['js'])): ?>
  <?php foreach ($assets['js'] as $js_file): ?>
    <script
    src="<?php echo base_url().'assets/js/'.$js_file; ?>"
    charset="utf-8"
    ></script>
  <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
