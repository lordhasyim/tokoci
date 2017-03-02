<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Toko Online</title>

    <!--Load bootstrap, jquery, datatables -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <script type="text/javascript" language="javascript"
            src="<?php echo base_url('assets/bootstrap/jquery-1.10.2.js') ?>"></script>
    <script type="text/javascript" language="javascript"
            src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>

    <!--holder js-->
    <!--<script src="holder.js"></script>-->

    <!--thumbnail fixed size css-->
    <!--http://stackoverflow.com/questions/23379318/have-thumbnails-with-different-images-sizes-bootstrap-->
    <style>
        .thumbnail img {
            width: 250px;
            height: 200px;
        }

        .thumbnail {
            width: 300px;
            height: 400px;
        }

        .thumbnail h3 {
            height: 30px;
        }
    </style>

</head>
<body>
<?php $this->load->view('layout/top_menu'); ?>
<?php if ($history != false) : ?>
	<?php echo $this->session->flashdata('message') ;?>
	<div class="container">
	    <table class="table table-bordered table-striped table-hover">
	        <thead>
	            <tr>
	                <th>Invoice Id</th>
	                <th>Invoice Date</th>
	                <th>Due Date</th>
	                <th>Total Amount</th>
	                <th>Status</th>
	                <th>Action</th>
	            </tr>
	        </thead>
	        <tbody>
	        <?php
	            $i = 0;
	            foreach ($history as $row) :
	            $i++;
	        ?>
	            <tr>
	                <td><?php echo $row->id ;?></td>
	                <td><?php echo $row->date ;?></td>
	                <td><?php echo $row->due_date ;?></td>
	                <td><?php echo $row->total ;?></td>
	                <td><?php echo $row->status ;?> </td>
	                <td><?php  
	                		if ($row->status == 'unpaid') {
	                			echo anchor('customer/payment_confirmation/'.$row->id, 'Confirm Payment',
	                						array('class' => 'btn btn-primary btn-xs'));
	                		}
	                	?>
	                </td>
	            </tr>
	        <?php endforeach ?>
	        </tbody>
	</div>
<?php else : ?>

	<p align="center">
		There are no shopping history for you..Shop now :) <?php echo anchor('/', 'Shop now') ?>
	</p>

	<?php endif; ?>
</body>
</html>