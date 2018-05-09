</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url();?>assets/js/widgets.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins.js"></script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="https://github.com/igorescobar/jQuery-Mask-Plugin/blob/master/jquery.mask.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.mask.min.js"></script>
<script src="<?php echo base_url();?>assets/js/mask.js"></script>
<script src="<?php echo base_url();?>assets/js/lib/jquery/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/validate.js"></script>
<script src="<?php echo base_url();?>assets/js/estado_cidade.js"></script>

<?php if (isset($assets['js'])): ?>
    <?php foreach ($assets['js'] as $js_file): ?>
      <script
        src="<?php echo base_url().'assets/js/'.$js_file; ?>"
        charset="utf-8"
      ></script>
    <?php endforeach; ?>
  <?php endif; ?>
<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

</body>
</html>
