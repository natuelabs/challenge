<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome</title>

<?php $this->load->view('header');?>
</head>
<body>


<div id="container">
<h1>Welcome!</h1>

<div id="body">
	<a href="<?php echo base_url(); ?>view_all_products">All Products</a>
</div>

</div>

</body>
</html>
