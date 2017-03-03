<div class="col-sm-9">

<h4 class="text-right">
	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="#">Home</a></li>
  		<li class="breadcrumb-item">edit tamu</li>
	</ol>        	
</h4>

<div class="well">
	<form class="form-horizontal" method="post" style="min-height:300px">
	  <div class="form-group">
	  <?php echo form_error('nama','<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
		<label for="nama" class="col-sm-2 control-label">Nama</label>
		<div class="col-sm-10">
		  <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $tamu->nama; ?>">
		</div>
	  </div>
	  <div class="form-group">
	  <?php echo form_error('email','<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
		  <input name="email" type="text" class="form-control" id="email" value="<?php echo $tamu->email; ?>">
		</div>
	  </div>
	  <div class="form-group">
	  <?php echo form_error('nama','<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
		<label for="telp" class="col-sm-2 control-label">Telepon</label>
		<div class="col-sm-10">
		  <input name="telp" type="text" class="form-control" id="telp" value="<?php echo $tamu->telp; ?>">
		</div>
	  </div>
	  <div class="form-group">
	  <?php echo form_error('nama','<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>'); ?>
		<label for="alamat" class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-10">
		  <textarea name="alamat" class="form-control" id="alamat"><?php echo $tamu->alamat; ?></textarea>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  
		  <button type="submit" class="btn btn-default">Simpan</button>
		  <a class="btn btn-default" href="<?php echo site_url('home/listed');?>">Kembali</a>

		</div>
	  </div>
	</form>
</div>
</div>