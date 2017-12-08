<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Products</title>

<?php $this->load->view('header');?>
</head>
<body>


<div id="container">
<h1>All Products</h1>

<div id="body">
    <div id="filters">

        <label for="sort">Sort by:</label>
        <select id="sort" onchange="location.href='<?php echo base_url(); ?>view_all_products/'+this.value;" >
            <option <?php echo $sort_order == 'id/asc' ? 'selected' : '' ?> value='id/asc'>Product ID (Ascending)</option>
            <option <?php echo $sort_order == 'id/desc' ? 'selected' : '' ?> value='id/desc'>Product ID (Descending)</option>
            <option <?php echo $sort_order == 'price/asc' ? 'selected' : '' ?> value='price/asc'>Price (Lowest)</option>
            <option <?php echo $sort_order == 'price/desc' ? 'selected' : '' ?> value='price/desc'>Price (Highest)</option>

        </select>

        <form id="spec" action="<?php echo base_url(); ?>view_all_products/<?php echo $sort_order;?>" method="POST">
        <label for="spec">Specifications:</label>
            <!-- <p>Low Carb, Lactose Free, Sugar Free, Gluten Free, Vegitarian, Vegan</p> -->
        </form>

    </div>
    <table >
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Specifications</th>
    </tr>

    <?php

foreach ($products as $product) {
    ?>
            <tr>
                <td><?php echo $product->id; ?></td>
                <td><?php echo $product->name; ?></td>
                <td><?php echo money_format('%i', $product->price); ?></td>
                <td><?php echo implode(',', $product->specifications); ?></td>
            </tr>
    <?php
}
?>
    </table>
</div>

</div>

<script>
$(function () {
    var chkbx, lbl = null;
     $.getJSON('<?php echo base_url(); ?>specs',
                function (res) {
                        if(res.length){

                                res.map(
                                    function (v) {
                                            chkbx = $('<input />').prop('name', 'spec[]').prop('type', 'checkbox').prop('value',v);
                                            lbl = $('<label />').text( v ).css('text-transform', 'capitalize');
                                            chkbx.appendTo('form#spec');
                                            lbl.appendTo('form#spec');
                                    });
									 $('<input />').prop('value', "Refresh").prop('type', 'submit').appendTo('form#spec');


                                     <?php

                                     if(!$specs) {

                                        echo '$("[name^=spec]").prop("checked", true);';

                                     }else{
                                        foreach ($specs as $value) {
                                            echo "$('input[value=$value]').prop('checked', true);";
                                        }
                                            

                                     }
                                     
                                     ?>
                        }

                }

    );

});
</script>

</body>
</html>
