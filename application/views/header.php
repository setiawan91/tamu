
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BukuTamu</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
        <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->
   <!-- <link href="jumbotron-narrow.css" rel="stylesheet">-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>

  </head>

  <body>

    <div class="container">
      <!--<div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="<?php echo site_url('home');?>">Home</a></li>
            <li role="presentation"><a href="<?php echo site_url('home/add');?>">Tambah</a></li>
            <li role="presentation"><a href="<?php echo site_url('about');?>">about</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Buku<b class="text-primary">Tamu</b></h3>
      </div>-->

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2">
          <h3 class="text-muted" style="font-family:Courier;font-size:22px;"><i class="fa fa-users"></i> Guest<b class="text-default">Book</b></h3>
            <nav class="navbar navbar-default navbar-fixed-side" style="width:12%;position:fixed;">
            <!-- normal collapsible navbar markup -->
              <ul class="nav" style="font-family:Courier;font-size:16px;">
                <li role="presentation" class="<?php echo $nav=='dashboard'?'active':''; ?>">
                  <a href="<?php echo site_url('home');?>">Home</a>
                </li>
                <li role="presentation" class="<?php echo $nav=='tambah'?'active':''; ?>">
                  <a href="<?php echo site_url('home/add');?>">Form Daftar</a>
                </li>
                <li role="presentation" class="<?php echo $nav=='listed'||$nav=='edit'?'active':''; ?>">
                  <a href="<?php echo site_url('home/listed');?>">Daftar Tamu</a>
                </li>
                <li role="presentation" class="<?php echo $nav=='tentang'?'active':''; ?>">
                  <a href="<?php echo site_url('about');?>">Tentang</a>
                </li>
                
              </ul>

            </nav>

          </div>

      

      

      
