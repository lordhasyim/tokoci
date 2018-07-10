<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 5/4/17
 * Time: 1:42 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Membuat Pagination Pada CodeIgniter</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-8 col-lg-offset-2">
            <h3 class="text-center">Membuat Pagination Pada CodeIgniter</h3>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>alamat</th>
                    <th>pekerjaan</th>
                </tr>
                <?php
                $no = $this->uri->segment('3') + 1;
                foreach($user as $u){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $u->nama ?></td>
                        <td><?php echo $u->alamat ?></td>
                        <td><?php echo $u->pekerjaan ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br/>
            <div class="text-center">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" language="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
