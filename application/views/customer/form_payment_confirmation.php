<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payment Confirmation</title>

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
		<div><?php echo validation_errors() ?></div>
        <div><?php echo $this->session->flashdata('error') ?></div>
<div class="container">
    <div class="row">
         <?php echo form_open('customer/payment_confirmation/', ['class' => 'form-horizontal']) ; ?>
            <div class="form-group">
                <label for="Invoice_id">Invoice ID</label>
                <input type="text" class="form-control" name="invoice_id" 
                	value="<?php echo ($invoice_id != 0 ? $invoice_id:'') ;?>" placeholder="Email">
                	
            </div>
            <div class="form-group">
                <label for="amount_transfer">Amount Transfer</label>
                <input type="text" class="form-control" name="amount" placeholder="Total Payment">
            </div>
            <button type="submit" class="btn btn-default">Confirm My Payment</button>
         <?php form_close() ;?>
    </div>
</div> 
</body>
</html>