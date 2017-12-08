<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="spec" >
        <label for="spec">Specifications:</label>

            <input type='checkbox' value='' placeholder="" />
            
        </div>
        
    </div>


<script>
$(function () {
    $('#spec').on('change', 'input:checked', function (event) {

            location.href='<?php echo base_url(); ?>view_all_products/spec/'+ $('this').val();    
    } );
});    
</script>
